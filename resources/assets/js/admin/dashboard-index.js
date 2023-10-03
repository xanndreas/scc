'use strict';

$(function () {


    // Earning Reports Tabs Function
    function EarningReportsBarChart(arrayData, highlightData) {
        const basicColor = config.colors_label.primary,
            highlightColor = config.colors.primary;
        var colorArr = [];

        for (let i = 0; i < arrayData.length; i++) {
            if (i === highlightData) {
                colorArr.push(highlightColor);
            } else {
                colorArr.push(basicColor);
            }
        }

        return {
            chart: {
                height: 258,
                parentHeightOffset: 0,
                type: 'bar',
                toolbar: {
                    show: false
                }
            },
            plotOptions: {
                bar: {
                    columnWidth: '32%',
                    startingShape: 'rounded',
                    borderRadius: 7,
                    distributed: true,
                    dataLabels: {
                        position: 'top'
                    }
                }
            },
            grid: {
                show: false,
                padding: {
                    top: 0,
                    bottom: 0,
                    left: -10,
                    right: -10
                }
            },
            colors: colorArr,
            dataLabels: {
                enabled: true,
                formatter: function (val) {
                    return val + 'k';
                },
                offsetY: -25,
                style: {
                    fontSize: '15px',
                    colors: [legendColor],
                    fontWeight: '600',
                    fontFamily: 'Public Sans'
                }
            },
            series: [
                {
                    data: arrayData
                }
            ],
            legend: {
                show: false
            },
            tooltip: {
                enabled: false
            },
            xaxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
                axisBorder: {
                    show: true,
                    color: borderColor
                },
                axisTicks: {
                    show: false
                },
                labels: {
                    style: {
                        colors: labelColor,
                        fontSize: '13px',
                        fontFamily: 'Public Sans'
                    }
                }
            },
            yaxis: {
                labels: {
                    offsetX: -15,
                    formatter: function (val) {
                        return '$' + parseInt(val / 1) + 'k';
                    },
                    style: {
                        fontSize: '13px',
                        colors: labelColor,
                        fontFamily: 'Public Sans'
                    },
                    min: 0,
                    max: 60000,
                    tickAmount: 6
                }
            },
            responsive: [
                {
                    breakpoint: 1441,
                    options: {
                        plotOptions: {
                            bar: {
                                columnWidth: '41%'
                            }
                        }
                    }
                },
                {
                    breakpoint: 590,
                    options: {
                        plotOptions: {
                            bar: {
                                columnWidth: '61%',
                                borderRadius: 5
                            }
                        },
                        yaxis: {
                            labels: {
                                show: false
                            }
                        },
                        grid: {
                            padding: {
                                right: 0,
                                left: -20
                            }
                        },
                        dataLabels: {
                            style: {
                                fontSize: '12px',
                                fontWeight: '400'
                            }
                        }
                    }
                }
            ]
        };
    }

    const earningReportsTabsOrdersEl = document.querySelector('#earningReportsTabsOrders'),
        earningReportsTabsOrdersConfig = EarningReportsBarChart(
            earningReportsChart['data'][0]['chart_data'],
            earningReportsChart['data'][0]['active_option']
        );
    if (typeof earningReportsTabsOrdersEl !== undefined && earningReportsTabsOrdersEl !== null) {
        const earningReportsTabsOrders = new ApexCharts(earningReportsTabsOrdersEl, earningReportsTabsOrdersConfig);
        earningReportsTabsOrders.render();
    }

    const earningReportsTabsSalesEl = document.querySelector('#earningReportsTabsSales'),
        earningReportsTabsSalesConfig = EarningReportsBarChart(
            earningReportsChart['data'][1]['chart_data'],
            earningReportsChart['data'][1]['active_option']
        );
    if (typeof earningReportsTabsSalesEl !== undefined && earningReportsTabsSalesEl !== null) {
        const earningReportsTabsSales = new ApexCharts(earningReportsTabsSalesEl, earningReportsTabsSalesConfig);
        earningReportsTabsSales.render();
    }

    const earningReportsTabsProfitEl = document.querySelector('#earningReportsTabsProfit'),
        earningReportsTabsProfitConfig = EarningReportsBarChart(
            earningReportsChart['data'][2]['chart_data'],
            earningReportsChart['data'][2]['active_option']
        );
    if (typeof earningReportsTabsProfitEl !== undefined && earningReportsTabsProfitEl !== null) {
        const earningReportsTabsProfit = new ApexCharts(earningReportsTabsProfitEl, earningReportsTabsProfitConfig);
        earningReportsTabsProfit.render();
    }

    const earningReportsTabsIncomeEl = document.querySelector('#earningReportsTabsIncome'),
        earningReportsTabsIncomeConfig = EarningReportsBarChart(
            earningReportsChart['data'][3]['chart_data'],
            earningReportsChart['data'][3]['active_option']
        );
    if (typeof earningReportsTabsIncomeEl !== undefined && earningReportsTabsIncomeEl !== null) {
        const earningReportsTabsIncome = new ApexCharts(earningReportsTabsIncomeEl, earningReportsTabsIncomeConfig);
        earningReportsTabsIncome.render();
    }
});
