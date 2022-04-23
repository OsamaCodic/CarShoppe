<script>
    $(document).ready(function () {
    
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
  
        // User Create
            $("#front_registerForm").validate({
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
                    },
                   
                },
                messages: {
                    first_name: {
                        required: "Please enter your first name!",
                    },
                    last_name: {
                        required: "Please enter your last name!",
                    },
                    Email: {
                        required: "Email must be required!",
                    },
                    password: {
                        required: "Password must be required!",
                    },
                },
  
                submitHandler: function(form) {
  
                    $('#regBtn').attr('disabled', true);
                    $('#regBtn').html("Please wait...")
                    $form = $(this);
                    
                    $.ajax({
                        url : $('#front_registerForm').attr('action'),
                        type: $('#front_registerForm').attr('method'),
                        data: $('#front_registerForm').serialize(),
                        
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
        // User Create
    });
  
  </script>
  
  