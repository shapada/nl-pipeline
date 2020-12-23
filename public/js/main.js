$(document).ready(function () {
    window._token = $('meta[name="csrf-token"]').attr('content')

//     if( 'undefined' !== typeof( moment ) ) {
//         moment.updateLocale('en', {
//             week: {dow: 1} // Monday is the first day of the week
//           })
//     }


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

//     // $('.select-all').click(function () {
//     //   let $select2 = $(this).parent().siblings('.select2')
//     //   $select2.find('option').prop('selected', 'selected')
//     //   $select2.trigger('change')
//     // })
//     // $('.deselect-all').click(function () {
//     //   let $select2 = $(this).parent().siblings('.select2')
//     //   $select2.find('option').prop('selected', '')
//     //   $select2.trigger('change')
//     // })

//     // $('.select2').select2()

//     $('.treeview').each(function () {
//       var shouldExpand = false
//       $(this).find('li').each(function () {
//         if ($(this).hasClass('active')) {
//           shouldExpand = true
//         }
//       })
//       if (shouldExpand) {
//         $(this).addClass('active')
//       }
//     })

//   $('button.sidebar-toggler').click(function () {
//       setTimeout(function() {
//         $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
//       }, 275);
//     })
//   })

//   $('#lender').keydown( function() {
//     var max_chars = 3;

//     console.log( $(this));

//     if( $(this).length > max_chars) {
//         $(this).value( $(this).val().substr(0, maxChars)) = element.value.substr(0, max_chars);
//     }
 // })

    $('.treeview').each(function () {
        var shouldExpand = false
        $(this).find('li').each(function () {
          if ($(this).hasClass('active')) {
            shouldExpand = true
          }
        })
        if (shouldExpand) {
          $(this).addClass('active')
        }
      });

    $('button.sidebar-toggler').click(function () {
        setTimeout(function() {
            $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
        }, 275);
    });



    function interestRateLockValueChanged() {
        if($('#interest_rate_locked').is(":checked")) {
            $("#interest-rate-expiration-container").show();

        }
        else {
            $("#interest-rate-expiration-container").hide();
        }
    }

    $('#interest_rate_locked').change( function() {
        if( $( this ).is(':checked') ) {
          $('#form-group-interest-rate-expiration').show();
        } else {
          $('#form-group-interest-rate-expiration').hide();
        }
      })
});
