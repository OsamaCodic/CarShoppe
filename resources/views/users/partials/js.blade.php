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
                            location.href = response.redirect_url;
                        }          
                    });
                }
            });
        // Survey Create/Update
    });
</script>

