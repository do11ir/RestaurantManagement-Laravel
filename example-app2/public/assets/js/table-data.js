$(function (e) {
    "use strict";
    $.extend(true, $.fn.dataTable.defaults, {
        language: {
            "sEmptyTable": "هیچ داده ای در جدول وجود ندارد",
            "sInfo": "نمایش _START_ تا _END_ از _TOTAL_ رکورد",
            "sInfoEmpty": "نمایش 0 تا 0 از 0 رکورد",
            "sInfoFiltered": "(فیلتر شده از _MAX_ رکورد)",
            "sInfoPostFix": "",
            "sInfoThousands": ",",
            "sLengthMenu": "نمایش _MENU_ رکورد",
            "sLoadingRecords": "در حال بارگزاری...",
            "sProcessing": "در حال پردازش...",
            "sSearch": "جستجو: ",
            "sZeroRecords": "رکوردی با این مشخصات پیدا نشد",
            "oPaginate": {
                "sFirst": "ابتدا",
                "sLast": "انتها",
                "sNext": "بعدی",
                "sPrevious": "قبلی",
            },

            "oAria": {
                "sSortAscending": ": فعال سازی نمایش به صورت صعودی",
                "sSortDescending": ": فعال سازی نمایش به صورت نزولی"
            }
        }
    });
    //______Basic Data Table
    $('#basic-datatable').DataTable({
        language: {
            searchPlaceholder: 'جستجو ....',
            sSearch: '',
        }
    });


    //______Basic Data Table
    $('#responsive-datatable').DataTable({
        language: {
            searchPlaceholder: 'جستجو ....',
            scrollX: "100%",
            sSearch: '',
        }
    });

    //______File-Export Data Table
    var table = $('#file-datatable').DataTable({
        buttons: [
            {extend: 'copy', text: 'رونوشت'},
            {extend: 'excel', text: 'اکسل'},
            {extend: 'pdf', text: 'پی دی اف'},
            {extend: 'colvis', text: 'نمایش ستون ها'},
        ],
        language: {
            searchPlaceholder: 'جستجو ....',
            scrollX: "100%",
            sSearch: '',
        }
    });
    table.buttons().container()
        .appendTo('#file-datatable_wrapper .col-md-6:eq(0)');

    //______Delete Data Table
    var table = $('#delete-datatable').DataTable({
        language: {
            searchPlaceholder: 'جستجو ....',
            sSearch: '',
        }
    });
    $('#delete-datatable tbody').on('click', 'tr', function () {
        if ($(this).hasClass('selected')) {
            $(this).removeClass('selected');
        } else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    });
    $('#button').on('click', function () {
        table.row('.selected').remove().draw(false);
    });
    $('#example3').DataTable({
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal({
                    header: function (row) {
                        var data = row.data();
                        return 'جزئیات برای  ' + data[0] + ' ' + data[1];
                    }
                }),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                    tableClass: 'table'
                })
            }
        }
    });
    $('#example2').DataTable({
        responsive: true,
        language: {
            searchPlaceholder: 'جستجو ....',
            sSearch: '',
            lengthMenu: '_MENU_ آیتم / صفحه',
        }
    });


    //______Select2 
    $('.select2').select2({
        minimumResultsForSearch: Infinity
    });

});