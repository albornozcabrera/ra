$(function() {
    var dialog;

    dialog = $("#dialog-form").dialog({
        autoOpen: false,
        width: 850,
        modal: true,
        buttons: {},
        close: function() {
        }
    });
    
    $("#create-user").button().on("click", function($scope) {

        dialog.dialog("open");
    });
    
    $( "#emi" ).datepicker({
        dateFormat: "dd/mm/yy"
    
    });
});