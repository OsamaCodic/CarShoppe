<script>
    $(document).ready(function () {
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // User Create/Update
            $("#productForm").validate({
                errorClass: "jqError fail-alert",
                validClass: "valid success-alert",

                rules: {
                    brand_id: {
                        required: true
                    },
                    type_id: {
                        required: true
                    },
                    name: {
                        required: true
                    },
                    model: {
                        required: true,
                        maxlength:4,
                        minlength:4
                    },
                    display_order: {
                        required: true
                    },
                    fuel_average: {
                        required: true
                    },
                    engine_cc: {
                        required: true
                    },
                    varients: {
                        required: true
                    },
                    price: {
                        required: true
                    },
                    transmission: {
                        required: true
                    },
                    gears: {
                        required: true
                    },
                    no_of_doors: {
                        required: true
                    },
                    dimensions: {
                        required: true
                    },
                },
                messages: {
                    brand: {
                        required: "Product Brand must be selected!",
                        maxlength: "Year digits should be 4!",
                    },
                    type: {
                        required: "Type must be selected!",
                    },
                    name: {
                        required: "Please enter your product name!",
                    },
                    model: {
                        required: "Model should be given!",
                    },
                    varients: {
                        required: "At least one varient is required!",
                    }
                },

                submitHandler: function(form) {
                    $.ajax({
                        url : $('#productForm').attr('action'),
                        type: $('#productForm').attr('method'),
                        data: $('#productForm').serialize(),
                        
                        success: function(response)
                        {
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

    $('#transmission').on('change', function(){
        // Radio toggles will show base on Dropdown Change
        if(this.value == "Automatic")
        {
            if ($( "#selected_transmission" ).hasClass('col-md-3'))
            {
                $( "#selected_transmission" ).removeClass( 'col-md-3');
            }
            else
            {
                $( "#selected_transmission" ).addClass( 'col-md-6');
            }
            $("#select_gears").slideUp('fast')
        }
        else if(this.value == "Mannual")
        { 
            if ($( "#selected_transmission" ).hasClass('col-md-6'))
            {
                $( "#selected_transmission" ).removeClass( 'col-md-6');
            }
            else
            {
                $( "#selected_transmission" ).addClass( 'col-md-3');
            }
            $("#select_gears").slideDown('fast')
        }
        else
        {
            if ($( "#selected_transmission" ).hasClass('col-md-3'))
            {
                $( "#selected_transmission" ).removeClass( 'col-md-3');
            }
            else
            {
                $( "#selected_transmission" ).addClass( 'col-md-6');
            }
            $("#select_gears").slideUp('fast')
        }
    });

    //User delete
        function delete_user(obj)
        {
            var url = "{{ url('admin/users') }}";
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

    $('#featuresForm').on('submit', function (e) {
        e.preventDefault();
        $form = $(this);
        $.ajax({
            url : $(this).attr('action'),
            type: $(this).attr('method'),
            data: $form.serialize(),
        })
        .done(function(response) {
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
        })
    });


</script>

