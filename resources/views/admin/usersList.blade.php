@include('admin.header')
@include('admin.navbar')

    <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                   <!-- start page title -->
                  
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Users List 
                                    <a href="/newuser"><button type="button" class="btn btn-success add-btn" style="float: right"><i class="ri-add-line align-bottom me-1"></i>Add New User</button></a>
                                </h5>
                                
                            </div>
                            <div class="card-body">
                                <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email Address</th>
                                            <th>Contact Number</th>
                                            <th>User Type</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $users)
                                        <tr>
                                            <td>{{$users->first_name}} {{$users->last_name}}</td>
                                            <td>{{$users->email}}</td>
                                            <td>{{$users->contact_number}}</td>
                                            <td>{{$users->user_type}}</td>
                                            <td>
                                                @if($users->status == 1)
                                                <span class="badge bg-success-subtle text-success text-uppercase">Active</span>
                                                @else
                                                <span class="badge bg-danger-subtle text-danger text-uppercase">Deactivated</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <div class="edit">
                                                        <a href="/useredit/{{$users->id}}"><button class="btn btn-sm btn-success edit-item-btn">Edit</button></a>
                                                    </div>
                                                    <div class="remove">
                                                        <button class="btn btn-sm btn-danger remove-item-btn deleteuser" id="{{$users->id}}">Delete</button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->


                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            
        </div>
        <!-- end main content-->
@include('admin.footer')