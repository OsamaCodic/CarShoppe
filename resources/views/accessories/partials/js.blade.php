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
            $("#accessoryForm").validate({
                errorClass: "jqError fail-alert",
                validClass: "valid success-alert",

                rules: {
                    brand_id: {
                        required: true
                    },
                    type_id: {
                        required: true
                    },
                    title: {
                        required: true
                    },
                    price: {
                        required: true
                    },
                    tax: {
                        required: true
                    },
                    colours: {
                        required: true
                    },
                    display_order: {
                        required: true
                    },
                    release_date: {
                        required: true,
                        maxlength: 15,
                    },
                    delivery_date: {
                        maxlength: 15,
                    }
                },
                messages: {
                    brand: {
                        required: "Accessory must have brand!",
                    },
                    type: {
                        required: "Please select acccessory category!",
                    },
                    title: {
                        required: "Please acccessory title is important!",
                    },
                    price: {
                        required: "price should be given!",
                    },
                    tax: {
                        required: "At least one tax should apply!",
                    }
                },

                submitHandler: function(form) {

                    $('#submitBtn').attr('disabled', true);
                    $('#submitBtn').html("Please wait...")
                   
                    $.ajax({
                        url : $('#accessoryForm').attr('action'),
                        type: $('#accessoryForm').attr('method'),

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

    //Product delete
        function delete_accessory(obj)
        {
            var url = "{{ url('admin/accessories') }}";
            var dltUrl = url+"/"+obj.id;
        
            swal({
                    title: "Do you want to delete this Accessory?",
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
                            title: "Accessory deleted!",
                            text: "Accessory deleted permanently",
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
                    swal("Cancelled", "Your accessory is safe :)", "error");
                }
            });
        }
    //Product delete

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

            $("#accessoryTable input:checkbox:checked").each(function()
            {
                delete_rows_arr.push($(this).val());
            });

            swal({
                title: "Are you sure you want to delete selected Accessories?",
                text: "If you delete this, it will be delete permanently!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "{{ url('admin/accessories/delete_selected_rows') }}",
                        type:"POST",
                        data:{
                            delete_rows_arr:delete_rows_arr,
                        },        
                    })
                    .done(function(response) {
                        swal({
                            title: "Selected accessories deleted!",
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
                    swal("Cancelled", "Your accessories is safe :)", "error");
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
