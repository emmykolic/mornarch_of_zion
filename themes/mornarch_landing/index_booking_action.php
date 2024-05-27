<section class="ftco-section contact-section">
    <div class="container">
        <div class="row d-flex mb-5 contact-info">

            <div class="col-md-12 block-9 mb-md-5">

                <div class="bg-light p-5 contact-form" id="bookingForm">
                    <h1 class="text-danger text-center display-6">Book A Trip</h1>

                    <div class="row mb-3">
                        <div class="input-group col-md-6 rounded-0 mb-3">
                            <span class="input-group-text rounded-0 bg-danger border-0"><span class="icon-user text-white"></span></span>
                            <input type="text" class="form-control rounded-0 border-left-0" placeholder="Your Name" name="name" id="name">
                        </div>
                        <div class="input-group col-md-6 mb-3">
                            <span class="input-group-text rounded-0 bg-danger border-0"><span class="icon-phone text-white"></span></span>
                            <input type="text" class="form-control rounded-0 border-left-0" placeholder="Your Phone Number" name="phone" id="phone">
                        </div>

                        <div class="input-group col-md-6 mb-3">
                            <span class="input-group-text rounded-0 bg-danger border-0"><span class="icon-envelope text-white"></span></span>
                            <input type="text" class="form-control rounded-0 border-left-0" placeholder="Your Email" name="email" id="email">
                        </div>

                        <div class="input-group col-md-6 mb-3">
                            <span class="input-group-text rounded-0 bg-danger border-0"><span class="icon-map text-white"></span></span>
                            <input type="text" class="form-control rounded-0 border-left-0" placeholder="Your address" name="address" id="address">
                        </div>

                        <?php if ($trips->num_rows > 0) : ?>
                            <div class="input-group col-md-6 mb-3">
                                <span class="input-group-text rounded-0 bg-danger border-0"><span class="icon-car text-white"></span></span>
                                <select class="form-control rounded-0 border-left-0" name="trip" id="trip">
                                    <option value=""> Select Trip </option>
                                    <?php while ($row = $trips->fetch_assoc()) : ?>
                                        <option value="<?= $row['tid']  ?>"> <?= $row['take_off'] ?> to <?= $row['drop_off'] ?> @ NGN <?= $row['price'] ?> on <?= $row['trip_date'] ?> by <?= $row['trip_time'] ?> </option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                        <?php else : ?>
                            <div class="input-group col-md-6 mb-3">
                                <span class="input-group-text rounded-0 bg-danger border-0"><span class="icon-timer text-white"></span></span>
                                <select class="form-control rounded-0 border-left-0" name="pref_time" required id="pref_time" />
                                <option value="">Prefered Time</option>
                                <option>5:00 AM</option>
                                <option>5:30 AM</option>
                                <option>6:00 AM</option>
                                <option>6:30 AM</option>
                                <option>7:00 AM</option>
                                <option>7:30 AM</option>
                                <option>8:00 AM</option>
                                <option>8:30 AM</option>
                                <option>9:00 AM</option>
                                <option>9:30 AM</option>
                                <option>10:00 AM</option>
                                <option>10:30 AM</option>
                                <option>11:00 AM</option>
                                <option>11:30 AM</option>
                                <option>12:00 PM</option>
                                <option>12:30 PM</option>
                                <option>1:00 PM</option>
                                <option>1:30 PM</option>
                                <option>2:00 PM</option>
                                <option>2:30 PM</option>
                                <option>3:00 PM</option>
                                <option>3:30 PM</option>
                                <option>4:00 PM</option>
                                <option>4:30 PM</option>
                                <option>5:00 PM</option>
                                <option>5:30 PM</option>
                                <option>6:00 PM</option>
                                <option>6:30 PM</option>
                                <option>7:00 PM</option>
                                <option>7:30 PM</option>
                                <option>8:00 PM</option>
                                <option>8:30 PM</option>

                                </select>
                            </div>

                        <?php endif; ?>

                        <div class="input-group col-md-6 mb-3 rounded-0">
                            <span class="input-group-text rounded-0 bg-danger border-0"><span class="icon-user text-white"></span></span>
                            <input type="text" class="form-control rounded-0 border-left-0" placeholder="Next of Kin Name" name="nok_name" id="nok_name">
                        </div>
                        <div class="input-group col-md-6 mb-3">
                            <span class="input-group-text rounded-0 bg-danger border-0"><span class="icon-phone text-white"></span></span>
                            <input type="text" class="form-control rounded-0 border-left-0" placeholder="Next of Kin Phone Number" name="nok_phone" id="nok_phone">
                        </div>
                        <div class="input-group col-md-6 mb-3">
                            <span class="input-group-text rounded-0 bg-danger border-0"><span class="icon-map text-white"></span></span>
                            <input type="text" class="form-control rounded-0 border-left-0" placeholder="Next of Kin address" name="nok_address" id="nok_address">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button onclick="payOnline('<?= PAY_STACK_KEY ?>')" class="btn btn-dark py-3 px-5 float-right">Proceed</button>
                        </div>
                    </div>

                    </form>

                </div>
            </div>

        </div>
</section>
<script src="https://js.paystack.co/v1/inline.js"></script>
<script>
    function payOnline(key) {

        jQuery(document).ready(function() {
            var error = 0;
            var errorMsg = "";
            var trip_date = "<?= $trip_date ?>";
            var price = "<?= $price ?>";
            var route = "<?= $route ?>"
            var ticket_type = "<?= $ticket_type ?>"
            if (ticket_type == "Single Ticket") {
                var cost = price;
            } else if (ticket_type == "Return Ticket") {
                var cost = price * 2;
            } else {
                error = 1;
                errorMsg += " Something went wrong, couldn't calculate your ticket cost!";
            }
            <?php if ($trips->num_rows > 0) : ?>
                var trip = $('#trip').val();
                var pref_time = "";
            <?php else : ?>
                var pref_time = $('#pref_time').val();
                var trip = "";
            <?php endif; ?>
            var name = $('#name').val();
            var email = $('#email').val();
            var phone = $('#phone').val();
            var address = $('#address').val();
            var nok_name = $('#nok_name').val();
            var nok_address = $('#nok_address').val();
            var nok_phone = $('#nok_phone').val();

            if (name == "" || email == "" || phone == "" || address == "" || nok_name == "" || nok_address == "" || nok_phone == "") {
                error = 1;
                errorMsg += " all form field are compulsary!";
            }

            setTimeout(function() {
                if (error == 0) {
                    cost = cost * 100
                    var handler = PaystackPop.setup({
                        key: key,
                        email: email,
                        amount: cost,
                        currency: "NGN",
                        ref: "<?= str_replace(array(".", " "), array("", ""), microtime()) . rand(0, 1000) . rand(0, 1000) ?>",
                        callback: function(response) {
                            var burl = $('#burl').val();
                            $.post((burl + "index/booking_action_action"), {

                                    trip_date: trip_date,
                                    ref: response.reference,
                                    route: route,
                                    ticket_type: ticket_type,
                                    trip: trip,
                                    pref_time: pref_time,
                                    name: name,
                                    email: email,
                                    address: address,
                                    phone: phone,
                                    nok_name: nok_name,
                                    nok_address: nok_address,
                                    nok_phone: nok_phone,
                                },
                                function(data) {
                                    if (data == 1) {
                                        //window.location.assign(burl + 'index/payment_success/' + ref);
                                    } else {
                                        $("#bookingForm").prepend(`<div class="alert alert-danger">${data}</div>`)
                                    }
                                }
                            );
                        }
                    });
                    handler.openIframe();
                } else {
                    $("#bookingForm").prepend(`<div class="alert alert-danger">${errorMsg}</div>`)
                }
            }, 2000)
        });
    }
</script>