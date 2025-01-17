(function ( $ ) {

    var localization = $.spectrum.localization["fa"] = {
        cancelText: "لغو",
        chooseText: "انتخاب",
        clearText: "تنظیم مجدد رنگ",
        noColorSelectedText: "هیچ رنگی انتخاب نشده است!",
        togglePaletteMoreText: "بیشتر",
        togglePaletteLessText: "کمتر"
    };

    $.extend($.fn.spectrum.defaults, localization);

})( jQuery );

// moment.locale("fa");
$(function(e) {
    'use strict'

    // TOGGLES
    $('.toggle').toggles({
        on: true,
        height: 26
    });

    // INPUT MASKS
    $('#dateMask').mask('99/99/9999');
    $('#phoneMask').mask('(999) 999-9999');
    $('#ssnMask').mask('999-99-9999');

    // TIME PICKER
    $('#tpBasic').timepicker();
    $('#tp2').timepicker({
        'scrollDefault': 'now'
    });

    $('#tp3').timepicker();

    $(document).on('click', '#setTimeButton', function() {
        $('#tp3').timepicker('setTime', new Date());
    });


    // COLOR PICKER
    $('#colorpicker').spectrum({
        color: '#0061da'
    });
    $('#showAlpha').spectrum({
        color: 'rgba(0, 97, 218, 0.5)',
        showAlpha: true
    });

    $('#showPaletteOnly').spectrum({
        showPaletteOnly: true,
        showPalette: true,
        color: '#DC3545',
        palette: [
            ['#1D2939', '#fff', '#0866C6', '#23BF08', '#F49917'],
            ['#DC3545', '#17A2B8', '#6610F2', '#fa1e81', '#72e7a6']
        ]
    });

    // DATE RANGE PICKER
    // $('#reservation').daterangepicker();

    // DATEPICKER
    $('.fc-datepicker').persianDatepicker();

    // $('#datepickerNoOfMonths1').persianDatepicker();
    // $('#datepickerNoOfMonths2').persianDatepicker();
    var to, from;
    to = $("#datepickerNoOfMonths1").persianDatepicker({
        inline: false,
        altField: '.range-to-example-alt',
        altFormat: 'LLLL',
        initialValue: false,
        onSelect: function (unix) {
            to.touched = true;
            if (from && from.options && from.options.maxDate != unix) {
                var cachedValue = from.getState().selected.unixDate;
                from.options = {maxDate: unix};
                if (from.touched) {
                    from.setDate(cachedValue);
                }
            }
        }
    });
    from = $("#datepickerNoOfMonths2").persianDatepicker({
        inline: false,
        altField: '.range-from-example-alt',
        altFormat: 'LLLL',
        initialValue: false,
        onSelect: function (unix) {
            from.touched = true;
            if (to && to.options && to.options.minDate != unix) {
                var cachedValue = to.getState().selected.unixDate;
                to.options = {minDate: unix};
                if (to.touched) {
                    to.setDate(cachedValue);
                }
            }
        }
    });

    // BOOTSTRAP DATEPICKER
    $('#datepicker-date').datepicker({
        format: "dd",
        viewMode: "date",
        multidate: true,
        multidateSeparator: "-",
    })

    // MONTH PICKER
    $('#datepicker-month').datepicker({
        format: "MM",
        viewMode: "months",
        minViewMode: "months",
        multidate: true,
        multidateSeparator: "-",
    })

    // YEAR PICKER
    $('#datepicker-year').datepicker({
        format: "yyyy",
        viewMode: "year",
        minViewMode: "years",
        multidate: true,
        multidateSeparator: "-",
    })

});