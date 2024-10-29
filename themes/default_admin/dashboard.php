
<!-- Content wrapper -->
<div class="content-wrapper">
    
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Hello <?= $users['firstname']?> 🎉</h5>
                            <p class="mb-4">
                                welcome to your online office
                                <span class="badge badge-pill bg-success">NGN 0.00</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="https://genextmotors.com.ng/themes/default_admin/assets/img/illustrations/man-with-laptop-light.png" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="col-lg-3 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                        
                        <span class="fw-semibold d-block mb-1">Users</span>
                        <h3 class="card-title mb-2"><i class="menu-icon tf-icons bx bx-group"></i> <?=$users_num;?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                        
                        <span>Managers</span>
                        <h3 class="card-title text-nowrap mb-2"> <i class="menu-icon tf-icons bx bx-briefcase"></i> 2</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                        
                        <span class="fw-semibold d-block mb-1">Songs</span>
                        <h3 class="card-title mb-2"><i class="menu-icon tf-icons bx bx-car"></i><?=$audio_num;?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                        
                        <span class="fw-semibold d-block mb-1">Blogs</span>
                        <h3 class="card-title text-nowrap mb-2"> <i class="menu-icon tf-icons bx bx-briefcase"></i> <?=$blogs_num?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12  mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                    <h5 class="m-0 mb-3 me-2">Bookings</h5>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="p-0 m-0">

                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-12  mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                    <h5 class="m-0 mb-3 me-2">Expired Bookings</h5>
                    </div>
                </div>
                <div class="card-body">      
                    <ul class="p-0 m-0">
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-primary"><i class="bx bx-taxi"></i></span>
                            </div>
                        
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">johnson Ticket No: 3716927ec8 </h6>
                                                            <small class="text-info">Trip: unassigned, Preferred Time 8:30 AM</small><br>
                                    <a class="badge bg-primary" href="https://genextmotors.com.ng/index/assign_trip/5">Assign Trip</a><br>
                                                        <small class="text-muted">Owerri - Port Harcourt, 2023-05-26, 08037087606</small>
                                </div>
                                <div class="user-progress">
                                    <small class="fw-semibold">Used</small>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-primary"><i class="bx bx-taxi"></i></span>
                            </div>
                        
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">peter Ticket No: d23957a7e5 </h6>
                                    <small class="text-info">Trip: unassigned, Preferred Time 1:30 PM</small><br>
                                    <a class="badge bg-primary" href="https://genextmotors.com.ng/index/assign_trip/4">Assign Trip</a><br>
                                    <small class="text-muted">Port Harcourt - Owerri, 2023-05-19, 08037068896</small>
                                </div>
                                <div class="user-progress">
                                    <small class="fw-semibold">Used</small>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-primary"><i class="bx bx-taxi"></i></span>
                            </div>
                    
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Kingdom Ticket No: 25f331168c </h6>
                                    <small class="text-info">Trip: unassigned, Preferred Time 4:00 PM</small><br>
                                    <a class="badge bg-primary" href="https://genextmotors.com.ng/index/assign_trip/3">Assign Trip</a><br>
                                    <small class="text-muted">Port Harcourt - Owerri, 2023-04-09, 08037087606</small>
                                </div>
                                <div class="user-progress">
                                    <small class="fw-semibold">Unused 
                                        <a class="badge bg-primary" href="https://genextmotors.com.ng/index/ticket_used/3"> Mark As Used</a>
                                    </small>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-primary"><i class="bx bx-taxi"></i></span>
                            </div>
                        
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Johnson Lobo Ticket No: eb25908a4d </h6>
                                    <small class="text-info">Trip: unassigned, Preferred Time 8:00 AM</small><br>
                                    <a class="badge bg-primary" href="https://genextmotors.com.ng/index/assign_trip/2">Assign Trip</a><br>
                                    <small class="text-muted">Owerri - Port Harcourt, 2022-12-31, 08067061439</small>
                                </div>
                                <div class="user-progress">

                                    <small class="fw-semibold">Unused 
                                        <a class="badge bg-primary" href="https://genextmotors.com.ng/index/ticket_used/2"> Mark As Used</a>
                                    </small>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    
    </div>
</div>
<!-- / Content -->