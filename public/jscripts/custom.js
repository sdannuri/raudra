$(document).ready(function(){
    //open useful data dialog
    $( "#data-dialog" ).dialog({
        autoOpen: false,
        maxWidth:600,
        maxHeight: 500,
        width: 700,
        height: 500,
        resizable: false
        
    });
    $( "#Data" ).on( "click", function() {
      $( "#data-dialog" ).dialog( "open" );
    });
    //open instruction dialog
    $( "#dialog" ).dialog({
        autoOpen: false,
        maxWidth:600,
        maxHeight: 500,
        width: 800,
        height: 500,
        resizable: false
        
    });
    $( "#Instructions" ).on( "click", function() {
      $( "#dialog" ).dialog( "open" );
    });
    //open the calculator dialog
    
    var dialogOptions={
        autoOpen: false,
        maxWidth:600,
        maxHeight: 400,
        width: 500,
        height: 380,
        resizable: false
    };
    var dialogExtendOptions={
        closable:true,
        minimizable:true,
    };
    $( "#online_calculator" ).dialog(dialogOptions).dialogExtend(dialogExtendOptions);
    
    $( "#Calculator" ).on( "click", function() {
     $( "#online_calculator" ).dialog( "open" );
    });
    //to show the help of calculator
    $('.help-link').on('click',function(){
        $('.help-link').css('display','none');
        $('.calculator-link').css('display','block');
        $('#calculator-help').css('display','block');
        $('#keyPad').css('display','none');
    });
    $('.calculator-link').on('click',function(){
        $('.calculator-link').css('display','none');
        $('.help-link').css('display','block');
        $('.calculator-help').css('display','none');
        $('#keyPad').css('display','block');
    });
});



