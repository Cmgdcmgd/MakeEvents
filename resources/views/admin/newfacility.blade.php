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
                                <h4 class="card-title mb-0 flex-grow-1">Add new facility for {{$venue->venue_name}}</h4>
                            </div><!-- end card header -->
                            <div class="card-body">
                                <div class="live-preview">
                                    <form action="/addfacility" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="venue_id" value="{{$venue->venue_id}}">
                                        <div class="row gy-4">
                                            <div class="col-xxl-6 col-md-6">
                                                <div>
                                                    <label for="venue_name" class="form-label">Facility Name</label>
                                                    <input type="text" name="title" class="form-control" id="title">
                                                </div>
                                            </div>
                                            <!--end col--> 
                                            <div class="col-xxl-6 col-md-6">
                                                <label for="main_photo" class="form-label">Photo</label>
                                                <input class="form-control" name="photo" type="file" accept="image/*" id="main_photo">
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
                                                <a href="/venuefacilitylist/{{$venue->venue_id}}"><button type="button" class="btn btn-danger waves-effect waves-light">Cancel</button></a>
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