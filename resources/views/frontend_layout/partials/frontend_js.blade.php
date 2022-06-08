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

    $('#shortbyFilter').on('change', function(){
        // Radio toggles will show base on Dropdown Change
        if(this.value == "1")
        {
            //oldmodel
            window.location.href = '/front/products?sortByModel=asc';
            return false;
        }
        if(this.value == "2")
        {
            //Latestmodel
            window.location.href = '/front/products?sortByModel=desc';
            return false;
        }
        if(this.value == "3")
        {
            //lowPrice
            window.location.href = '/front/products?sortByprice=asc';
            return false;
        }
        if(this.value == "4")
        {
            //HighPrice
            window.location.href = '/front/products?sortByprice=desc';
            return false;
        }
    });
    
    $('#searchbyTransmission').on('change', function()
    {
        window.location.href = '/front/products?transmission='+this.value;
        return false;
    });

    function yousendit(){
        if(document.getElementById('#newCheckbox').checked){
            window.location='https://www.yousendit.com/dropbox?dropbox=mydomain';
            return false;
        }
        return true;
    }

    $(document).ready(function(){
        $('#newCheckbox').click(function(){
            if($(this).is(":checked")){
                console.log("Checkbox is checked.");
            }
            else if($(this).is(":not(:checked)")){
                console.log("Checkbox is unchecked.");
            }
        });
    });

</script>