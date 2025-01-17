/*---- morrisBar2----*/
$(function (e) {
    'use strict';

    new Morris.Area({
        element: 'morrisBar2',
        data: [{
            x: '1395 Q1',
            y: 3,
            z: 7
        }, {
            x: '1396 Q2',
            y: 3,
            z: 4
        }, {
            x: '1397 Q1',
            y: null,
            z: 1
        }, {
            x: '1398 Q3',
            y: 2,
            z: 5
        }, {
            x: '1398 Q4',
            y: 8,
            z: 2
        }, {
            x: '1399 Q1',
            y: 4,
            z: 4
        }],
        xkey: 'x',
        ykeys: ['y', 'z'],
        lineColors: ['#6c5ffc', '#05c3fb'],
        labels: ['Y', 'Z'],
        resize: true
    }).on('click', function (i, row) {
        console.log(i, row);
    });

    /*---- morrisBar3----*/
    new Morris.Area({
        element: 'morrisBar3',
        behaveLikeLine: true,
        data: [{
            x: '1398 Q1',
            y: 3,
            z: 3
        }, {
            x: '1398 Q2',
            y: 2,
            z: 1
        }, {
            x: '1398 Q3',
            y: 2,
            z: 4
        }, {
            x: '1398 Q4',
            y: 3,
            z: 3
        }],
        xkey: 'x',
        ykeys: ['y', 'z'],
        lineColors: ['#6c5ffc', '#05c3fb'],
        labels: ['Y', 'Z'],
        resize: true
    });

    /*---- morrisBar4----*/
    new Morris.Bar({
        element: 'morrisBar4',
        data: [{
            x: '1398 Q1',
            y: 0
        }, {
            x: '1398 Q2',
            y: 1
        }, {
            x: '1398 Q3',
            y: 2
        }, {
            x: '1398 Q4',
            y: 3
        }, {
            x: '1399 Q1',
            y: 4
        }, {
            x: '1399 Q2',
            y: 5
        }, {
            x: '1399 Q3',
            y: 6
        }, {
            x: '1399 Q4',
            y: 7
        }, {
            x: '1400 Q1',
            y: 8
        }],
        xkey: 'x',
        ykeys: ['y'],
        labels: ['Y'],
        barColors: function (row, series, type) {
            if (type === 'bar') {
                var red = Math.ceil(0 * row.y / this.ymax);
                return '#6c5ffc';
            } else {
                return '#000';
            }
        }
    });
    var day_data = [{
        "period": "فروردین",
        "licensed": 3407,
        "sorned": 660
    }, {
        "period": "اردیبهشت",
        "licensed": 3351,
        "sorned": 629
    }, {
        "period": "خرداد",
        "licensed": 3269,
        "sorned": 618
    }, {
        "period": "تیر",
        "licensed": 3246,
        "sorned": 661
    }, {
        "period": "مرداد",
        "licensed": 3257,
        "sorned": 667
    }, {
        "period": "شهریور",
        "licensed": 3248,
        "sorned": 627
    }, {
        "period": "مهر",
        "licensed": 3171,
        "sorned": 660
    }, {
        "period": "آبان",
        "licensed": 3171,
        "sorned": 676
    }, {
        "period": "آذر",
        "licensed": 3201,
        "sorned": 656
    }, {
        "period": "دی",
        "licensed": 3215,
        "sorned": 622
    }];

    /*---- morrisBar5----*/
    new Morris.Bar({
        element: 'morrisBar5',
        data: day_data,
        xkey: 'period',
        ykeys: ['licensed', 'sorned'],
        labels: ['درآمد', 'فروش'],
        barColors: ['#6c5ffc', '#05c3fb'],
        xLabelAngle: 0,
        resize: true

    });
    var nReloads = 0;

    function data(offset) {
        var ret = [];
        for (var x = 0; x <= 360; x += 10) {
            var v = (offset + x) % 360;
            ret.push({
                x: x,
                y: Math.sin(Math.PI * v / 180).toFixed(4),
                z: Math.cos(Math.PI * v / 180).toFixed(4)
            });
        }
        return ret;
    }

    /*---- morrisBar6----*/
    var graph = Morris.Line({
        element: 'morrisBar6',
        data: data(0),
        xkey: 'x',
        ykeys: ['y', 'z'],
        labels: ['دیتا 1', 'دیتا 2'],
        lineColors: ['#6c5ffc', '#05c3fb'],
        parseTime: false,
        ymin: -1.0,
        ymax: 1.0,
        hideHover: true,
        resize: true
    });

    function update() {
        nReloads++;
        graph.setData(data(5 * nReloads));
        $('#reloadStatus').text(nReloads + ' reloads');
    }

    // setInterval(update, 100);

    /*---- morrisBar7----*/
    var day_data = [{
        "period": "1401-10-01",
        "licensed": 3407,
        "sorned": 660
    }, {
        "period": "1401-09-30",
        "licensed": 3351,
        "sorned": 629
    }, {
        "period": "1400-09-29",
        "licensed": 3269,
        "sorned": 618
    }, {
        "period": "1400-09-20",
        "licensed": 3246,
        "sorned": 661
    }, {
        "period": "1400-09-19",
        "licensed": 3257,
        "sorned": 667
    }, {
        "period": "1399-09-18",
        "licensed": 3248,
        "sorned": 627
    }, {
        "period": "1399-09-17",
        "licensed": 3171,
        "sorned": 660
    }, {
        "period": "1399-09-16",
        "licensed": 3171,
        "sorned": 676
    }, {
        "period": "1398-09-15",
        "licensed": 3201,
        "sorned": 656
    }, {
        "period": "1398-09-10",
        "licensed": 3215,
        "sorned": 622
    }];
    new Morris.Line({
        element: 'morrisBar7',
        data: day_data,
        xkey: 'period',
        ykeys: ['licensed', 'sorned'],
        labels: ['درآمد', 'فروش'],
        lineColors: ['#6c5ffc', '#05c3fb'],
        resize: true,
    });
    /*---- morrisBar8----*/
    new Morris.Donut({
        element: 'morrisBar8',
        data: [{
            value: 50,
            label: 'دیتا 1'
        }, {
            value: 35,
            label: 'دیتا 2'
        }, {
            value: 10,
            label: 'دیتا 3'
        }],
        backgroundColor: 'rgba(119, 119, 142, 0.2)',
        labelColor: '#77778e',
        colors: ['#6c5ffc', '#05c3fb', '#09ad95'],
        resize: true,
        formatter: function (x) {
            return x + "%"
        }
    }).on('click', function (i, row) {
        console.log(i, row);
    });

    /*---- morrisBar9----*/
    new Morris.Donut({
        element: 'morrisBar9',
        data: [{
            value: 35,
            label: 'دیتا 1'
        }, {
            value: 25,
            label: 'دیتا 2'
        }, {
            value: 15,
            label: 'دیتا 3'
        }, {
            value: 15,
            label: 'دیتا 4'
        }, {
            value: 10,
            label: 'دیتا 5'
        }, {
            value: 10,
            label: 'دیتا 6'
        }],
        backgroundColor: 'rgba(119, 119, 142, 0.2)',
        labelColor: '#77778e',
        resize: true,
        colors: ['#6c5ffc', '#05c3fb', '#09ad95', '#1170e4', '#f82649', '#f7b731'],
        formatter: function (x) {
            return x + "%"
        }
    });
});