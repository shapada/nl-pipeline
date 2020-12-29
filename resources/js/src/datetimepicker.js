(function( window, document, $) {
    $(function() {
        $('.datepicker').datetimepicker({
            format: 'Y-m-d',
            locale: 'en',
            icons: {
              up: 'fas fa-chevron-up',
              down: 'fas fa-chevron-down',
              previous: 'fas fa-chevron-left',
              next: 'fas fa-chevron-right'
            }
          })
      
          $('.datetime').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            locale: 'en',
            sideBySide: true,
            icons: {
              up: 'fas fa-chevron-up',
              down: 'fas fa-chevron-down',
              previous: 'fas fa-chevron-left',
              next: 'fas fa-chevron-right'
            }
          })
      
          $('.timepicker').datetimepicker({
            format: 'H:m:s',
            icons: {
              up: 'fas fa-chevron-up',
              down: 'fas fa-chevron-down',
              previous: 'fas fa-chevron-left',
              next: 'fas fa-chevron-right'
            }
          })
    });
})( window, document, jQuery );