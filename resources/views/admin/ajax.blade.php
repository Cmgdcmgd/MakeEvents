<script> 

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

@if(session()->has('message'))
    toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.success("{{ session()->get('message') }}");
@endif

$('.deleteuser').click(function(e){

    e.preventDefault();

    var id = $(this).attr("id");
    
    Swal.fire({
        title: 'Are you sure?',
        text: "you want to delete this user?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
    }).then((willDelete) => {
        if (willDelete.isConfirmed) {
            Swal.fire(
                'Deleted!',
                'User has been deleted.',
                'success'
            ).then((confirmdelete) => {
                if(confirmdelete){
                    $.ajax({
                        url: '/deleteuser',
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
});

$('.deleteFacility').click(function(e){

    e.preventDefault();

    var id = $(this).attr("id");

    Swal.fire({
        title: 'Are you sure?',
        text: "you want to delete this facility?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
    }).then((willDelete) => {
        if (willDelete.isConfirmed) {
            Swal.fire(
                'Deleted!',
                'Facility has been deleted.',
                'success'
            ).then((confirmdelete) => {
                if(confirmdelete){
                    $.ajax({
                        url: '/deletefacility',
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
});

$('.deletealbum').click(function(e){

    e.preventDefault();

    var id = $(this).attr("id");

    Swal.fire({
        title: 'Are you sure?',
        text: "you want to delete this album?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
    }).then((willDelete) => {
        if (willDelete.isConfirmed) {
            Swal.fire(
                'Deleted!',
                'Album has been deleted.',
                'success'
            ).then((confirmdelete) => {
                if(confirmdelete){
                    $.ajax({
                        url: '/deletealbum',
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
});


$('.deletecoordinatoralbum').click(function(e){

    e.preventDefault();

    var id = $(this).attr("id");

    Swal.fire({
        title: 'Are you sure?',
        text: "you want to delete this album?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
    }).then((willDelete) => {
        if (willDelete.isConfirmed) {
            Swal.fire(
                'Deleted!',
                'Album has been deleted.',
                'success'
            ).then((confirmdelete) => {
                if(confirmdelete){
                    $.ajax({
                        url: '/deletecoordinatoralbum',
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
});





$('.description').click(function(e){

    e.preventDefault();

    var description = $(this).attr("data-description");

    $('#modalBodyDescription').empty();

    $('#modalBodyDescription').append('<p>' + description + '</p>');
});

$('.mainphoto').click(function(e){

    e.preventDefault();

    var mainphoto = $(this).attr("data-mainphoto");

    $('#mainPhotoBody').empty();

    $('#mainPhotoBody').append('<img src="mainpage/main photos/' + mainphoto + '"width="90%">');
});

$('.facility_photo').click(function(e){

e.preventDefault();

var mainphoto = $(this).attr("data-mainphoto");

$('#mainPhotoBody').empty();

$('#mainPhotoBody').append('<img src="{{asset("mainpage/facilities")}}/' + mainphoto + '"width="90%">');
});

$('.otherphotos').click(function(e){

    e.preventDefault();

    var otherphoto = $(this).attr("id");

    $('#otherPhotoBody').empty();
    $('#otherPhotoLabel').empty();

    $('#otherPhotoBody').append('<img src="mainpage/additional photos/' + otherphoto + '" width="90%">');
    $('#otherPhotoLabel').append(otherphoto);
});

$('.albumphotos').click(function(e){

e.preventDefault();

var otherphoto = $(this).attr("id");

$('#otherPhotoBody').empty();
$('#otherPhotoLabel').empty();

$('#otherPhotoBody').append('<img src="{{asset("mainpage/albums")}}/' + otherphoto + '" width="90%">');
$('#otherPhotoLabel').append(otherphoto);
});


$('.mainphotocoordinator').click(function(e){

e.preventDefault();

var mainphoto = $(this).attr("data-mainphoto");

$('#mainPhotoBody').empty();

$('#mainPhotoBody').append('<img src="mainpage/coordinators/main photos/' + mainphoto + '"width="90%">');
});

$('.otherphotoscoordinator').click(function(e){

e.preventDefault();

var otherphoto = $(this).attr("id");

$('#otherPhotoBody').empty();
$('#otherPhotoLabel').empty();

$('#otherPhotoBody').append('<img src="mainpage/coordinators/additional photos/' + otherphoto + '" width="90%">');
$('#otherPhotoLabel').append(otherphoto);
});

$('.deletevenue').click(function(e){

    e.preventDefault();

    var id = $(this).attr("id");
    Swal.fire({
        title: 'Are you sure?',
        text: "you want to delete this venue?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
    }).then((willDelete) => {
        if (willDelete.isConfirmed) {
            Swal.fire(
                'Deleted!',
                'Venue has been deleted.',
                'success'
            ).then((confirmdelete) => {
                if(confirmdelete){
                    $.ajax({
                        url: '/deletevenue',
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
});

$('.confirmpayment').click(function(e){

    e.preventDefault();

    var id = $(this).attr("id");

    Swal.fire({
        title: 'Are you sure?',
        text: "you want to confirm the payment for this reservation",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
    }).then((willConfirm) => {
        if (willConfirm.isConfirmed) {
            Swal.fire(
                'Confirmed!',
                'Payment has been confirmed.',
                'success'
            ).then((confirmdelete) => {
                if(confirmdelete){
                    $.ajax({
                        url: '/confirmpayment',
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

$('.confirmpaymentcoordinator').click(function(e){

e.preventDefault();

var id = $(this).attr("id");

Swal.fire({
    title: 'Are you sure?',
    text: "you want to confirm the payment for this reservation",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes!'
}).then((willConfirm) => {
    if (willConfirm.isConfirmed) {
        Swal.fire(
            'Confirmed!',
            'Payment has been confirmed.',
            'success'
        ).then((confirmdelete) => {
            if(confirmdelete){
                $.ajax({
                    url: '/confirmpaymentcoordinator',
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


$(".multiple_selects").select2({
    tags: true,
    allowClear: true,
    tokenSeparators: [','],
    minimumResultsForSearch: -1,
});
</script>