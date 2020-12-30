
(function() {
    $(function() {
        $.extend($.fn.dataTableExt.oStdClasses, {
            "sFilterInput": "form-control",
            "sLengthSelect": "form-control"
        });

        $('tbody tr').click( function() {
            $(this).toggleClass('selected');
        });       
    });
});