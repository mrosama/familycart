    var w=$( window ).width();
    if(w<=1280)
    {
	$( "#lt1" ).hide();
    $( "#lt2" ).hide();
    $( "#ft1" ).hide();
	$( "#ft3" ).hide();
    $( "#jivama" ).show();
	$( "#flagdiv" ).hide();
	$( "#toprow" ).css("margin-top","0px");
    }

    var w=$( window ).width();
    if(w>1280)
    {
    $( "#jivama" ).hide();
    }

   
    function setval(ccode)
    {
    //alert(ccode);
    $("#changelanguage").val(ccode);
    $("#changelang").submit();
    
    }
