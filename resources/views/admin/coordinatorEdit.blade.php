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
                                <h4 class="card-title mb-0 flex-grow-1">Edit Event Coordinator Profile</h4>
                            </div><!-- end card header -->
                            <div class="card-body">
                                <div class="live-preview">
                                    <form action="/coordinatorprofilemanagement" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row gy-4">
                                            <div class="col-xxl-6 col-md-6">
                                                <div>
                                                    <label for="first_name" class="form-label">First Name</label>
                                                    <input type="text" name="first_name" value="{{$coordinator->first_name}}" class="form-control" id="first_name">
                                                    <input type="hidden" name="user_id" value="{{$coordinator->user_id}}">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-xxl-6 col-md-6">
                                                <div>
                                                    <label for="last_name" class="form-label">Last Name</label>
                                                    <input type="text" name="last_name" value="{{$coordinator->last_name}}" class="form-control" id="basiInput">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-xxl-6 col-md-6">
                                                <div>
                                                    <label for="email" class="form-label">Email Address</label>
                                                    <input type="email" name="email" value="{{$coordinator->email}}" class="form-control" id="email">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-xxl-6 col-md-6">
                                                <div>
                                                    <label for="contact_number" class="form-label">Contact Number</label>
                                                    <input type="text" name="contact_number" value="{{$coordinator->contact_number}}" class="form-control" id="contact_number">
                                                </div>
                                            </div>
                                            <div class="col-xxl-6 col-md-6">
                                                <div>
                                                    <label for="contact_number" class="form-label">Location</label>
                                                    <input type="text" name="location" value="{{$coordinator->location}}" class="form-control" id="contact_number">
                                                </div>
                                            </div>
                                            <div class="col-xxl-6 col-md-6">
                                                <label for="bank" class="form-label">Events Offered</label>
                                                <select class="required form-control multiple_selects" name="events_offered[]" multiple="multiple">
                                                    @foreach($events as $option)
                                                        <option @if(in_array($option->event_name , $coordinatorEvents)) selected @endif value="{{$option->event_name}}">{{$option->event_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-xxl-6 col-md-6">
                                                <label for="price" class="form-label">Price</label>
                                                <input type="text" name="price" class="form-control" id="basiInput" value="{{$coordinator->price}}">
                                            </div>
                                            <div class="col-xxl-6 col-md-6">
                                                <label for="main_photo" class="form-label">Main Photo</label>
                                                <input class="form-control" name="main_photo" id="formSizeDefault" type="file" accept="image/*" id="main_photo">
                                            </div>
                                            <div class="col-xxl-6 col-md-6">
                                                <label for="additional_photos" class="form-label">Additional Photos</label>
                                                <input class="form-control" name="additional_photos[]" multiple id="formSizeDefault" type="file" accept="image/*" id="additional_photos">
                                            </div>
                                            <div class="col-xxl-6 col-md-6">
                                                <label for="additional_photos" class="form-label">Package Photos</label>
                                                <input class="form-control" name="package_photos[]" type="file" multiple accept="image/*" id="additional_photos">
                                            </div>
                                            <div class="col-xxl-6 col-md-6">
                                                <label for="description" class="form-label">Description</label>
                                                <textarea class="form-control" name="description" id="description">{{$coordinator->description}}</textarea>
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