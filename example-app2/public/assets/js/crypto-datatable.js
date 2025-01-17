//______Data-Table

$.extend( true, $.fn.dataTable.defaults, {
    language: {
        "sEmptyTable":     "هیچ داده ای در جدول وجود ندارد",
        "sInfo":           "نمایش _START_ تا _END_ از _TOTAL_ رکورد",
        "sInfoEmpty":      "نمایش 0 تا 0 از 0 رکورد",
        "sInfoFiltered":   "(فیلتر شده از _MAX_ رکورد)",
        "sInfoPostFix":    "",
        "sInfoThousands":  ",",
        "sLengthMenu":     "نمایش _MENU_ رکورد",
        "sLoadingRecords": "در حال بارگزاری...",
        "sProcessing":     "در حال پردازش...",
        "sSearch":         "جستجو: ",
        "sZeroRecords":    "رکوردی با این مشخصات پیدا نشد",
        "oPaginate": {
            "sFirst":    "ابتدا",
            "sLast":     "انتها",
            "sNext":     "بعدی",
            "sPrevious": "قبلی"
        },
        "oAria": {
            "sSortAscending":  ": فعال سازی نمایش به صورت صعودی",
            "sSortDescending": ": فعال سازی نمایش به صورت نزولی"
        }
    }
} );
$('#crypto-data-table').DataTable({
    "order": [
        [0, "desc"]
    ],
    order: [],
    columnDefs: [{ orderable: false, targets: [0, 4, 5] }],
    language: {
        searchPlaceholder: 'جستجو ...',
        sSearch: '',
    }
});

// Select2

$('.dataTables_length select').select2({
    minimumResultsForSearch: Infinity
});