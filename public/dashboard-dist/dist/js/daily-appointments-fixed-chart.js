// CHART

if (goalsOnly == true) {
    for (let index = 0; index < goalsData.length; index++) {
        const ctx = document.getElementById('daily-appointments-fixed-chart' + goalsData[index].id);
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["0-0", "0-0", "0-0", "0-0", "0-0", "0-0", "0-0", "0-0"],
                datasets: [{
                    label: '# of Appointments Fixed',
                    data: appointmentsFixedEachDay[index],
                    borderWidth: 1,
                    fill: false,
                    borderColor: '#95222D',
                    backgroundColor: 'rgb(153, 102, 255, 0.5)',
                    tension: 0.1
                },
                {
                    label: '# of Pitches',
                    data: pitchesEachDay[index],
                    borderWidth: 1,
                    fill: false,
                    borderColor: 'rgb(255, 99, 135)',
                    backgroundColor: 'rgb(255, 99, 132, 0.5)',
                    tension: 0.1
                },
                ]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }
} else {
    for (let index = 0; index < goalsIDs.length; index++) {
        const ctx = document.getElementById('daily-appointments-fixed-chart' + goalsIDs[index]);
        console.log(appointmentsFixedEachDay[index].length, pitchesEachDay[index].length)
        if (appointmentsFixedEachDay[index].length <= 1) {
            appointmentsFixedEachDay[index] = 0
        }
        if (pitchesEachDay[index].length <= 1) {
            pitchesEachDay[index] = 0
        }
        if (callsDates[index].length <= 1) {
            callsDates[index] = ["0-0", "0-0", "0-0", "0-0", "0-0", "0-0", "0-0", "0-0"]
        }
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: callsDates[index],
                datasets: [{
                    label: '# of Appointments Fixed',
                    data: appointmentsFixedEachDay[index],
                    borderWidth: 1,
                    fill: false,
                    borderColor: '#95222D',
                    backgroundColor: '#95222D',
                    tension: 0.1
                },
                {
                    label: '# of Pitches',
                    data: pitchesEachDay[index],
                    borderWidth: 1,
                    fill: false,
                    borderColor: '#C1DA0F',
                    backgroundColor: '#C1DA0F',
                    tension: 0.1
                },
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Chart.js Line Chart'
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            }
        });
    }
}