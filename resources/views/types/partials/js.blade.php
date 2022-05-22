<script>
    $(document).ready(function () {
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Type Create/Update
            $("#typeForm").validate({
                errorClass: "jqError fail-alert",
                validClass: "valid success-alert",

                rules: {
                    title: {
                        required: true,
                        minlength: 3,
                        maxlength: 15,
                    },
                    
                    display_order: {
                        required: true,
                    },
                    
                },
                messages: {
                    title: {
                        required: "Brand must have title!",
                    },
                    last_name: {
                        display_order: "Order is required!",
                    }
                },

                submitHandler: function(form) {

                    $('#submitBtn').attr('disabled', true);
                    $('#submitBtn').html("Please wait...")
                    $form = $(this);
                    
                    $.ajax({
                        url : $('#typeForm').attr('action'),
                        type: $('#typeForm').attr('method'),
                        data: $('#typeForm').serialize(),
                        
                        success: function(response){
                            swal({
                                text: response.status,
                                timer: 5000,
                                icon:"success",
                                showConfirmButton: false,
                                type: "error"
                            })
                            setTimeout(function(){
                                location.href = response.redirect_url;
                            }, 1000);
                        }
                    });
                }
            });
        // Type Create/Update
    });

    //Type delete
        function delete_type(obj)
        {
            var url = "{{ url('admin/types') }}";
            var dltUrl = url+"/"+obj.id;
        
            swal({
                    title: "Do you want to delete this Type?",
                    text: obj.title,
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: dltUrl,
                        type: "DELETE",
                        data:{
                            _token:'{{ csrf_token() }}',
                            id:'id'
                        }           
                    })
                    .done(function(response) {
                        swal({
                            title: "Type deleted!",
                            text: "Type deleted permanently",
                            icon: "success",
                            timer: 5000,
                            buttons: false,
                            dangerMode: true,
                        })
                        setTimeout(function(){
                            location.reload();
                        }, 1000);
                    })
                }
                else {
                    swal("Cancelled", "Your type is safe :)", "error");
                }
            });
        }
    //Type delete
    
    ClassicEditor
        .create( document.querySelector( '#description' ) )
        .catch( error => {
            console.error( error );
        } );

</script>