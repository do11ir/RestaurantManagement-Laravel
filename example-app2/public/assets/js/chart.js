$(function () {
    "use strict";

    /*LIne-Chart */
    Chart.defaults.font.family = 'main-font';
    var ctx = document.getElementById("chartLine").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["شنبه", "یکشنبه", "دوشنبه", "سه شنبه", "چهارشنبه", "پنجشنبه", "جمعه"],
            datasets: [{
                label: 'سود ها',
                data: [100, 420, 210, 420, 210, 320, 350],
                backgroundColor: 'transparent',
                borderColor: '#6c5ffc',
                borderWidth: 3,
                pointBackgroundColor: '#ffffff',
                pointRadius: 2,
                fontFamily: 'main-font'
            }, {
                label: 'درآمد ها',
                data: [450, 200, 350, 250, 480, 200, 400],
                backgroundColor: 'transparent',
                borderColor: '#05c3fb',
                borderWidth: 3,
                pointBackgroundColor: '#ffffff',
                pointRadius: 2,
                fontFamily: 'main-font'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,

            scales: {
                xAxes: [{
                    ticks: {
                        fontColor: "#9ba6b5",
                        fontFamily: 'main-font'
                    },
                    display: true,
                    gridLines: {
                        color: 'rgba(119, 119, 142, 0.2)'
                    }
                }],
                yAxes: [{
                    ticks: {
                        fontColor: "#9ba6b5",
                        fontFamily: 'main-font'
                    },
                    display: true,
                    gridLines: {
                        color: 'rgba(119, 119, 142, 0.2)'
                    },
                    scaleLabel: {
                        display: false,
                        labelString: 'هزار',
                        fontColor: 'rgba(119, 119, 142, 0.2)'
                    }
                }]
            },
            legend: {
                labels: {
                    fontColor: "#9ba6b5", fontFamily: 'main-font'
                },
            }, tooltips: {
                titleFontFamily: 'main-font',
                bodyFontFamily: 'main-font',
                footerFontFamily: 'main-font',
            }
        }
    });

    /* Bar-Chart1 */
    var ctx = document.getElementById("chartBar1").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['تیر', 'مرداد', 'شهریور', 'مهر', 'آبان', 'آذر', 'دی ', 'بهمن', 'اسفند'],
            datasets: [{
                label: 'فروش',
                data: [200, 450, 290, 367, 256, 543, 345, 290, 367],
                backgroundColor: '#6c5ffc',
                borderColor: '#6c5ffc',
                borderWidth: 2.0,
                pointBackgroundColor: '#ffffff', fontFamily: 'main-font'

            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        stepSize: 150,
                        fontColor: "#9ba6b5", fontFamily: 'main-font'
                    },
                    gridLines: {
                        color: 'rgba(119, 119, 142, 0.2)'
                    }
                }],
                xAxes: [{
                    barPercentage: 0.4,
                    barValueSpacing: 0,
                    barDatasetSpacing: 0,
                    barRadius: 0,
                    ticks: {
                        display: true,
                        fontColor: "#9ba6b5", fontFamily: 'main-font'
                    },
                    gridLines: {
                        display: false,
                        color: 'rgba(119, 119, 142, 0.2)'
                    }
                }]
            },
            legend: {
                labels: {
                    fontColor: "#9ba6b5"
                },
            }, tooltips: {
                titleFontFamily: 'main-font',
                bodyFontFamily: 'main-font',
                footerFontFamily: 'main-font',
            }
        }
    });

    /* Bar-Chart2*/
    var ctx = document.getElementById("chartBar2");
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['تیر', 'مرداد', 'شهریور', 'مهر', 'آبان', 'آذر', 'دی '],
            datasets: [{
                label: "دیتای 1",
                data: [65, 59, 80, 81, 56, 55, 40],
                borderColor: "#6c5ffc",
                borderWidth: "0",
                backgroundColor: "#6c5ffc", fontFamily: 'main-font'
            }, {
                label: "دیتای 2",
                data: [28, 48, 40, 19, 86, 27, 90],
                borderColor: "#05c3fb",
                borderWidth: "0",
                backgroundColor: "#05c3fb", fontFamily: 'main-font'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                xAxes: [{
                    barPercentage: 0.4,
                    barValueSpacing: 0,
                    barDatasetSpacing: 0,
                    barRadius: 0,
                    ticks: {
                        fontColor: "#9ba6b5", fontFamily: 'main-font'
                    },
                    gridLines: {
                        color: 'rgba(119, 119, 142, 0.2)'
                    }
                }],
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        fontColor: "#9ba6b5", fontFamily: 'main-font'
                    },
                    gridLines: {
                        color: 'rgba(119, 119, 142, 0.2)'
                    },
                }]
            },
            legend: {
                labels: {
                    fontColor: "#9ba6b5", fontFamily: 'main-font'
                },
            }, tooltips: {
                titleFontFamily: 'main-font',
                bodyFontFamily: 'main-font',
                footerFontFamily: 'main-font',
            }
        }
    });

    /* Area Chart*/
    var ctx = document.getElementById("chartArea");
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['تیر', 'مرداد', 'شهریور', 'مهر', 'آبان', 'آذر', 'دی '],
            datasets: [{
                label: "دیتای 1",
                borderColor: "#6c5ffc",
                borderWidth: "3",
                backgroundColor: "rgba(108, 95, 252, .1)",
                data: [22, 44, 67, 43, 76, 45, 12], fontFamily: 'main-font'
            }, {
                label: "دیتای 2",
                borderColor: "rgba(5, 195, 251 ,0.9)",
                borderWidth: "3",
                backgroundColor: "rgba(	5, 195, 251, 0.7)",
                pointHighlightStroke: "rgba(5, 195, 251 ,1)",
                data: [16, 32, 18, 26, 42, 33, 44], fontFamily: 'main-font'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            tooltips: {
                mode: 'index', titleFontFamily: 'main-font',
                bodyFontFamily: 'main-font',
                footerFontFamily: 'main-font',
                intersect: false
            },
            hover: {
                mode: 'nearest',
                intersect: true
            },
            scales: {
                xAxes: [{
                    ticks: {
                        fontColor: "#9ba6b5", fontFamily: 'main-font'
                    },
                    gridLines: {
                        color: 'rgba(119, 119, 142, 0.2)'
                    }
                }],
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        fontColor: "#9ba6b5", fontFamily: 'main-font'
                    },
                    gridLines: {
                        color: 'rgba(119, 119, 142, 0.2)'
                    },
                }]
            },
            legend: {
                labels: {
                    fontColor: "#9ba6b5", fontFamily: 'main-font'
                },
            },
        }
    });

    /* Pie Chart*/
    var datapie = {
        labels: ['تیر', 'مرداد', 'شهریور', 'مهر', 'آبان'],
        datasets: [{
            data: [20, 20, 30, 5, 25],
            backgroundColor: ['#6c5ffc', '#05c3fb', '#09ad95', '#1170e4', '#e82646']
        }]
    };
    var optionpie = {
        maintainAspectRatio: false,
        responsive: true,
        legend: {
            display: false, fontFamily: 'main-font'
        },
        animation: {
            animateScale: true,
            animateRotate: true
        },tooltips: {
            titleFontFamily: 'main-font',
            bodyFontFamily: 'main-font',
            footerFontFamily: 'main-font',
        }
    };

    /* Doughbut Chart*/
    var ctx6 = document.getElementById('chartPie');
    var myPieChart6 = new Chart(ctx6, {
        type: 'doughnut',
        data: datapie,
        options: optionpie
    });

    /* Pie Chart*/
    var ctx7 = document.getElementById('chartDonut');
    var myPieChart7 = new Chart(ctx7, {
        type: 'pie',
        data: datapie,
        options: optionpie
    });

    /* Radar chart*/
    var ctx = document.getElementById("chartRadar");
    var myChart = new Chart(ctx, {
        type: 'radar',
        data: {
            labels: [

                ["خوردن", "شام"],
                ["نوشیدن", "ب"], "خواب", ["طراحی", "گرافیک"], "کدنویسی", "دوچرخه", "دویدن",

            ],
            datasets: [{

                label: "دیتای 1",
                data: [65, 59, 66, 45, 56, 55, 40],
                borderColor: "rgba(108, 95, 252, .8)",
                borderWidth: "1",
                backgroundColor: "rgba(108, 95, 252, .4)", fontFamily: 'main-font'
            }, {
                label: "دیتای 2",
                data: [28, 12, 40, 19, 63, 27, 87],
                borderColor: "rgba(5, 195, 251,0.8)",
                borderWidth: "1",
                backgroundColor: "rgba(5, 195, 251,0.4)", fontFamily: 'main-font'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                display: false
            },
            scale: {
                angleLines: {color: '#9ba6b5'},
                gridLines: {
                    color: 'rgba(119, 119, 142, 0.2)'
                },
                ticks: {
                    beginAtZero: true,
                },
                pointLabels: {
                    fontColor: '#9ba6b5', fontFamily: 'main-font'
                },
            },
            tooltips: {
                titleFontFamily: 'main-font',
                bodyFontFamily: 'main-font',
                footerFontFamily: 'main-font',
            }
        }
    });

    /* polar chart */
    var ctx = document.getElementById("chartPolar");
    var myChart = new Chart(ctx, {
        type: 'polarArea',
        data: {
            datasets: [{
                data: [18, 15, 9, 6, 19],
                backgroundColor: ['#6c5ffc', '#05c3fb', '#09ad95', '#1170e4', '#e82646'],
                hoverBackgroundColor: ['#6c5ffc', '#05c3fb', '#09ad95', '#1170e4', '#e82646'],
                borderColor: 'transparent',
            }],
            labels: ["دیتا1", "دیتا2", "دیتا3", "دیتا4"]
        },
        options: {
            scale: {
                gridLines: {
                    color: 'rgba(119, 119, 142, 0.2)'
                }
            },
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                labels: {
                    fontColor: "#9ba6b5", fontFamily: 'main-font'
                },
            },tooltips: {
                titleFontFamily: 'main-font',
                bodyFontFamily: 'main-font',
                footerFontFamily: 'main-font',
            }
        }
    });

});