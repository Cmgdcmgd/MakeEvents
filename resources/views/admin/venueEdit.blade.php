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
                                <h4 class="card-title mb-0 flex-grow-1">Venue Edit</h4>
                            </div><!-- end card header -->
                            <div class="card-body">
                                <div class="live-preview">
                                    <form action="/editvenue" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row gy-4">
                                            <div class="col-xxl-6 col-md-6">
                                                <div>
                                                    <label for="venue_name" class="form-label">Name</label>
                                                    <input type="text" name="venue_name" value="{{$venue->venue_name}}" class="form-control" id="venue_name">
                                                    <input type="hidden" name="venue_id" value="{{$venue->venue_id}}">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-xxl-6 col-md-6">
                                                <div>
                                                    <label for="price" class="form-label">Price</label>
                                                    <input type="text" name="price" value="{{$venue->price}}" class="form-control" id="basiInput">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-xxl-6 col-md-6">
                                                <div>
                                                    <label for="email_address" class="form-label">Email Address</label>
                                                    <input type="email" name="email_address" value="{{$venue->email_address}}" class="form-control" id="email_address">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-xxl-6 col-md-6">
                                                <div>
                                                    <label for="location" class="form-label">Location</label>
                                                    <input type="text" name="location" value="{{$venue->location}}" class="form-control" id="location">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-xxl-6 col-md-6">
                                                <div>
                                                    <label for="contact_number" class="form-label">Contact Number</label>
                                                    <input type="text" name="contact_number" value="{{$venue->contact_number}}" class="form-control" id="contact_number">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-xxl-6 col-md-6">
                                                <label for="main_photo" class="form-label">Main Photo</label>
                                                <input class="form-control" name="main_photo" type="file" accept="image/*" id="main_photo">
                                            </div>
                                            <div class="col-xxl-6 col-md-6">
                                                <label for="additional_photos" class="form-label">Additional Photos</label>
                                                <input class="form-control" name="additional_photos[]" type="file" multiple accept="image/*" id="additional_photos">
                                            </div>
                                            <div class="col-xxl-6 col-md-6">
                                                <label for="bank" class="form-label">Bank name - Account Number</label>
                                                <input class="form-control" name="bank" type="text" id="bank" value="{{$venue->bank}}">
                                            </div>
                                            <div class="col-xxl-6 col-md-6">
                                                <label for="description" class="form-label">Description</label>
                                                <textarea class="form-control" name="description" id="description">{{$venue->description}}</textarea>
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