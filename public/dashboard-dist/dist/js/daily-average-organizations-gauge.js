// CHART

// console.log(goalsOnly)
if (goalsOnly == true) {
    console.log(goalsData, goalsIDs);
    for (let index = 0; index < goalsData.length; index++) {
        const ctx = document.getElementById('daily-organizations-reached' + goalsData[index].id);
        console.log("?????????????????????????");
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["0-0", "0-0", "0-0", "0-0", "0-0", "0-0", "0-0", "0-0"],
                datasets: [{
                    label: '# of Organizations Reached',
                    data: orgRchEachDay[index],
                    borderWidth: 1,
                    fill: false,
                    borderColor: 'rgb(255, 99, 135)',
                    backgroundColor: 'rgb(255, 99, 132, 0.5)',
                    tension: 0.1

                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }
} else {
    // orgRchEachDay = fill(null, 0);
    // console.log(or)
  
    for (let index = 0; index < goalsIDs.length; index++) {
        const ctx = document.getElementById('daily-organizations-reached' + goalsIDs[index]);
         

        if (orgRchEachDay[index].length <= 1) {
            orgRchEachDay[index] = 0
        }
        if (callsDates[index].length <= 1) {
            callsDates[index] = ["0-0", "0-0", "0-0", "0-0", "0-0", "0-0", "0-0", "0-0"]
        }
        console.log("org reached",orgRchEachDay[index])
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: callsDates[index],
                datasets: [
                    {
                        label: '# of Organizations Reached',
                        data: orgRchEachDay[index],
                        fill: false,
                        borderWidth: 1,
                        borderColor: 'rgb(153, 102, 254)',
                        backgroundColor: 'rgb(153, 102, 255, 0.5)',
                        tension: 0.1
                    }]
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