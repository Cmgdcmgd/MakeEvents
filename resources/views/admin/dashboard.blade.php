@include('admin.header')
@include('admin.navbar')

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="h-100">
                            <div class="row mb-3 pb-1">
                                <div class="col-12">
                                    <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                                        <div class="flex-grow-1">
                                            <h4 class="fs-16 mb-1">Good Morning, {{session('name')}}!</h4>
                                        </div>
                                    </div><!-- end card header -->
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                            
                            <div class="row">
                                @if(session('user_type') == "Vendor" || session('user_type') == "Administrator")
                                <div class="col-xl-3 col-md-6">
                                    <!-- card -->
                                    <a href="/newvenue">
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                
                                                <div class="d-flex align-items-end justify-content-between mt-4">
                                                    <div>
                                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4">Create Vendor Profile</h4>
                                                        
                                                    </div>
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-info-subtle rounded fs-3">
                                                            <i class="bx bx-buildings text-info"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </a>
                                    
                                </div><!-- end col -->
                                @endif
                                @if(session('user_type') == "Vendor")
                                <div class="col-xl-3 col-md-6">
                                    <!-- card -->
                                    <a href="/venueslist">
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                
                                                <div class="d-flex align-items-end justify-content-between mt-4">
                                                    <div>
                                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4">Vendor Listing</h4>
                                                        
                                                    </div>
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <div class="avatar-sm flex-shrink-0">
                                                            <span class="avatar-title bg-info-subtle rounded fs-3">
                                                                <i class="bx bx-building text-info"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </a>
                                    
                                </div><!-- end col -->
                                @endif
                                @if(session('user_type') == "Event Coordinator")
                                <div class="col-xl-3 col-md-6">
                                    <!-- card -->
                                    <a href="/coordinatorslist">
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                
                                                <div class="d-flex align-items-end justify-content-between mt-4">
                                                    <div>
                                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4">Event Coordinator Listing</h4>
                                                        
                                                    </div>
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <div class="avatar-sm flex-shrink-0">
                                                            <span class="avatar-title bg-info-subtle rounded fs-3">
                                                                <i class="bx bx-building text-info"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </a>
                                    
                                </div><!-- end col -->
                                @endif
                                @if(session('user_type') == "Vendor")
                                <div class="col-xl-3 col-md-6">
                                    <!-- card -->
                                    <a href="/pendingpayments">
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                
                                                <div class="d-flex align-items-end justify-content-between mt-4">
                                                    <div>
                                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4">Pending Payments</h4>
                                                        
                                                    </div>
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <div class="avatar-sm flex-shrink-0">
                                                            <span class="avatar-title bg-info-subtle rounded fs-3">
                                                                <i class="bx bx-credit-card-alt text-info"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </a>
                                    
                                </div><!-- end col -->
                                @endif
                                @if(session('user_type') == "Event Coordinator")
                                <div class="col-xl-3 col-md-6">
                                    <!-- card -->
                                    <a href="/pendingpaymentscoordinator">
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                
                                                <div class="d-flex align-items-end justify-content-between mt-4">
                                                    <div>
                                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4">Pending Payments</h4>
                                                        
                                                    </div>
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <div class="avatar-sm flex-shrink-0">
                                                            <span class="avatar-title bg-info-subtle rounded fs-3">
                                                                <i class="bx bx-credit-card-alt text-info"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </a>
                                    
                                </div><!-- end col -->
                                @endif
                                @if(session('user_type') == "Vendor")
                                <div class="col-xl-3 col-md-6">
                                    <!-- card -->
                                    <a href="/eventscalendar">
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                
                                                <div class="d-flex align-items-end justify-content-between mt-4">
                                                    <div>
                                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4">Clients Events Calendar</h4>
                                                        
                                                    </div>
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <div class="avatar-sm flex-shrink-0">
                                                            <span class="avatar-title bg-info-subtle rounded fs-3">
                                                                <i class="bx bx-calendar text-info"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </a>
                                    
                                </div><!-- end col -->
                                @endif
                                @if(session('user_type') == "Event Coordinator")
                                <div class="col-xl-3 col-md-6">
                                    <!-- card -->
                                    <a href="/coordinatorcalendar">
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                
                                                <div class="d-flex align-items-end justify-content-between mt-4">
                                                    <div>
                                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4">Clients Events Calendar</h4>
                                                        
                                                    </div>
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <div class="avatar-sm flex-shrink-0">
                                                            <span class="avatar-title bg-info-subtle rounded fs-3">
                                                                <i class="bx bx-calendar text-info"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </a>
                                    
                                </div><!-- end col -->
                                @endif
                                <div class="col-xl-3 col-md-6">
                                    <!-- card -->
                                    <a href="/chatify">
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                
                                                <div class="d-flex align-items-end justify-content-between mt-4">
                                                    <div>
                                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4">Chat Room</h4>
                                                        
                                                    </div>
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <div class="avatar-sm flex-shrink-0">
                                                            <span class="avatar-title bg-info-subtle rounded fs-3">
                                                                <i class="bx bx-chat text-info"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </a>
                                    
                                </div><!-- end col -->

                              
                            </div> <!-- end row-->


                        </div> <!-- end .h-100-->

                    </div> <!-- end col -->
                </div>

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
    </div>
    <!-- end main content-->




@include('admin.footer')