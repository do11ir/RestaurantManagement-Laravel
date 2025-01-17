$(function (e) {
    'use strict'
    Chart.defaults.font.family = 'main-font';
    // CHARTJS SALES CHART OPEN
    var ctx = document.getElementById('saleschart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['شنبه', 'یک شنبه', 'دوشنبه', 'سه شنبه', 'چهار شنبه', 'پنج شنبه', 'جمعه'],
            datasets: [{
                barPercentage: 0.1,
                barThickness: 6,
                barGap: 0,
                maxBarThickness: 8,
                minBarLength: 2,
                label: 'فروش کل',
                data: [19, 10, 15, 8, 6, 10, 13],
                backgroundColor: [
                    'rgba(5, 195, 251, 0.2)',
                    'rgba(5, 195, 251, 0.2)',
                    '#05c3fb',
                    'rgba(5, 195, 251, 0.2)',
                    'rgba(5, 195, 251, 0.2)',
                    '#05c3fb',
                    '#05c3fb'
                ],
                borderColor: [
                    'rgba(5, 195, 251, 0.5)',
                    'rgba(5, 195, 251, 0.5)',
                    '#05c3fb',
                    'rgba(5, 195, 251, 0.5)',
                    'rgba(5, 195, 251, 0.5)',
                    '#05c3fb',
                    '#05c3fb'
                ],
                pointBorderWidth: 2,
                pointRadius: 2,
                pointHoverRadius: 2,
                borderRadius: 10,
                borderWidth: 1
            },]
        },
        options: {
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false,
                    labels: {
                        display: false,
                        font: {
                            family: 'main-font'
                        }
                    }
                },
                tooltip: {
                    enabled: false
                }
            },
            responsive: true,
            scales: {
                x: {
                    categoryPercentage: 1.0,
                    barPercentage: 1.0,
                    barDatasetSpacing: 0,
                    display: false,
                    barThickness: 5,
                    barRadius: 0,
                    gridLines: {
                        color: 'transparent',
                        zeroLineColor: 'transparent'
                    },
                    ticks: {
                        fontSize: 2,
                        fontColor: 'transparent'
                    }
                },
                y: {
                    display: false,
                    ticks: {
                        display: false,
                    }
                }
            },
            title: {
                display: false,
            },
            elements: {
                point: {
                    radius: 0
                }
            }
        }
    });


    // CHARTJS LEADS CHART  OPEN
    var ctx1 = document.getElementById('leadschart').getContext('2d');
    new Chart(ctx1, {
        type: 'line',
        data: {
            labels: ['دیتا 1', 'دیتا 2', 'دیتا 3', 'دیتا 4', 'دیتا 5', 'دیتا 6', 'دیتا 7', 'دیتا 8', 'دیتا 9', 'دیتا 10', 'دیتا 11', 'دیتا 12', 'دیتا 13', 'دیتا 14', 'دیتا 15'],
            datasets: [{
                label: 'فروش کل',
                data: [45, 23, 32, 67, 49, 72, 52, 55, 46, 54, 32, 74, 88, 36, 36, 32, 48, 54],
                backgroundColor: 'transparent',
                borderColor: '#f46ef4',
                borderWidth: '2.5',
                pointBorderColor: 'transparent',
                pointBackgroundColor: 'transparent',
                lineTension: 0.3
            },]
        },
        options: {
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false,
                    labels: {
                        display: false,
                        font: {
                            family: 'main-font'
                        }
                    }
                },
                tooltip: {
                    enabled: false
                }
            },
            responsive: true,
            scales: {
                x: {
                    ticks: {
                        beginAtZero: true,
                        fontSize: 10,
                        fontColor: "transparent",
                    },
                    title: {
                        display: false,
                    },
                    grid: {
                        display: true,
                        color: 'transparent																																					',
                        drawBorder: false,
                    },
                    categoryPercentage: 1.0,
                    barPercentage: 1.0,
                    barDatasetSpacing: 0,
                    display: false,
                    barThickness: 5,
                },
                y: {
                    display: false,
                    ticks: {
                        display: false,
                    }
                }
            },
            title: {
                display: false,
            },
            elements: {
                point: {
                    radius: 0
                }
            }
        }
    });
    // CHARTJS LEADS CHART CLOSED

    // PROFIT CHART OPEN
    var ctx2 = document.getElementById('profitchart').getContext('2d');
    new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: ['شنبه', 'یک شنبه', 'دوشنبه', 'سه شنبه', 'چهار شنبه', 'پنج شنبه', 'جمعه'],
            datasets: [{
                barPercentage: 0.1,
                barThickness: 6,
                maxBarThickness: 8,
                minBarLength: 2,
                label: 'فروش کل',
                barGap: 0,
                barSizeRatio: 1,
                data: [10, 12, 5, 6, 3, 11, 12],
                backgroundColor: '#4ecc48',
                borderColor: '#4ecc48',
                pointBackgroundColor: '#fff',
                pointHoverBackgroundColor: '#4ecc48',
                pointBorderColor: '#4ecc48',
                pointHoverBorderColor: '#4ecc48',
                pointBorderWidth: 2,
                pointRadius: 2,
                pointHoverRadius: 2,
                borderRadius: 10,
                borderWidth: 1
            },]
        },
        options: {
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false,
                    labels: {
                        display: false,
                        font: {
                            family: 'main-font'
                        }
                    }
                },
                tooltip: {
                    enabled: false
                }
            },
            responsive: true,
            scales: {
                x: {
                    categoryPercentage: 1.0,
                    barPercentage: 1.0,
                    barDatasetSpacing: 0,
                    display: false,
                    barThickness: 5,
                    gridLines: {
                        color: 'transparent',
                        zeroLineColor: 'transparent'
                    },
                    ticks: {
                        fontSize: 2,
                        fontColor: 'transparent'
                    }
                },
                y: {
                    display: false,
                    ticks: {
                        display: false,
                    }
                }
            },
            title: {
                display: false,
            },
            elements: {
                point: {
                    radius: 0
                }
            }
        }
    });
    // PROFIT CHART CLOSED


    // COST CHART OPEN
    var ctx3 = document.getElementById('costchart').getContext('2d');
    new Chart(ctx3, {
        type: 'line',
        data: {
            labels: ['دیتا 1', 'دیتا 2', 'دیتا 3', 'دیتا 4', 'دیتا 5', 'دیتا 6', 'دیتا 7', 'دیتا 8', 'دیتا 9', 'دیتا 10', 'دیتا 11', 'دیتا 12', 'دیتا 13', 'دیتا 14', 'دیتا 15', 'دیتا 16', 'دیتا 17'],
            datasets: [{
                label: 'فروش کل',
                data: [28, 56, 36, 32, 48, 54, 37, 58, 66, 53, 21, 24, 14, 45, 0, 32, 67, 49, 52, 55, 46, 54, 130],
                backgroundColor: 'transparent',
                borderColor: '#f7ba48',
                borderWidth: '2.5',
                pointBorderColor: 'transparent',
                pointBackgroundColor: 'transparent',
                lineTension: 0.3
            },]
        },
        options: {
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false,
                    labels: {
                        display: false,
                        font: {
                            family: 'main-font'
                        }
                    }
                },
                tooltip: {
                    enabled: false
                }
            },
            responsive: true,
            scales: {
                x: {
                    categoryPercentage: 1.0,
                    barPercentage: 1.0,
                    barDatasetSpacing: 0,
                    display: false,
                    barThickness: 5,
                    gridLines: {
                        color: 'transparent',
                        zeroLineColor: 'transparent'
                    },
                    ticks: {
                        fontSize: 2,
                        fontColor: 'transparent'
                    }
                },
                y: {
                    display: false,
                    ticks: {
                        display: false,
                    }
                }
            },
            title: {
                display: false,
            },
            elements: {
                point: {
                    radius: 0
                }
            }
        }
    });
    // COST CHART CLOSED

    // FLOAT CHART OPEN
    $.plot('#flotback-chart', [{
        data: dashData10,
        color: 'rgba(255,255,255, 0.2)',
        lines: {
            lineWidth: 1
        }
    }], {
        series: {
            stack: 0,
            shadowSize: 0,
            lines: {
                show: true,
                lineWidth: 1.8,
                fill: true,
                fillColor: {
                    colors: [{
                        opacity: 0
                    }, {
                        opacity: 0.3
                    }]
                }
            }
        },
        grid: {
            borderWidth: 0,
            labelMargin: 5,
            hoverable: true
        },
        yaxis: {
            show: false,
            color: 'rgba(72, 94, 144, .1)',
            min: 0,
            max: 130,
            font: {
                size: 10,
                color: '#8392a5'
            }
        },
        xaxis: {
            show: false,
            color: 'rgba(72, 94, 144, .1)',
            ticks: [
                [0, '10'],
                [10, '20'],
                [20, '30'],
                [30, '40'],
                [40, '50'],
                [50, '60'],
                [60, '70'],
                [70, '80'],
                [80, '90'],
                [90, '100'],
                [100, '110'],
                [120, '120'],
            ],
            font: {
                size: 10,
                color: '#8392a5'
            },
            reserveSpace: false
        }
    });
    // FLOAT CHART CLOSED

    // RECENT ORDERS OPEN
    
    Chart.defaults.font.family = 'main-font';
    var myCanvas = document.getElementById("recentorders");
    myCanvas.height = "225";
    new Chart(myCanvas, {
        type: 'bar',
        data: {
            labels: ['شنبه', 'یک شنبه', 'دوشنبه', 'سه شنبه', 'چهار شنبه', 'پنج شنبه', 'جمعه'],
            datasets: [{
                barThickness: 8,
                label: 'این ماه',
                data: [27, 50, 28, 50, 28, 30, 22],
                backgroundColor: '#61c9fc',
                borderWidth: 2,
                hoverBackgroundColor: '#61c9fc',
                hoverBorderWidth: 0,
                borderColor: '#61c9fc',
                hoverBorderColor: '#61c9fc',
                borderRadius: 10,
            }, {
                barThickness: 8,
                label: 'این ماه',
                data: [32, 58, 68, 65, 40, 68, 58],
                backgroundColor: '#f38ff3',
                borderWidth: 2,
                hoverBackgroundColor: '#f38ff3',
                hoverBorderWidth: 0,
                borderColor: '#f38ff3',
                hoverBorderColor: '#f38ff3',
                borderRadius: 10,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 0,
                    right: 0,
                    top: 0,
                    bottom: 0
                }
            },
            plugins: {
                legend: {
                    display: false,
                    labels: {
                        display: false
                    }
                },
                tooltip: {
                    enabled: false
                }
            },
            scales: {
                y: {
                    display: false,
                    grid: {
                        display: false,
                        drawBorder: false,
                        zeroLineColor: 'rgba(142, 156, 173,0.1)',
                        color: "rgba(142, 156, 173,0.1)",
                    },
                    scaleLabel: {
                        display: false,
                    },
                    ticks: {
                        beginAtZero: true,
                        stepSize: 25,
                        suggestedMin: 0,
                        suggestedMax: 100,
                        fontColor: "#8492a6",
                        userCallback: function (tick) {
                            return tick.toString() + '%';
                        }
                    },
                },
                x: {
                    display: false,
                    stacked: false,
                    ticks: {
                        beginAtZero: true,
                        fontColor: "#8492a6",
                    },
                    grid: {
                        color: "rgba(142, 156, 173,0.1)",
                        display: false
                    },

                }
            },
            legend: {
                display: false
            },
            elements: {
                point: {
                    radius: 0
                }
            }
        }
    });
    // RECENT ORDERS CLOSED
    // DATA TABLE
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
            ,
            "emptyTable": "هیچ داده‌ای در جدول وجود ندارد",
            "info": "نمایش _START_ تا _END_ از _TOTAL_ ردیف",
            "infoEmpty": "نمایش 0 تا 0 از 0 ردیف",
            "infoFiltered": "(فیلتر شده از _MAX_ ردیف)",
            "infoThousands": ",",
            "lengthMenu": "نمایش _MENU_ ردیف",
            "processing": "در حال پردازش...",
            "search": "جستجو:",
            "zeroRecords": "رکوردی با این مشخصات پیدا نشد",
            "paginate": {
                "next": "بعدی",
                "previous": "قبلی",
                "first": "ابتدا",
                "last": "انتها"
            },
            "aria": {
                "sortAscending": ": فعال سازی نمایش به صورت صعودی",
                "sortDescending": ": فعال سازی نمایش به صورت نزولی"
            },
            "autoFill": {
                "cancel": "انصراف",
                "fill": "پر کردن همه سلول ها با ساختار سیستم",
                "fillHorizontal": "پر کردن سلول به صورت افقی",
                "fillVertical": "پرکردن سلول به صورت عمودی"
            },
            "buttons": {
                "collection": "مجموعه",
                "colvis": "قابلیت نمایش ستون",
                "colvisRestore": "بازنشانی قابلیت نمایش",
                "copy": "کپی",
                "copySuccess": {
                    "1": "یک ردیف داخل حافظه کپی شد",
                    "_": "%ds ردیف داخل حافظه کپی شد"
                },
                "copyTitle": "کپی در حافظه",
                "excel": "اکسل",
                "pageLength": {
                    "-1": "نمایش همه ردیف‌ها",
                    "_": "نمایش %d ردیف"
                },
                "print": "چاپ",
                "copyKeys": "برای کپی داده جدول در حافظه سیستم کلید های ctrl یا ⌘ + C را فشار دهید",
                "csv": "فایل CSV",
                "pdf": "فایل PDF",
                "renameState": "تغییر نام",
                "updateState": "به روز رسانی"
            },
            "searchBuilder": {
                "add": "افزودن شرط",
                "button": {
                    "0": "جستجو ساز",
                    "_": "جستجوساز (%d)"
                },
                "clearAll": "خالی کردن همه",
                "condition": "شرط",
                "conditions": {
                    "date": {
                        "after": "بعد از",
                        "before": "بعد از",
                        "between": "میان",
                        "empty": "خالی",
                        "equals": "برابر",
                        "not": "نباشد",
                        "notBetween": "میان نباشد",
                        "notEmpty": "خالی نباشد"
                    },
                    "number": {
                        "between": "میان",
                        "empty": "خالی",
                        "equals": "برابر",
                        "gt": "بزرگتر از",
                        "gte": "برابر یا بزرگتر از",
                        "lt": "کمتر از",
                        "lte": "برابر یا کمتر از",
                        "not": "نباشد",
                        "notBetween": "میان نباشد",
                        "notEmpty": "خالی نباشد"
                    },
                    "string": {
                        "contains": "حاوی",
                        "empty": "خالی",
                        "endsWith": "به پایان می رسد با",
                        "equals": "برابر",
                        "not": "نباشد",
                        "notEmpty": "خالی نباشد",
                        "startsWith": "شروع  شود با",
                        "notContains": "نباشد حاوی",
                        "notEnds": "پایان نیابد با",
                        "notStarts": "شروع نشود با"
                    },
                    "array": {
                        "equals": "برابر",
                        "empty": "خالی",
                        "contains": "حاوی",
                        "not": "نباشد",
                        "notEmpty": "خالی نباشد",
                        "without": "بدون"
                    }
                },
                "data": "اطلاعات",
                "logicAnd": "و",
                "logicOr": "یا",
                "title": {
                    "0": "جستجو ساز",
                    "_": "جستجوساز (%d)"
                },
                "value": "مقدار",
                "deleteTitle": "حذف شرط فیلتر",
                "leftTitle": "شرط بیرونی",
                "rightTitle": "شرط داخلی"
            },
            "select": {
                "cells": {
                    "1": "1 سلول انتخاب شد",
                    "_": "%d سلول انتخاب شد"
                },
                "columns": {
                    "1": "یک ستون انتخاب شد",
                    "_": "%d ستون انتخاب شد"
                },
                "rows": {
                    "1": "1ردیف انتخاب شد",
                    "_": "%d  انتخاب شد"
                }
            },
            "thousands": ",",
            "searchPanes": {
                "clearMessage": "همه را پاک کن",
                "collapse": {
                    "0": "صفحه جستجو",
                    "_": "صفحه جستجو (٪ d)"
                },
                "count": "{total}",
                "countFiltered": "{shown} ({total})",
                "emptyPanes": "صفحه جستجو وجود ندارد",
                "loadMessage": "در حال بارگیری صفحات جستجو ...",
                "title": "فیلترهای فعال - %d",
                "showMessage": "نمایش همه"
            },
            "loadingRecords": "در حال بارگذاری...",
            "datetime": {
                "previous": "قبلی",
                "next": "بعدی",
                "hours": "ساعت",
                "minutes": "دقیقه",
                "seconds": "ثانیه",
                "amPm": [
                    "صبح",
                    "عصر"
                ],
                "months": {
                    "0": "ژانویه",
                    "1": "فوریه",
                    "10": "نوامبر",
                    "2": "مارچ",
                    "4": "می",
                    "6": "جولای",
                    "8": "سپتامبر",
                    "11": "دسامبر",
                    "3": "آوریل",
                    "5": "جون",
                    "7": "آست",
                    "9": "اکتبر"
                },
                "unknown": "-",
                "weekdays": [
                    "1.ش",
                    "2.ش",
                    "3.ش",
                    "4.ش",
                    "5.ش",
                    "جمعه",
                    "شنبه"
                ]
            },
            "editor": {
                "close": "بستن",
                "create": {
                    "button": "جدید",
                    "title": "ثبت جدید",
                    "submit": "ایجــاد"
                },
                "edit": {
                    "button": "ویرایش",
                    "title": "ویرایش",
                    "submit": "به‌روزرسانی"
                },
                "remove": {
                    "button": "حذف",
                    "title": "حذف",
                    "submit": "حذف",
                    "confirm": {
                        "_": "آیا از حذف %d خط اطمینان دارید؟",
                        "1": "آیا از حذف یک خط اطمینان دارید؟"
                    }
                },
                "multi": {
                    "restore": "واگرد",
                    "noMulti": "این ورودی را می توان به صورت جداگانه ویرایش کرد، اما نه بخشی از یک گروه"
                }
            },
            "decimal": ".",
            "stateRestore": {
                "creationModal": {
                    "button": "ایجاد",
                    "columns": {
                        "search": "جستجوی ستون",
                        "visible": "وضعیت نمایش ستون"
                    },
                    "name": "نام:",
                    "order": "مرتب سازی",
                    "paging": "صفحه بندی",
                    "search": "جستجو",
                    "select": "انتخاب",
                    "title": "ایجاد وضعیت جدید",
                    "toggleLabel": "شامل:"
                },
                "emptyError": "نام نمیتواند خالی باشد.",
                "removeConfirm": "آیا از حذف %s مطمئنید؟",
                "removeJoiner": "و",
                "removeSubmit": "حذف",
                "renameButton": "تغییر نام",
                "renameLabel": "نام جدید برای $s :"
            }


        }


    });
    $('#data-table').DataTable({
        order: [],
        columnDefs: [{ orderable: false, targets: [0, 4, 5] }],
        language: {
            searchPlaceholder: 'جستجو ...',
            sSearch: '',
        }
    });

    // SELECT2
    $('.select2').select2({
        minimumResultsForSearch: Infinity
    });

    // WORLD MAP MARKER
    $('#world-map-markers1').vectorMap({
        map: 'world_mill_en',
        scaleColors: ['#6c5ffc', '#e82646', '#05c3fb'],

        normalizeFunction: 'polynomial',

        hoverOpacity: 0.7,

        hoverColor: false,

        regionStyle: {

            initial: {

                fill: '#edf0f5'
            }
        },
        markerStyle: {
            initial: {
                r: 6,
                'fill': '#6c5ffc',
                'fill-opacity': 0.9,
                'stroke': '#fff',
                'stroke-width': 9,
                'stroke-opacity': 0.2
            },

            hover: {
                'stroke': '#fff',
                'fill-opacity': 1,
                'stroke-width': 1.5
            }
        },
        backgroundColor: 'transparent',
        markers: [{
            latLng: [40.3, -101.38],
            name: 'آمریکا',
        }, {
            latLng: [22.5, 1.51],
            name: 'انگلیس'
        }, {
            latLng: [50.02, 80.55],
            name: 'عربستان صعودی'
        }, {
            latLng: [3.2, 73.22],
            name: 'اسرائیل'
        }, {
            latLng: [35.88, 14.5],
            name: 'انگلیس'
        },]
    });
});

function getCssValuePrefix() {
    'use strict'

    var retuenValue = ''; //default to standard syntax
    var prefixes = ['-o-', '-ms-', '-moz-', '-webkit-'];

    // Create a temporary DOM object for testing
    var dom = document.createElement('div');

    for (var i = 0; i < prefixes.length; i++) {
        // Attempt to set the style
        dom.style.background = prefixes[i] + 'linear-gradient(#ffffff, #000000)';

        // Detect if the style was successfully set
        if (dom.style.background) {
            retuenValue = prefixes[i];
        }
    }

    dom = null;
    dom.remove();

    return retuenValue;
}

// TRANSACTIONS
var myCanvas = document.getElementById("transactions");
myCanvas.height = "330";

var myCanvasContext = myCanvas.getContext("2d");
var gradientStroke1 = myCanvasContext.createLinearGradient(0, 80, 0, 280);
gradientStroke1.addColorStop(0, 'rgba(108, 95, 252, 0.8)');
gradientStroke1.addColorStop(1, 'rgba(108, 95, 252, 0.2) ');

var gradientStroke2 = myCanvasContext.createLinearGradient(0, 80, 0, 280);
gradientStroke2.addColorStop(0, 'rgba(5, 195, 251, 0.8)');
gradientStroke2.addColorStop(1, 'rgba(5, 195, 251, 0.2) ');
document.getElementById('transactions').innerHTML = '';
var myChart;
    Chart.defaults.font.family = 'main-font';
myChart = new Chart(myCanvas, {

    type: 'line',
    data: {
        labels: ["فروردین", "اردیبهشت", "خرداد", "تیر", "مرداد", "شهریور", "مهر", "آبان", "اذر", "دی", "بهمن", "اسفند"],
        type: 'line',
        datasets: [{
            label: 'فروش کل',
            data: [100, 210, 180, 454, 454, 230, 230, 656, 656, 350, 350, 210],
            backgroundColor: gradientStroke1,
            borderColor: "#05c3fb",
            pointBackgroundColor: '#fff',
            pointHoverBackgroundColor: gradientStroke1,
            pointBorderColor: "#05c3fb",
            pointHoverBorderColor: gradientStroke1,
            pointBorderWidth: 0,
            pointRadius: 0,
            pointHoverRadius: 0,
            borderWidth: 3,
            fill: 'origin',
            lineTension: 0.3
        }, {
            label: 'کل سفارشات',
            data: [200, 530, 110, 110, 480, 520, 780, 435, 475, 738, 454, 454],
            backgroundColor: 'transparent',
            borderColor: "#05c3fb",
            pointBackgroundColor: '#fff',
            pointHoverBackgroundColor: gradientStroke2,
            pointBorderColor: "#05c3fb",
            pointHoverBorderColor: gradientStroke2,
            pointBorderWidth: 0,
            pointRadius: 0,
            pointHoverRadius: 0,
            borderWidth: 3,
            fill: 'origin',
            lineTension: 0.3

        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false,
                labels: {
                    usePointStyle: false,
                    font: {
                        family: 'main-font',
                        size: 34

                    }
                }
            },
            tooltip: {

                enabled: false
            }
        },
        scales: {
            x: {
                display: true,
                grid: {
                    display: false,
                    drawBorder: false,
                    color: 'rgba(119, 119, 142, 0.08)'
                },
                ticks: {
                    autoSkip: true,
                    color: '#b0bac9'
                },
                scaleLabel: {
                    display: false,
                    labelString: 'ماه',
                    fontColor: 'transparent'
                }
            },
            y: {
                ticks: {
                    min: 0,
                    max: 1050,
                    stepSize: 150,
                    color: "#b0bac9",
                },
                display: true,
                grid: {
                    display: true,
                    drawBorder: false,
                    zeroLineColor: 'rgba(142, 156, 173,0.1)',
                    color: "rgba(142, 156, 173,0.1)",
                },
                scaleLabel: {
                    display: false,
                    labelString: 'فروش',
                    fontColor: 'transparent'
                }
            }
        },
        title: {
            display: false,
            text: 'فهرست معمولی'
        }
    }
});
function index(myVarVal, myVarVal1) {
    'use strict'
    let gradientStroke = myCanvasContext.createLinearGradient(0, 80, 0, 280);;
    gradientStroke.addColorStop(0, `rgba(${myVarVal}, 0.8)` || 'rgba(108, 95, 252, 0.8)');
    gradientStroke.addColorStop(1, `rgba(${myVarVal}, 0.2)` || 'rgba(108, 95, 252, 0.2) ');

    myChart.data.datasets[0] = {
        label: 'فروش کل',
        data: [100, 210, 180, 454, 454, 230, 230, 656, 656, 350, 350, 210],
        backgroundColor: gradientStroke,
        borderColor: `rgb(${myVarVal})`,
        pointBackgroundColor: '#fff',
        pointHoverBackgroundColor: gradientStroke,
        pointBorderColor: `rgb(${myVarVal})`,
        pointHoverBorderColor: gradientStroke,
        pointBorderWidth: 0,
        pointRadius: 0,
        pointHoverRadius: 0,
        borderWidth: 3,
        fill: 'origin',
        lineTension: 0.3
    }
    myChart.update();

}