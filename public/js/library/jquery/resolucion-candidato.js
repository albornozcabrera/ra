$(function() {
    var dialog;

    dialog = $("#dialog-form").dialog({
        autoOpen: false,
        width: 850,
        modal: true,
        buttons: {},
        close: function() {
        },
        position: { my: "center top", at: "center top"}
    });
    
    $( "#emi" ).datepicker({
        dateFormat: "dd/mm/yy"
    
    });
});