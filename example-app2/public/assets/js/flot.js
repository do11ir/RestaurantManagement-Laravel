/*---- placeholder1----*/
$(function() {
    'use strict'

    var sin = [],
        cos = [];
    for (var i = 0; i < 14; i += 0.1) {
        sin.push([i, Math.sin(i)]);
        cos.push([i, Math.cos(i)]);
    }
    var plot = $.plot("#placeholder1", [{
        data: sin
    }, {
        data: cos
    }], {
        series: {
            lines: {
                show: true
            }
        },
        lines: {
            show: true,
            fill: true,
            fillColor: {
                colors: [{
                    opacity: 0.7
                }, {
                    opacity: 0.7
                }]
            }
        },
        crosshair: {
            mode: "x"
        },
        grid: {
            hoverable: false,
            autoHighlight: false,
            borderColor: "rgba(119, 119, 142, 0.1)",
            verticalLines: false,
            horizontalLines: false
        },
        colors: ['#6c5ffc', '#05c3fb'],
        yaxis: {
            min: -1.2,
            max: 1.2,
            tickLength: 0
        },
        xaxis: {
            tickLength: 0
        }
    });
    
});

/*---- placeholder2----*/
$(function() {
    'use strict'

    var sin = [],
        cos = [];
    for (var i = 0; i < 14; i += 0.5) {
        sin.push([i, Math.sin(i)]);
        cos.push([i, Math.cos(i)]);
    }
    var plot = $.plot("#placeholder2", [{
        data: sin,
        label: "دیتا1"
    }, {
        data: cos,
        label: "دیتا2"
    }], {
        series: {
            lines: {
                show: true
            },
            points: {
                show: true
            }
        },
        grid: {
            hoverable: true,
            clickable: true,
            borderColor: "rgba(119, 119, 142, 0.1)",
            verticalLines: false,
            horizontalLines: false
        },
        colors: ['#6c5ffc', '#05c3fb'],
        yaxis: {
            min: -1.2,
            max: 1.2,
            tickLength: 0
        },
        xaxis: {
            tickLength: 0
        }
    });
});


/*---- placeholder4----*/
$(function() {
    'use strict'

    // We use an inline data source in the example, usually data would
    // be fetched from a server
    var data = [],
        totalPoints = 300;

    function getRandomData() {
    'use strict'

        if (data.length > 0) data = data.slice(1);
        // Do a random walk
        while (data.length < totalPoints) {
            var prev = data.length > 0 ? data[data.length - 1] : 50,
                y = prev + Math.random() * 10 - 5;
            if (y < 0) {
                y = 0;
            } else if (y > 100) {
                y = 100;
            }
            data.push(y);
        }
        var res = [];
        for (var i = 0; i < data.length; ++i) {
            res.push([i, data[i]])
        }
        return res;
    }
    var updateInterval = 30;
    $("#updateInterval").val(updateInterval).change(function() {
        var v = $(this).val();
        if (v && !isNaN(+v)) {
            updateInterval = +v;
            if (updateInterval < 1) {
                updateInterval = 1;
            } else if (updateInterval > 2000) {
                updateInterval = 2000;
            }
            $(this).val("" + updateInterval);
        }
    });
    var plot = $.plot("#placeholder4", [getRandomData()], {
        series: {
            shadowSize: 0 // Drawing is faster without shadows
        },
        grid: {
            borderColor: "rgba(119, 119, 142, 0.1)",
        },
        colors: ["#6c5ffc"],
        yaxis: {
            min: 0,
            max: 100,
            tickLength: 0
        },
        xaxis: {
            tickLength: 0,
            show: false
        }
    });

    function update() {
    'use strict'
        plot.setData([getRandomData()]);
        plot.draw();
        setTimeout(update, updateInterval);
    }
    update();
});

/*---- placeholder6----*/
$(function() {
    'use strict'

    var d1 = [];
    for (var i = 0; i <= 10; i += 1) {
        d1.push([i, parseInt(Math.random() * 30)]);
    }
    var d2 = [];
    for (var i = 0; i <= 10; i += 1) {
        d2.push([i, parseInt(Math.random() * 30)]);
    }
    var d3 = [];
    for (var i = 0; i <= 10; i += 1) {
        d3.push([i, parseInt(Math.random() * 30)]);
    }
    var stack = 0,
        bars = true,
        lines = false,
        steps = false;

    function plotWithOptions() {
    'use strict'

        $.plot("#placeholder6", [d1, d2, d3], {
            series: {
                stack: stack,
                lines: {
                    show: lines,
                    fill: true,
                    steps: steps
                },
                bars: {
                    show: bars,
                    barWidth: 0.6
                }
            },
            grid: {
                borderColor: "rgba(119, 119, 142, 0.1)",
            },
            colors: ['#6c5ffc', '#05c3fb'],
            yaxis: {
                tickLength: 0
            },
            xaxis: {
                tickLength: 0,
                show: false
            }
        });
    }
    plotWithOptions();
    $(".stackControls button").click(function(e) {
        e.preventDefault();
        stack = $(this).text() == "با انباشته شدن" ? true : null;
        plotWithOptions();
    });
    $(".graphControls button").click(function(e) {
        e.preventDefault();
        bars = $(this).text().indexOf("ستون") != -1;
        lines = $(this).text().indexOf("خطی") != -1;
        steps = $(this).text().indexOf("مرحله ای") != -1;
        plotWithOptions();
    });
});

$(function() {
    'use strict'
    
    var data = [],
        series = Math.floor(Math.random() * 4) + 3;
    for (var i = 0; i < series; i++) {
        data[i] = {
            label: "سری " + (i + 1),
            data: Math.floor(Math.random() * 100) + 1
        }
    }
    var placeholder = $("#placeholder");
    $("#example-1").on('click', function() {
        placeholder.unbind();
        $("#title").text("نمودار دایره ای پیش فرض");
        $("#description").text("نمودار دایره ای پیش فرض بدون تنظیم گزینه.");
        $.plot(placeholder, data, {
            series: {
                pie: {
                    show: true
                }
            },
            colors: ['#6c5ffc', '#05c3fb', '#09ad95', '#1170e4', '#f82649'],
        });
    });
    $("#example-2").on('click', function() {
        placeholder.unbind();
        $("#title").text("پیش فرض بدون راهنما");
        $("#description").text("نمودار دایره ای پیش فرض زمانی که افسانه غیرفعال است. از آنجایی که برچسب‌ها معمولاً خارج از ظرف هستند، اندازه نمودار به اندازه مناسب تغییر می‌کند.");
        $.plot(placeholder, data, {
            series: {
                pie: {
                    show: true
                }
            },
            colors: ['#6c5ffc', '#05c3fb', '#09ad95', '#1170e4', '#f82649'],
            legend: {
                show: false
            }
        });
    });
    $("#example-3").on('click', function() {
        placeholder.unbind();
        $("#title").text("فرمت کننده برچسب سفارشی");
        $("#description").text("یک پس زمینه نیمه شفاف به برچسب ها و یک تابع labelFormatter سفارشی اضافه شده است.");
        $.plot(placeholder, data, {
            series: {
                pie: {
                    show: true,
                    radius: 1,
                    label: {
                        show: true,
                        radius: 1,
                        formatter: labelFormatter,
                        background: {
                            opacity: 0.8
                        }
                    }
                }
            },
            colors: ['#1170e4', '#d43f8d', '#45aaf2', '#ecb403', '#e86a91'],
            legend: {
                show: false
            }
        });
    });
    $("#example-4").on('click', function() {
        placeholder.unbind();
        $("#title").text("برچسب شعاع");
        $("#description").text("پس‌زمینه‌های برچسب کمی شفاف‌تر و مقادیر شعاع برای قرار دادن آنها در پای تنظیم شده است.");
        $.plot(placeholder, data, {
            series: {
                pie: {
                    show: true,
                    radius: 1,
                    label: {
                        show: true,
                        radius: 3 / 4,
                        formatter: labelFormatter,
                        background: {
                            opacity: 0.5
                        }
                    }
                }
            },
            colors: ['#1170e4', '#d43f8d', '#45aaf2', '#ecb403', '#64E572'],
            legend: {
                show: false
            }
        });
    });
    $("#example-5").on('click', function() {
        placeholder.unbind();
        $("#title").text("سبک های برچسب شماره 1");
        $("#description").text("پس زمینه لیبل مشکی رنگ نیمه شفاف.");
        $.plot(placeholder, data, {
            series: {
                pie: {
                    show: true,
                    radius: 1,
                    label: {
                        show: true,
                        radius: 3 / 4,
                        formatter: labelFormatter,
                        background: {
                            opacity: 0.5,
                            color: "#000"
                        }
                    }
                }
            },
            colors: ['#1170e4', '#d43f8d', '#45aaf2', '#ecb403', '#e86a91'],
            legend: {
                show: false
            }
        });
    });
    $("#example-6").on('click', function() {
        placeholder.unbind();
        $("#title").text("سبک های برچسب شماره 2");
        $("#description").text("پس زمینه لیبل سیاه رنگ نیمه شفاف در لبه پای قرار داده شده است.");
        $.plot(placeholder, data, {
            series: {
                pie: {
                    show: true,
                    radius: 3 / 4,
                    label: {
                        show: true,
                        radius: 3 / 4,
                        formatter: labelFormatter,
                        background: {
                            opacity: 0.5,
                            color: "#000"
                        }
                    }
                }
            },
            colors: ['#1170e4', '#d43f8d', '#45aaf2', '#ecb403', '#e86a91'],
            legend: {
                show: false
            }
        });
    });
    $("#example-7").on('click', function() {
        placeholder.unbind();
        $("#title").text("برچسب های پنهان");
        $("#description").text("اگر برش کمتر از درصد معینی از پای (در این مورد 10٪) باشد، برچسب ها می توانند پنهان شوند.");
        $.plot(placeholder, data, {
            series: {
                pie: {
                    show: true,
                    radius: 1,
                    label: {
                        show: true,
                        radius: 2 / 3,
                        formatter: labelFormatter,
                        threshold: 0.1
                    }
                }
            },
            colors: ['#1170e4', '#d43f8d', '#45aaf2', '#ecb403', '#e86a91'],
            legend: {
                show: false
            }
        });
    });
    $("#example-8").on('click', function() {
        placeholder.unbind();
        $("#title").text("برش ترکیبی");
        $("#description").text("چند برش کمتر از یک درصد معین (در این مورد 5٪) از پای را می توان در یک تکه بزرگتر ترکیب کرد.");
        $.plot(placeholder, data, {
            series: {
                pie: {
                    show: true,
                    combine: {
                        color: "#999",
                        threshold: 0.05
                    }
                }
            },
            colors: ['#1170e4', '#d43f8d', '#45aaf2', '#ecb403', '#e86a91'],
            legend: {
                show: false
            }
        });
    });
    $("#example-9").on('click', function() {
        placeholder.unbind();
        $("#title").text("پای مستطیلی");
        $("#description").text("شعاع را می توان روی یک اندازه خاص (حتی بزرگتر از خود ظرف) تنظیم کرد.");
        $.plot(placeholder, data, {
            series: {
                pie: {
                    show: true,
                    radius: 500,
                    label: {
                        show: true,
                        formatter: labelFormatter,
                        threshold: 0.1
                    }
                }
            },
            colors: ['#1170e4', '#d43f8d', '#45aaf2', '#ecb403', '#e86a91'],
            legend: {
                show: false
            }
        });
    });
    $("#example-10").on('click', function() {
        placeholder.unbind();
        $("#title").text("پای کج شده");
        $("#description").text("پای را می توان در یک زاویه کج کرد.");
        $.plot(placeholder, data, {
            series: {
                pie: {
                    show: true,
                    radius: 1,
                    tilt: 0.5,
                    label: {
                        show: true,
                        radius: 1,
                        formatter: labelFormatter,
                        background: {
                            opacity: 0.8
                        }
                    },
                    combine: {
                        color: "#999",
                        threshold: 0.1
                    }
                }
            },
            colors: ['#1170e4', '#d43f8d', '#45aaf2', '#ecb403', '#e86a91'],
            legend: {
                show: false
            }
        });
    });
    $("#example-11").on('click', function() {
        placeholder.unbind();
        $("#title").text("سوراخ دونات");
        $("#description").text("می توان یک سوراخ دونات اضافه کرد.");
        $.plot(placeholder, data, {
            series: {
                pie: {
                    innerRadius: 0.5,
                    show: true
                }
            }
        });
    });
    $("#example-1").click();
});

// A custom label formatter used by several of the plots
function labelFormatter(label, series) {
	'use strict'
    return "<div style='font-size:8pt; text-align:center; padding:2px; color:white;'>" + label + "<br/>" + Math.round(series.percent) + "%</div>";
}
//
function setCode(lines) {
	'use strict'
    $("#code").text(lines.join("\n"));
}
