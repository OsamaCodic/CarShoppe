<script>
    $(document).ready(function () {
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // User Create/Update
            $("#userForm").validate({
                errorClass: "jqError fail-alert",
                validClass: "valid success-alert",

                rules: {
                    first_name: {
                        required: true,
                        minlength: 3,
                        maxlength: 10,
                    },
                    last_name: {
                        required: true,
                        minlength: 3,
                        maxlength: 10,
                    },
                    email: {
                        required: true,
                        email: true,
                    },
                    password: {
                        required: true,
                        minlength: 4,
                        maxlength: 15
                    }
                },
                messages: {
                    first_name: {
                        required: "Please enter your first name!",
                    },
                    last_name: {
                        required: "Please enter your last name!",
                    }
                },

                submitHandler: function(form) {
                    $.ajax({
                        url : $('#userForm').attr('action'),
                        type: $('#userForm').attr('method'),
                        data: $('#userForm').serialize(),
                        
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
        // Survey Create/Update
    });

    //User delete
        function delete_user(obj)
        {
            var url = "{{ url('admins/users') }}";
            var dltUrl = url+"/"+obj.id;
        
            swal({
                    title: "Do you want to delete this User?",
                    text: obj.first_name + " " + obj.last_name,
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
                            title: "User deleted!",
                            text: "User deleted permanently",
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
                    swal("Cancelled", "Your User is safe :)", "error");
                }
            });
        }
    //User delete
</script>

