// // CHART

// if (goalsOnly == true) {
//     for (let index = 0; index < goalsData.length; index++) {
//         const ctx = document.getElementById('daily-pitches-chart' + goalsData[index].id);
//         new Chart(ctx, {
//             type: 'line',
//             data: {
//                 labels: ["0-0", "0-0", "0-0", "0-0", "0-0", "0-0", "0-0", "0-0"],
//                 datasets: [{
//                     label: '# of Calls',
//                     data: pitchesEachDay[index],
//                     borderWidth: 1,
//                     fill: false,
//                     borderColor: 'rgb(153, 102, 254)',
//                     backgroundColor: 'rgb(153, 102, 255, 0.5)',
//                     tension: 0.1
//                 },
//                 ]
//             },
//             options: {
//                 responsive: true,
//                 scales: {
//                     y: {
//                         beginAtZero: true
//                     }
//                 }
//             }
//         });
//     }
// } else {
//     console.log(goalsData)
//     for (let index1 = 0; index1 < goalsData.length; index1++) {
//         const ctx = document.getElementById('daily-pitches-chart' + goalsIDs[index1]);
//         console.log(ctx);
//         new Chart(ctx, {
//             type: 'line',
//             data: {
//                 labels: callsDates[index1],
//                 datasets: [{
//                     label: '# of Pitches',
//                     data: pitchesEachDay[index1],
//                     borderWidth: 1,
//                     fill: false,
//                     borderColor: 'rgb(255, 99, 135)',
//                     backgroundColor: 'rgb(255, 99, 132, 0.5)',
//                     tension: 0.1
//                 },
//                 ]
//             },
//             options: {
//                 responsive: true,
//                 plugins: {
//                     legend: {
//                         position: 'top',
//                     },
//                     title: {
//                         display: true,
//                         text: 'Chart.js Line Chart'
//                     },
//                     scales: {
//                         y: {
//                             beginAtZero: true
//                         }
//                     }
//                 }
//             }
//         });
//     }
// }