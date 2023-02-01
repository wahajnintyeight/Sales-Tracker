// var opts = {
//     angle: -0.01, // The span of the gauge arc
//     lineWidth: 0.20, // The line thickness
//     radiusScale: 1, // Relative radius
//     pointer: {
//         length: 0.35, // // Relative to gauge radius
//         strokeWidth: 0.035, // The thickness
//         color: '#000000' // Fill color
//     },
//     limitMax: false, // If false, max value increases automatically if value > maxValue
//     limitMin: false, // If true, the min value of the gauge will be fixed
//     colorStart: '#6F6EA0', // Colors
//     colorStop: '#C0C0DB', // just experiment with them
//     strokeColor: '#EEEEEE', // to see which ones work best for you
//     generateGradient: true,
//     highDpiSupport: true, // High resolution support
//     // renderTicks is Optional
//     renderTicks: {
//         divisions: 8,
//         divWidth: 1.1,
//         divLength: 1,
//         divColor: '#333a33',
//         subDivisions: 0,
//         subLength: 0.5,
//         subWidth: 0.6,
//         subColor: '#666666'
//     },
//     staticLabels: {
//         font: "10px sans-serif", // Specifies font
//         labels: [100, 130, 150, 220.1, 260, 300, 320, 380], // Print labels at these values
//         color: "#000000", // Optional: Label text color
//         fractionDigits: 0 // Optional: Numerical precision. 0=round off.
//     },
//     staticZones: [{
//         strokeStyle: "#f03e3e",
//         min: 0,
//         max: 1
//     },
//     {
//         strokeStyle: "#fa5f31",
//         min: 100,
//         max: 130
//     },
//     {
//         strokeStyle: "#ff7d22",
//         min: 1.4,
//         max: 2
//     },
//     {
//         strokeStyle: "#ff9a0f",
//         min: 2,
//         max: 2.6
//     },
//     {
//         strokeStyle: "#ffb700",
//         min: 2.6,
//         max: 3.2
//     },
//     {
//         strokeStyle: "#f1c200",
//         min: 3.2,
//         max: 3.8
//     },
//     {
//         strokeStyle: "#e1cc00",
//         min: 3.8,
//         max: 4.4
//     },
//     {
//         strokeStyle: "#d0d500",
//         min: 4.4,
//         max: 5
//     },
//     {
//         strokeStyle: "#adce02",
//         min: 5,
//         max: 5.6
//     },
//     {
//         strokeStyle: "#89c612",
//         min: 5.6,
//         max: 6.3
//     },
//     {
//         strokeStyle: "#62bd20",
//         min: 6.3,
//         max: 7
//     },
//     {
//         strokeStyle: "#30b32d",
//         min: 7,
//         max: 8
//     },
//     ]
// };
// var target = document.getElementById('canvas-preview'); // your canvas element
// var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
// gauge.maxValue = 380; // set max gauge value
// gauge.setMinValue(0); // Prefer setter over gauge.minValue = 0
// gauge.animationSpeed = 32; // set animation speed (32 is default value)
// gauge.set(380); // set actual value


// CHART

console.log(callsEachDay);
const ctx = document.getElementById('myChart');
new Chart(ctx, {
    type: 'line',
    data: {
        labels: callsDates,
        datasets: [{
            label: '# of Calls',
            data: callsEachDay,
            borderWidth: 1,
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
        },
        {
            label: '# of Pitches',
            data: pitchesEachDay,
            borderWidth: 1,
            fill: false,
            borderColor: 'rgb(72, 112, 12)',
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