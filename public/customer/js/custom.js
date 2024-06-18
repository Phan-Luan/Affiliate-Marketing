
const skipped = (ctx, value) => ctx.p0.skip || ctx.p1.skip ? value : undefined;
const down = (ctx, value) => ctx.p0.parsed.y > ctx.p1.parsed.y ? value : undefined;

if ($('#chartHome').length){
    var monthLabel = ["ThĂ¡ng 1", "ThĂ¡ng 2", "ThĂ¡ng 3", "ThĂ¡ng 4", "ThĂ¡ng 5", "ThĂ¡ng 6", "ThĂ¡ng 7", "ThĂ¡ng 8", "ThĂ¡ng 9", "ThĂ¡ng 10", "ThĂ¡ng 11", "ThĂ¡ng 12"];
    var dataChart = {};
    dataChart['curMonth'] = [];
    dataChart['lastMonth'] = [];
    var dataChart1 = {};
    dataChart1['curMonth'] = [];
    dataChart1['lastMonth'] = [];
    var dataChart2 = {};
    dataChart2['curMonth'] = [];
    dataChart2['lastMonth'] = [];
    $.ajax({
        url: '/account/GetChart',
        success: function (data) {
            for (var i = 0; i < data.listMySales.length; i++) {
                dataChart.curMonth.push(data.listMySales[i].CurMonth);
                dataChart.lastMonth.push(data.listMySales[i].LastMonth);
            }
            for (var i = 0; i < data.listDirectSales.length; i++) {
                dataChart1.curMonth.push(data.listDirectSales[i].CurMonth);
                dataChart1.lastMonth.push(data.listDirectSales[i].LastMonth);
            }
            for (var i = 0; i < data.listGroupSales.length; i++) {
                dataChart2.curMonth.push(data.listGroupSales[i].CurMonth);
                dataChart2.lastMonth.push(data.listGroupSales[i].LastMonth);
            }

            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: monthLabel,
                    datasets: [{
                        label: 'NÄƒm hiá»‡n táº¡i', // Name the series
                        data: dataChart.curMonth,
                        fill: false,
                        borderColor: '#0b7a55',
                        backgroundColor: [
                            'rgba(245, 213, 39, 0.8)',
                        ],
                        borderColor: [
                            'rgba(245, 213, 39, 0.8)',
                        ],
                    },
                    {
                        label: 'NÄƒm trÆ°á»›c', // Name the series
                        data: dataChart.lastMonth,
                        fill: false,
                        borderColor: '#0b7a55',
                        backgroundColor: [
                            'rgba(63, 39, 245, 0.8)',
                        ],
                        borderColor: [
                            'rgb(255, 99, 132)',
                        ],
                    }
                    ]

                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                }
            });

            var ctx1 = document.getElementById("myChart1");
            var myChart1 = new Chart(ctx1, {
                type: 'bar',
                data: {
                    labels: monthLabel,
                    datasets: [{
                        label: 'NÄƒm hiá»‡n táº¡i', // Name the series
                        data: dataChart1.curMonth,
                        fill: false,
                        borderColor: '#0b7a55',
                        backgroundColor: [
                            'rgba(245, 213, 39, 0.8)',
                        ],
                        borderColor: [
                            'rgba(245, 213, 39, 0.8)',
                        ],
                    },
                    {
                        label: 'NÄƒm trÆ°á»›c', // Name the series
                        data: dataChart1.lastMonth,
                        fill: false,
                        borderColor: '#0b7a55',
                        backgroundColor: [
                            'rgba(63, 39, 245, 0.8)',
                        ],
                        borderColor: [
                            'rgb(255, 99, 132)',
                        ],
                    }
                    ]

                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                }
            });

            var ctx2 = document.getElementById("myChart2");
            var myChart2 = new Chart(ctx2, {
                type: 'bar',
                data: {
                    labels: monthLabel,
                    datasets: [{
                        label: 'NÄƒm hiá»‡n táº¡i', // Name the series
                        data: dataChart2.curMonth,
                        fill: false,
                        borderColor: '#0b7a55',
                        backgroundColor: [
                            'rgba(245, 213, 39, 0.8)',
                        ],
                        borderColor: [
                            'rgba(245, 213, 39, 0.8)',
                        ],
                    },
                    {
                        label: 'NÄƒm trÆ°á»›c', // Name the series
                        data: dataChart2.lastMonth,
                        fill: false,
                        borderColor: '#0b7a55',
                        backgroundColor: [
                            'rgba(63, 39, 245, 0.8)',
                        ],
                        borderColor: [
                            'rgb(255, 99, 132)',
                        ],
                    }
                    ]

                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                }
            });
        }
    });    
}



if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('/Scripts/__service-worker.js')
        .then(reg => console.log('service worker registered'))
        .catch(err => console.log('service worker not registered - there is an error.', err));
}
