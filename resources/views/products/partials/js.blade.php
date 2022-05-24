<script>
    $(document).ready(function () {

        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $("#advanceSearchBtn").click(function(){        

            $("#advanceSearchForm").submit(); // Submit the form
        });

        // Product Create/Update
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

                    $('#submitBtn').attr('disabled', true);
                    $('#submitBtn').html("Please wait...")
                   
                    $.ajax({
                        url : $('#productForm').attr('action'),
                        type: $('#productForm').attr('method'),

                        dataType: "JSON",
                        data: new FormData(form),
                        processData: false,
                        contentType: false,
                        
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
        // Product Create/Update
    });

    var transmission = $('#transmission').val()
    if(transmission == "Automatic")
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
    else if(transmission == "Mannual")
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

    //Product delete
        function delete_product(obj)
        {
            var url = "{{ url('admin/products') }}";
            var dltUrl = url+"/"+obj.id;
        
            swal({
                    title: "Do you want to delete this Product?",
                    text: obj.name,
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
                            title: "Product deleted!",
                            text: "Product deleted permanently",
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
                    swal("Cancelled", "Your Product is safe :)", "error");
                }
            });
        }
    //Product delete

    //Product Features Create
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
    //Product Features Create


    $('#varients').keydown(function (e) { 
        if (e.keyCode == 13) {
            $('#varients').val($('#varients').val() + ', ');
        }
    });
    $('#colours').keydown(function (e) { 
        if (e.keyCode == 13) {
            $('#colours').val($('#colours').val() + ', ');
        }
    });

    //File upload Validation and preview
        function previewImages() {

            var $preview = $('#preview').empty();
            if (this.files) $.each(this.files, readAndPreview);

            function readAndPreview(i, file) {
            
            if (!/\.(jpe?g|png|gif)$/i.test(file.name)){
                return alert(file.name +" is not an image");
            } // else...
            
            var reader = new FileReader();

            $(reader).on("load", function() {
                $preview.append($("<img/>", {src:this.result, height:100}));
            });

            reader.readAsDataURL(file);
            
            }
        }
        $('#file-input').on("change", previewImages);
    //File upload Validation and preview

    // Selected surveys Delete
        function deleletCheckboxes()
        {
            if($('#delete_selected').is(":checked"))
            {
                $(".delete").fadeOut("fast");
                setTimeout(function(){ $(".form-check-input").fadeIn("slow"); }, 200);
                $("#del_rows_btn").fadeIn("slow");
                $("#checkbox_delete_Label").removeClass("text-secondary");
                $("#checkbox_delete_Label").addClass("text-danger");
            }  
            else
            {
                setTimeout(function(){ $(".delete").fadeIn("slow"); }, 200);
                $(".form-check-input").fadeOut("fast");
                $("#del_rows_btn").fadeOut("slow");
                $("#checkbox_delete_Label").removeClass("text-danger");
                $("#checkbox_delete_Label").addClass("text-secondary");
            }
        }

        $('#del_rows_btn').click( function(evt) {

            evt.preventDefault();
            var delete_rows_arr = [];

            $("#productTable input:checkbox:checked").each(function()
            {
                delete_rows_arr.push($(this).val());
            });

            swal({
                title: "Are you sure you want to delete selected Products?",
                text: "If you delete this, it will be delete permanently!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "{{ url('admin/products/delete_selected_rows') }}",
                        type:"POST",
                        data:{
                            delete_rows_arr:delete_rows_arr,
                        },        
                    })
                    .done(function(response) {
                        swal({
                            title: "Selected Products deleted!",
                            text: "Records deleted permanently",
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
                    swal("Cancelled", "Your surveys is safe :)", "error");
                }
            });
        });
    // Selected surveys Delete
        
    ClassicEditor
        .create( document.querySelector( '#description' ) )
        .catch( error => {
            console.error( error );
        } );

</script>
