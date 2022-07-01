import Chart from 'chart.js/auto';

window.makeChart = function makeChart(id, results)
{
    let labels = [];
    let count = 1;
    for (const result of results){
        labels.push(count+"回目");
        count++;
    }
    let data = results.map(result => result.score);
    console.log(labels);
    console.log(data);

    let ctx = document.getElementById(id).getContext('2d');
    let myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: '認識率',
                data: data.reverse(),
                backgroundColor: 'rgba(195, 232, 245, 1)',
                borderColor: 'rgba(195, 232, 245, 1)',
                borderWidth: 2,
                pointBackgroundColor: "rgba(0, 167, 219, 1)",
                pointBorderColor: "rgba(0, 167, 219, 1)",
                pointBorderWidth: 2,
                tension: 0.2
            }]
        },
        options: {
            plugins: {
                title: {
                    display: false,
                    text: 'Custom Chart Title',
                    align: 'start'
                },
                legend: {
                    align: 'start',
                }
            },
            scales: {
                y: {
                    max: 100,
                    min: 0,
                    ticks: {
                        stepSize: 10,
                        color: '#B8B8B8',
                        padding: 8
                    }
                },
                x: {
                    ticks: {
                        color: '#B8B8B8',
                        padding: 8
                    }
                }
            },
        }
    });
};