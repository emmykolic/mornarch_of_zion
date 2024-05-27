<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Trips/</span> Schedule New</h4>

        <!-- Basic Layout -->
        <div class="row">
            <div class="col-md-8 offset-md-2 col-12">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Schedule A New Trip</h5>
                    </div>
                    <div class="card-body">
                        <form action="<?= BURL ?>trips/action" method="post">
                            <div class="mb-3">
                                <label class="form-label" for="plateNo">Routes</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-title" class="input-group-text"><i class="bx bx-directions"></i></span>
                                    <select class="form-select" aria-label="Select A Route" aria-describedby="route" name="route" id="route" required />
                                    <option value="">Select Route</option>
                                    <?php while ($row = $routes->fetch_assoc()) : ?>
                                        <option value="<?= $row['rid'] ?>"><?= $row['drop_off'] ?> - <?= $row['take_off'] ?> </option>
                                    <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="model">Trip Time</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-model" class="input-group-text"><i class="bx bx-time"></i></span>
                                    <select class="form-select" aria-label="Select A Driver" aria-describedby="trip time" name="trip_time" id="trip_time" required />
                                    <option value="">Select Time</option>
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
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="trip_date">Trip Date</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-model" class="input-group-text"><i class="bx bx-calendar"></i></span>
                                    <input type="date" class="form-control" placeholder="Enter Trip Date" aria-label="Enter Trip Date" aria-describedby="Trip Date" name="trip_date" id="trip_date" required />
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="plateNo">Vehicle</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-title" class="input-group-text"><i class="bx bx-car"></i></span>
                                    <select class="form-select" aria-label="Select A Vehicle" aria-describedby="vehicle" name="vehicle" id="vehicle" required />
                                    <option value="">Select Vehicle</option>
                                    <?php while ($row = $vehicles->fetch_assoc()) : ?>
                                        <option value="<?= $row['vid'] ?>"><?= $row['plate_no'] ?> : <?= $row['model'] ?> </option>
                                    <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="plateNo">Driver</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-title" class="input-group-text"><i class="bx bx-user"></i></span>
                                    <select class="form-select" aria-label="Select A Driver" aria-describedby="driver" name="driver" id="driver" required />
                                    <option value="">Select Driver</option>
                                    <?php while ($row = $drivers->fetch_assoc()) : ?>
                                        <option value="<?= $row['uid'] ?>"><?= $row['fullname'] ?> </option>
                                    <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <input type="submit" class="btn btn-primary" value="Schdule Trip" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->