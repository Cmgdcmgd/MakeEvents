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
                                <div class="card-header">
                                    <h4 class="card-title mb-0">Album list for {{$coordinator->coordinatorUser->first_name}}</h4>
                                </div><!-- end card header -->

                                <div class="card-body">
                                    <div class="listjs-table" id="customerList">
                                        <div class="row g-4 mb-3">
                                            <div class="col-sm-auto">
                                                <div>
                                                    <a href="/newcoordinatoralbum/{{$coordinator->coordinator_id}}"><button type="button" class="btn btn-success add-btn"><i class="ri-add-line align-bottom me-1"></i>Add New Album</button></a>
                                                </div>
                                            </div>
                                            <div class="col-sm">
                                                <div class="d-flex justify-content-sm-end">
                                                    <div class="search-box ms-2">
                                                        <input type="text" class="form-control search" placeholder="Search...">
                                                        <i class="ri-search-line search-icon"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="table-responsive table-card mt-3 mb-1">
                                            <table class="table align-middle table-nowrap" id="customerTable">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th data-sort="customer_name">Album Title</th>
                                                        <th data-sort="phone">Photos</th>
                                                        <th data-sort="action">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="list form-check-all">
                                                    @foreach ($data as $album)
                                                        <tr>
                                                            <td class="customer_name">{{$album->title}}</td>
                                                           
                                                            <td class="date">
                                                                @php
                                                                    $otherpics = explode(",",$album->photos);
                                                                @endphp
                                                                @for ($i = 0; $i < count($otherpics); $i++)
                                                                @if ($i > 0)
                                                                    @if ($i+1 == count($otherpics))
                                                                        <a href="#" class="albumphotos" id="{{$otherpics[$i]}}" data-bs-toggle="modal" data-bs-target="#otherPhotoModal">{{$otherpics[$i]}}</a>,
                                                                    @else
                                                                        <a href="#" class="albumphotos" id="{{$otherpics[$i]}}" data-bs-toggle="modal" data-bs-target="#otherPhotoModal">{{$otherpics[$i]}}</a>,
                                                                    @endif
                                                                @else
                                                                    <a href="#" class="albumphotos" id="{{$otherpics[$i]}}" data-bs-toggle="modal" data-bs-target="#otherPhotoModal">{{$otherpics[$i]}}</a>,
                                                                @endif
                                                                    
                                                                @endfor
                                                            </td>
                                                            <td>
                                                                <div class="d-flex gap-2">
                                                                    <div class="remove">
                                                                        <button class="btn btn-sm btn-danger remove-item-btn deletecoordinatoralbum" id="{{$album->id}}">Delete</button>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <div class="noresult" style="display: none">
                                                <div class="text-center">
                                                    <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px"></lord-icon>
                                                    <h5 class="mt-2">Sorry! No Result Found</h5>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-end">
                                            <div class="pagination-wrap hstack gap-2">
                                                <a class="page-item pagination-prev disabled" href="javascript:void(0);">
                                                    Previous
                                                </a>
                                                <ul class="pagination listjs-pagination mb-0"></ul>
                                                <a class="page-item pagination-next" href="javascript:void(0);">
                                                    Next
                                                </a>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div><!-- end card -->
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            <!-- Description Modal -->
           
            <div id="otherPhotoModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="otherPhotoLabel"></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                        </div>
                        <div class="modal-body">
                            <div id="otherPhotoBody" class="text-center">
                                
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        </div>
                    
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div>
        <!-- end main content-->
@include('admin.footer')