@include('admin.header')
@include('admin.navbar')

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">New User</h4>
                            </div><!-- end card header -->
                            <div class="card-body">
                                <div class="live-preview">
                                    <form action="/adduser" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row gy-4">
                                            <div class="col-xxl-6 col-md-6">
                                                <div>
                                                    <label for="first_name" class="form-label">First Name</label>
                                                    <input type="text" name="first_name" class="form-control" id="first_name">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-xxl-6 col-md-6">
                                                <div>
                                                    <label for="last_name" class="form-label">Last Name</label>
                                                    <input type="text" name="last_name" class="form-control" id="basiInput">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-xxl-6 col-md-6">
                                                <div>
                                                    <label for="email" class="form-label">Email Address</label>
                                                    <input type="email" name="email" class="form-control" id="email">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-xxl-6 col-md-6">
                                                <div>
                                                    <label for="password" class="form-label">Password</label>
                                                    <input type="password" name="password" class="form-control" id="password">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-xxl-6 col-md-6">
                                                <div>
                                                    <label for="confirm_password" class="form-label">Confirm Password</label>
                                                    <input type="password" name="password_confirmation" class="form-control" id="confirm_password">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-xxl-6 col-md-6">
                                                <div>
                                                    <label for="contact_number" class="form-label">Contact Number</label>
                                                    <input type="text" name="contact_number" class="form-control" id="contact_number">
                                                </div>
                                            </div>
                                            <div class="col-xxl-6 col-md-6">
                                                <label for="usertype" class="form-label">User Type</label>
                                                <select class="form-select mb-3" name="user_type" aria-label="Default select example" id="usertype">
                                                    <option selected disabled></option>
                                                    <option value="Administrator">Administrator</option>
                                                    <option value="Vendor">Vendor</option>
                                                    <option value="Event Coordinator">Event Coordinator</option>
                                                    <option value="Customer">Customer</option>
                                                </select>
                                            </div>
                                            <!--end col-->
                                            <div class="col-xxl-6 col-md-6">
                                                <label for="profpic" class="form-label">Profile Picture</label>
                                                <input class="form-control" name="profpic" id="formSizeDefault" type="file" accept="image/*" id="profpic">
                                            </div>
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            <div class="col-xxl-12 col-md-6 text-center">
                                                <button type="submit" class="btn btn-secondary waves-effect waves-light">Submit</button>
                                                <a href="/dashboard"><button type="button" class="btn btn-danger waves-effect waves-light">Cancel</button></a>
                                            </div>
                                        </div>
                                    </form>
                                    <!--end row-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div> <!-- container-fluid -->
        </div><!-- End Page-content -->
    </div>

@include('admin.footer')