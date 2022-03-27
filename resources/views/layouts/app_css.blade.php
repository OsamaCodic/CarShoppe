{{-- Toggle Button --}}
<style>
        
    /* The switch - the box around the slider */
    .switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 24;
    }

    /* Hide default HTML checkbox */
    .switch input {
    opacity: 0;
    width: 0;
    height: 0;
    }

    /* The Blue Slider */
        .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: -5px;
        right: 15px;
        bottom: -3px;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
        }

        .slider:before {

            position: absolute;
            content: "";
            height: 20px;
            width: 20px;
            left: 2px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
        background-color: #36b9cc;
        }

        input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
        border-radius: 34px;
        top: 4px;
        }

        .slider.round:before {
        border-radius: 50%;
        top: 1px;
        }

        /* Red Slider */

        /* The switch - the box around the redSlider */
        .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 24;
        }

        /* Hide default HTML checkbox */
        .switch input {
        opacity: 0;
        width: 0;
        height: 0;
        }
    /* The Blue Slider */

    /* The Red Slider */
        .redSlider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: -5px;
        right: 15px;
        bottom: -3px;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
        }

        .redSlider:before {

            position: absolute;
            content: "";
            height: 20px;
            width: 20px;
            left: 2px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .redSlider {
        background-color: red;
        }

        input:focus + .redSlider {
        box-shadow: 0 0 1px red;
        }

        input:checked + .redSlider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
        }

        /* Rounded redSliders */
        .redSlider.round {
        border-radius: 34px;
        top: 4px;
        }

        .redSlider.round:before {
        border-radius: 50%;
        top: 1px;
        }
    /* The Red Slider */
    
</style>
{{-- /Toggle Button --}}

<style>
    /* this table css prevent text overflow in columns */
    .table 
    {
        table-layout:fixed;
        width:100%;
        overflow-wrap: break-word;
    }

    .zoom {
        transition: transform .2s;
    }
    .zoom:hover {
        transform: scale(1.5);
    }
    
    .zoomBtn {
        transition: transform .3s;
    }
    .zoomBtn:hover {
        transform: scale(1.1);
    }
    .zoomCancelBtn {
        transition: transform .3s;
    }
    .zoomCancelBtn:hover {
        transform: scale(1.1);
        background:rgb(151, 28, 28);
    }

    .required:after{ 
        content:'*';
        color:red;
        padding-left:5px;
    }

    .jqError{
        color: red;
    }
    label.jqError.fail-alert {
        font-weight: 500;
        border-radius: 4px;
        line-height: 1;
        padding: 2px 0 6px 6px;
    }
    input.valid.success-alert {
        border: 1px solid #4CAF50;
        color: green;
    }
    input.jqError.fail-alert {
        border: 1px solid red;
        color: red;
    }
    textarea.valid.success-alert {
        border: 1px solid #4CAF50;
        color: green;
    }

    textarea.jqError.fail-alert {
        border: 1px solid red;
        color: red;
    }

    select.valid.success-alert {
        border: 1px solid #4CAF50;
        color: green;
    }
    select.jqError.fail-alert {
        border: 1px solid red;
        color: red;
    }

    /* .swal-overlay {
        background-color: rgba(154, 206, 255, 0.45);
    } */

    .circle {
        height: 9px;
        width: 9px;
        background-color: #37b73c;
        border-radius: 50%;
        display: inline-block;
    }

    .themeBtn {
        width:25%;
    }

    .red_star {
        color: red;
    }
</style>

