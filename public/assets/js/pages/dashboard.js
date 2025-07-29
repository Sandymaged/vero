// var KTUtil = typeof KTUtil !== "undefined" ? KTUtil : null;
var initMixedWidget7 = function() {
    var charts = document.querySelectorAll('.mixed-widget-7-chart');

    [].slice.call(charts).map(function(element) {
        var height = parseInt(KTUtil.css(element, 'height'));

        if ( !element ) {
            return;
        }

        var color = element.getAttribute('data-kt-chart-color');

        var labelColor = KTUtil.getCssVariableValue('--bs-' + 'gray-800');
        var strokeColor = KTUtil.getCssVariableValue('--bs-' + 'gray-300');
        var baseColor = KTUtil.getCssVariableValue('--bs-' + color);
        var lightColor = KTUtil.getCssVariableValue('--bs-light-' + color);

        var options = {
            series: [{
                name: 'صافي الربح',
                data: [15, 25, 15, 40, 20, 50]
            }],
            chart: {
                fontFamily: 'inherit',
                type: 'area',
                height: height,
                style:{
                    direction: 'rtl'
                },
                toolbar: {
                    show: false
                },
                zoom: {
                    enabled: false
                },
                sparkline: {
                    enabled: true
                }
            },
            plotOptions: {},
            legend: {
                show: false
            },
            dataLabels: {
                enabled: false
            },
            fill: {
                type: 'solid',
                opacity: 1
            },
            stroke: {
                curve: 'smooth',
                show: true,
                width: 3,
                colors: [baseColor]
            },
            xaxis: {
                categories: ['فبراير', 'مارس', 'أبريل', 'مايو', 'يونيو', 'يوليو'],
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false
                },
                labels: {
                    show: false,
                    style: {
                        colors: labelColor,
                        fontSize: '12px'
                    }
                },
                crosshairs: {
                    show: false,
                    position: 'front',
                    stroke: {
                        color: strokeColor,
                        width: 1,
                        dashArray: 3
                    }
                },
                tooltip: {
                    enabled: true,
                    formatter: undefined,
                    offsetY: 0,
                    style: {
                        fontSize: '12px'
                    }
                }
            },
            yaxis: {
                min: 0,
                max: 60,
                labels: {
                    show: false,
                    style: {
                        colors: labelColor,
                        fontSize: '12px'
                    }
                }
            },
            states: {
                normal: {
                    filter: {
                        type: 'none',
                        value: 0
                    }
                },
                hover: {
                    filter: {
                        type: 'none',
                        value: 0
                    }
                },
                active: {
                    allowMultipleDataPointsSelection: false,
                    filter: {
                        type: 'none',
                        value: 0
                    }
                }
            },
            tooltip: {
                style: {
                    fontSize: '12px'
                },
                y: {
                    formatter: function (val) {
                        return "SAR" + val + " ألاف"
                    }
                }
            },
            colors: [lightColor],
            markers: {
                colors: [lightColor],
                strokeColor: [baseColor],
                strokeWidth: 3
            }
        };

        var chart = new ApexCharts(element, options);
        chart.render();
    });
}

var initMixedWidget10 = function() {
    var charts = document.querySelectorAll('.mixed-widget-10-chart');

    var color;
    var height;
    var labelColor = KTUtil.getCssVariableValue('--bs-gray-500');
    var borderColor = KTUtil.getCssVariableValue('--bs-gray-200');
    var baseLightColor;
    var secondaryColor = KTUtil.getCssVariableValue('--bs-gray-300');
    var baseColor;
    var options;
    var chart;

    [].slice.call(charts).map(function(element) {
        color = element.getAttribute("data-kt-color");
        height = parseInt(KTUtil.css(element, 'height'));
        baseColor = KTUtil.getCssVariableValue('--bs-' + color);

        options = {
            series: [{
                name: 'صافي الربح',
                data: [50, 60, 70, 80, 60, 50, 70, 60]
            }, {
                name: 'الربح',
                data: [50, 60, 70, 80, 60, 50, 70, 60]
            }],
            chart: {
                fontFamily: 'inherit',
                type: 'bar',
                height: height,
                style:{
                    direction: 'rtl'
                },
                toolbar: {
                    show: false
                }
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: ['50%'],
                    borderRadius: 4
                },
            },
            legend: {
                show: false
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: ['فبراير', 'مارس', 'أبريل', 'مايو', 'يونيو', 'يوليو', 'أغسطس', 'سبتمبر'],
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false
                },
                labels: {
                    style: {
                        colors: labelColor,
                        fontSize: '12px'
                    }
                }
            },
            yaxis: {
                y: 0,
                offsetX: 0,
                offsetY: 0,
                labels: {
                    style: {
                        colors: labelColor,
                        fontSize: '12px'
                    }
                }
            },
            fill: {
                type: 'solid'
            },
            states: {
                normal: {
                    filter: {
                        type: 'none',
                        value: 0
                    }
                },
                hover: {
                    filter: {
                        type: 'none',
                        value: 0
                    }
                },
                active: {
                    allowMultipleDataPointsSelection: false,
                    filter: {
                        type: 'none',
                        value: 0
                    }
                }
            },
            tooltip: {
                style: {
                    fontSize: '12px'
                },
                y: {
                    formatter: function (val) {
                        return "SAR" + val + " ربح"
                    }
                }
            },
            colors: [baseColor, secondaryColor],
            grid: {
                padding: {
                    top: 10
                },
                borderColor: borderColor,
                strokeDashArray: 4,
                yaxis: {
                    lines: {
                        show: true
                    }
                }
            }
        };

        chart = new ApexCharts(element, options);
        chart.render();
    });
}

setTimeout(function() {
    document.addEventListener('DOMContentLoaded', function() {
        initMixedWidget10();
        initMixedWidget7();
    });
}, 1000);