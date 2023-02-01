console.log(goalsData);
for (let index = 0; index < goalsIDs.length; index++) {
    var goalCalls = goalsData[index].calls;
    const element = goalsIDs[index];
    var opts = {
        angle: -0.01, // The span of the gauge arc
        lineWidth: 0.20, // The line thickness
        radiusScale: 1, // Relative radius
        pointer: {
            length: 0.35, // // Relative to gauge radius
            strokeWidth: 0.035, // The thickness
            color: '#000000' // Fill color
        },
        limitMax: true, // If false, max value increases automatically if value > maxValue
        limitMin: false, // If true, the min value of the gauge will be fixed
        colorStart: '#6F6EA0', // Colors
        colorStop: '#C0C0DB', // just experiment with them
        strokeColor: '#EEEEEE', // to see which ones work best for you
        generateGradient: true,
        highDpiSupport: true, // High resolution support
        // renderTicks is Optional
        renderTicks: {
            divisions: 10,
            divWidth: 1.1,
            divLength: 0.3,
            divColor: '#333a33',
            subDivisions: 10,
            subLength: 0.5,
            subWidth: 0.6,
            subColor: '#FFFFFFF'
        },
        staticLabels: {
            font: "10px sans-serif", // Specifies font
            labels: [0, Math.round(goalCalls / 5), Math.round(goalCalls / 5) * 2, Math.round(goalCalls / 5) * 3, Math.round(goalCalls / 5) * 4, goalCalls], // Print labels at these values
            color: "#000000", // Optional: Label text color
            fractionDigits: 0 // Optional: Numerical precision. 0=round off.
        },
        staticZones: [{
            strokeStyle: "#f03e3e",
            min: 0,
            max: Math.round(goalCalls / 5)
        },
        {
            strokeStyle: "#ff7d22",
            min: Math.round(goalCalls / 5),
            max: Math.round(150 / 5) * 2
        },
        {
            strokeStyle: "#ffb700",
            min: Math.round(goalCalls / 5) * 2,
            max: Math.round(goalCalls / 5) * 3
        },
        {
            strokeStyle: "#e1cc00",
            min: Math.round(goalCalls / 5) * 3,
            max: Math.round(goalCalls / 5) * 4
        },
        {
            strokeStyle: "#30b32d",
            min: Math.round(goalCalls / 5) * 4,
            max: goalCalls
        },
        ]
    };
    console.log(recentGoal)
    var target = document.getElementById('calls-gauge' + goalsIDs[index]); // your canvas element
    var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
    gauge.maxValue = goalCalls; // set max gauge value
    gauge.setMinValue(0); // Prefer setter over gauge.minValue = 0
    gauge.animationSpeed = 32; // set animation speed (32 is default value)
    gauge.set(calls[index].total_calls); // set actual value
}