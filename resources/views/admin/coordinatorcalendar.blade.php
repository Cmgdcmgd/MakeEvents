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
                                <h4 class="mb-sm-0">Calendar</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Apps</a></li>
                                        <li class="breadcrumb-item active">Calendar</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card card-h-100">
                                <div class="card-body">
                                    <div class="mt-1 mb-1">
                                        <div id="calendar1"></div>
                                    </div>
                                    
                                </div>
                            </div>

                            <div style='clear:both'></div>
                            <!-- Modal -->
                            <div id="eventModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content border-0">
                                        <div class="modal-header p-3 bg-info-subtle">
                                            <h5 class="modal-title" id="eventmodaltitle"></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                        </div>
                                        <div class="modal-body p-4">
                                            <div class="event-details">
                                                <div class="d-flex mb-2">
                                                    <div class="flex-grow-1 d-flex align-items-center">
                                                        <div class="flex-shrink-0 me-3">
                                                            <i class="ri-calendar-event-line text-muted fs-16"></i>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h6 class="d-block fw-semibold mb-0" id="eventstart"></h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center mb-2">
                                                    <div class="flex-shrink-0 me-3">
                                                        <i class="ri-phone-line text-muted fs-16"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="d-block fw-semibold mb-0"> <span id="eventnumber"></span></h6>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center mb-2">
                                                    <div class="flex-shrink-0 me-3">
                                                        <i class="ri-mail-line text-muted fs-16"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="d-block fw-semibold mb-0"> <span id="eventemail"></span></h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end row-->
                                            <div class="hstack gap-2 justify-content-end">
                                                <button type="button" class="btn btn-soft-danger eventdelete" id="btn-delete-event"><i class="ri-close-line align-bottom"></i> Cancel Event</button>
                                            </div>
                                        </div>
                                    </div> <!-- end modal-content-->
                                </div> <!-- end modal dialog-->
                            </div><!-- /.modal -->
                        </div>
                    </div> <!-- end row-->
                    

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
        </div>
        <!-- end main content-->

<!-- calendar min js -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
<!-- JAVASCRIPT -->
<script src="{{asset('admin/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('admin/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('admin/libs/node-waves/waves.min.js')}}"></script>
<script src="{{asset('admin/libs/feather-icons/feather.min.js')}}"></script>
<script src="{{asset('admin/js/pages/plugins/lord-icon-2.1.0.js')}}"></script>
<script src="{{asset('admin/js/plugins.js')}}"></script>

<!-- apexcharts -->
<script src="{{asset('admin/libs/apexcharts/apexcharts.min.js')}}"></script>
<!-- Vector map-->
<script src="{{asset('admin/libs/jsvectormap/js/jsvectormap.min.js')}}"></script>
<script src="{{asset('admin/libs/jsvectormap/maps/world-merc.js')}}"></script>
<!--Swiper slider js-->
<script src="{{asset('admin/libs/swiper/swiper-bundle.min.js')}}"></script>
<!-- Dashboard init -->
<script src="{{asset('admin/js/pages/dashboard-ecommerce.init.js')}}"></script>
<!-- App js -->
{{-- <script src="{{asset('admin/js/app.js')}}"></script> --}}
<!-- Toastr -->
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" async></script> --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var booking = @json($events);

        $('#calendar1').fullCalendar({
            header: 
                {
                    left: 'prev, next today',
                    center: 'title',
                    right: 'month, agendaWeek, agendaDay',
                },
            events: booking,
            selectable: true,
            selectHelper: true,
            editable: true,
            eventDrop: function(event) {
                var id = event.id;
                var start_date = moment(event.start).format('YYYY-MM-DD');
                var end_date = moment(event.end).format('YYYY-MM-DD');

                $.ajax({
                    url:"updatecoordinatorevent/"+ id,
                    type:"PATCH",
                    dataType:'json',
                    data:{ start_date, end_date  },
                        success:function(response){
                            toastr.success("Event Updated!");
                        },
                        error:function(error){
                            console.log(error)
                        },
                    });
                },
                eventClick: function(event){
                    
                    var id = event.id;

                    $('#eventmodaltitle').empty();
                    $('#eventstart').empty();
                    $('#eventlocation').empty();
                    $('#eventnumber').empty();
                    $('#eventemail').empty();

                    $('#eventmodaltitle').append(event.title);
                    $('#eventstart').append(event.reserved);
                    $('#eventlocation').append(event.location);
                    $('#eventnumber').append(event.phone);
                    $('#eventemail').append(event.email);

                    $('#eventModal').modal('toggle');
                    

                    $('.eventdelete').click(function(e){
                        e.preventDefault();

                        Swal.fire({
                            title: 'Are you sure?',
                            text: "you want to cancel this event?",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes!'
                        }).then((willDelete) => {
                            if (willDelete.isConfirmed) {
                                Swal.fire(
                                    'Cancelled!',
                                    'Event has been cancelled.',
                                    'success'
                                ).then((confirmdelete) => {
                                    if(confirmdelete){
                                        $.ajax({
                                            url: '/coordinatoreventcancel',
                                            type: 'POST',
                                            data: {
                                                id: id
                                            },
                                            dataType: 'HTML',
                                            success: function(response){
                                                window.location.reload();
                                            }
                                        });
                                    }
                                });
                            }
                        });
                    })
                }
                
        })
    });
</script>
