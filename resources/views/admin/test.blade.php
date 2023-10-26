@include('admin.header')
@include('admin.navbar')

 <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

          <div class="page-content">
              <div class="container-fluid">

                  <!-- start page title -->
                  <div class="row">
                      <div class="col-12">
                          <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                              <h4 class="mb-sm-0">Datatables</h4>

                              <div class="page-title-right">
                                  <ol class="breadcrumb m-0">
                                      <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                      <li class="breadcrumb-item active">Datatables</li>
                                  </ol>
                              </div>

                          </div>
                      </div>
                  </div>
                  <!-- end page title -->

                  <div class="row">
                      <div class="col-lg-12">
                          <div class="card">
                              <div class="card-header">
                                  <h5 class="card-title mb-0">Basic Datatables</h5>
                              </div>
                              <div class="card-body">
                                  <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                      <thead>
                                          <tr>
                                              <th scope="col" style="width: 10px;">
                                                  <div class="form-check">
                                                      <input class="form-check-input fs-15" type="checkbox" id="checkAll" value="option">
                                                  </div>
                                              </th>
                                              <th data-ordering="false">SR No.</th>
                                              <th data-ordering="false">ID</th>
                                              <th data-ordering="false">Purchase ID</th>
                                              <th data-ordering="false">Title</th>
                                              <th data-ordering="false">User</th>
                                              <th>Assigned To</th>
                                              <th>Created By</th>
                                              <th>Create Date</th>
                                              <th>Status</th>
                                              <th>Priority</th>
                                              <th>Action</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <tr>
                                              <th scope="row">
                                                  <div class="form-check">
                                                      <input class="form-check-input fs-15" type="checkbox" name="checkAll" value="option1">
                                                  </div>
                                              </th>
                                              <td>01</td>
                                              <td>VLZ-452</td>
                                              <td>VLZ1400087402</td>
                                              <td><a href="#!">Post launch reminder/ post list</a></td>
                                              <td>Joseph Parker</td>
                                              <td>Alexis Clarke</td>
                                              <td>Joseph Parker</td>
                                              <td>03 Oct, 2021</td>
                                              <td><span class="badge bg-info-subtle text-info">Re-open</span></td>
                                              <td><span class="badge bg-danger">High</span></td>
                                              <td>
                                                  <div class="dropdown d-inline-block">
                                                      <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                          <i class="ri-more-fill align-middle"></i>
                                                      </button>
                                                      <ul class="dropdown-menu dropdown-menu-end">
                                                          <li><a href="#!" class="dropdown-item"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>
                                                          <li><a class="dropdown-item edit-item-btn"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
                                                          <li>
                                                              <a class="dropdown-item remove-item-btn">
                                                                  <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete
                                                              </a>
                                                          </li>
                                                      </ul>
                                                  </div>
                                              </td>
                                          </tr>

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

          <footer class="footer">
              <div class="container-fluid">
                  <div class="row">
                      <div class="col-sm-6">
                          <script>document.write(new Date().getFullYear())</script> © Velzon.
                      </div>
                      <div class="col-sm-6">
                          <div class="text-sm-end d-none d-sm-block">
                              Design & Develop by Themesbrand
                          </div>
                      </div>
                  </div>
              </div>
          </footer>
      </div>
      <!-- end main content-->

@include('admin.footer')