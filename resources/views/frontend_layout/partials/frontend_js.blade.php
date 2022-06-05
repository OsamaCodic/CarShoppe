<script>

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


</script>