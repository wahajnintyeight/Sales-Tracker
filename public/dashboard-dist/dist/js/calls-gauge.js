if (goalsOnly == true) {
    for (let index = 0; index < goalsData.length; index++) {

        var goalCalls = goalsData[index].calls;
        // var goalsIDs = [0];
        var goalCallLabel = [0, Math.round(goalCalls / 5), Math.round(goalCalls / 5) * 2, Math.round(goalCalls / 5) * 3, Math.round(goalCalls / 5) * 4, goalCalls];//;
        var goalCallLabelFormula = Math.round(goalCalls / 5)
        // const element = goalsIDs[index];
        var opts = {
            angle: 0, // The span of the gauge arc
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
                divisions: 0,
                divWidth: 0,
                divLength: 0.3,
                divColor: '#f5f5f5',
                subDivisions: 10,
                subLength: 0.5,
                subWidth: 0.6,
                subColor: '#FFFFFFF'
            },
            staticLabels: {
                font: "13px sans-serif", // Specifies font
                labels: goalCallLabel, // Print labels at these values
                color: "#000000", // Optional: Label text color
                fractionDigits: 0 // Optional: Numerical precision. 0=round off.
            },
            staticZones: [{
                strokeStyle: "#f03e3e",
                min: 0,
                max: goalCallLabelFormula
            },
            {
                strokeStyle: "#DA6917",
                min: goalCallLabelFormula,
                max: goalCallLabelFormula * 2
            },
            {
                strokeStyle: "#ffb700",
                min: goalCallLabelFormula * 2,
                max: goalCallLabelFormula * 3
            },
            {
                strokeStyle: "#e1cc00",
                min: goalCallLabelFormula * 3,
                max: goalCallLabelFormula * 4
            },
            {
                strokeStyle: "#30b32d",
                min: goalCallLabelFormula * 4,
                max: goalCalls
            },
            ]
        };
        // console.log(goalsData[index]);
        var target = document.getElementById('calls-gauge' + goalsData[index].id); // your canvas element
        var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
        gauge.maxValue = goalsData[index].calls; // set max gauge value
        gauge.setMinValue(0); // Prefer setter over gauge.minValue = 0
        gauge.animationSpeed = 32; // set animation speed (32 is default value)
        gauge.set(0); // set actual value
    }
    //2FUP
    for (let index = 0; index < goalsData.length; index++) {
        var goalCalls = goalsData[index].calls;
        var goalCallLabel = [0, Math.round(goalCalls / 5), Math.round(goalCalls / 5) * 2, Math.round(goalCalls / 5) * 3, Math.round(goalCalls / 5) * 4, goalCalls];//;
        var goalCallLabelFormula = Math.round(goalCalls / 5)
        var opts = {
            angle: 0, // The span of the gauge arc
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
                divisions: 0,
                divWidth: 0,
                divLength: 0.3,
                divColor: '#f5f5f5',
                subDivisions: 10,
                subLength: 0.5,
                subWidth: 0.6,
                subColor: '#FFFFFFF'
            },
            staticLabels: {
                font: "13px sans-serif", // Specifies font
                labels: goalCallLabel, // Print labels at these values
                color: "#000000", // Optional: Label text color
                fractionDigits: 0 // Optional: Numerical precision. 0=round off.
            },
            staticZones: [{
                strokeStyle: "#f03e3e",
                min: 0,
                max: goalCallLabelFormula
            },
            {
                strokeStyle: "#DA6917",
                min: goalCallLabelFormula,
                max: goalCallLabelFormula * 2
            },
            {
                strokeStyle: "#ffb700",
                min: goalCallLabelFormula * 2,
                max: goalCallLabelFormula * 3
            },
            {
                strokeStyle: "#e1cc00",
                min: goalCallLabelFormula * 3,
                max: goalCallLabelFormula * 4
            },
            {
                strokeStyle: "#30b32d",
                min: goalCallLabelFormula * 4,
                max: goalCalls
            },
            ]
        };

        var target = document.getElementById('fup-calls-gauge' + goalsData[index].id); // your canvas element
        var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
        gauge.maxValue = goalCalls; // set max gauge value
        gauge.setMinValue(0); // Prefer setter over gauge.minValue = 0
        gauge.animationSpeed = 32; // set animation speed (32 is default value)
        gauge.set(0); // set actual value
    }
} {
    console.log("goal ids", goalsIDs);
    for (let index = 0; index < goalsIDs.length; index++) {
        var goalCalls = goalsData[index].calls;
        if (typeof goalsData[index] == "undefined") {
            console.log("????????")
        }
        // console.log("ids", goalsIDs, goalCalls);
        var goalCallLabel = [0, Math.round(goalCalls / 5), Math.round(goalCalls / 5) * 2, Math.round(goalCalls / 5) * 3, Math.round(goalCalls / 5) * 4, goalCalls];//;
        var goalCallLabelFormula = Math.round(goalCalls / 5)
        const element = goalsIDs[index];
        var opts = {
            angle: 0, // The span of the gauge arc
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
                divisions: 0,
                divWidth: 0,
                divLength: 0.3,
                divColor: '#f5f5f5',
                subDivisions: 10,
                subLength: 0.5,
                subWidth: 0.6,
                subColor: '#FFFFFFF'
            },
            staticLabels: {
                font: "13px sans-serif", // Specifies font
                labels: goalCallLabel, // Print labels at these values
                color: "#000000", // Optional: Label text color
                fractionDigits: 0 // Optional: Numerical precision. 0=round off.
            },
            staticZones: [{
                strokeStyle: "#f03e3e",
                min: 0,
                max: goalCallLabelFormula
            },
            {
                strokeStyle: "#DA6917",
                min: goalCallLabelFormula,
                max: goalCallLabelFormula * 2
            },
            {
                strokeStyle: "#ffb700",
                min: goalCallLabelFormula * 2,
                max: goalCallLabelFormula * 3
            },
            {
                strokeStyle: "#e1cc00",
                min: goalCallLabelFormula * 3,
                max: goalCallLabelFormula * 4
            },
            {
                strokeStyle: "#30b32d",
                min: goalCallLabelFormula * 4,
                max: goalCalls
            },
            ]
        };

        var target = document.getElementById('calls-gauge' + goalsIDs[index]); // your canvas element
        // console.log("target", target);
        target.clientWidth = 200;
        target.clientHeight = 300;
        var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
        gauge.maxValue = goalCalls; // set max gauge value
        gauge.setMinValue(0); // Prefer setter over gauge.minValue = 0
        gauge.animationSpeed = 32; // set animation speed (32 is default value)
        console.log("gauge>", gauge);
        // console.log("calls>", calls[index]);
        if (typeof calls[index] !== "undefined") {
            gauge.set(calls[index].total_calls); // set actual value
        } else {
            gauge.set(0); // set actual value
        }
    }

    // 2FUP GAUGE
    for (let index = 0; index < goalsIDs.length; index++) {
        var goalCalls = goalsData[index].calls;
        var goalCallLabel = [0, Math.round(goalCalls / 5), Math.round(goalCalls / 5) * 2, Math.round(goalCalls / 5) * 3, Math.round(goalCalls / 5) * 4, goalCalls];//;
        var goalCallLabelFormula = Math.round(goalCalls / 5)
        const element = goalsIDs[index];
        var opts = {
            angle: -0.00, // The span of the gauge arc
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
                divisions: 0,
                divWidth: 0,
                divLength: 0.3,
                divColor: '#f5f5f5',
                subDivisions: 10,
                subLength: 0.5,
                subWidth: 0.6,
                subColor: '#FFFFFFF'
            },
            staticLabels: {
                font: "13px sans-serif", // Specifies font
                labels: goalCallLabel, // Print labels at these values
                color: "#000000", // Optional: Label text color
                fractionDigits: 0 // Optional: Numerical precision. 0=round off.
            },
            staticZones: [{
                strokeStyle: "#f03e3e",
                min: 0,
                max: goalCallLabelFormula
            },
            {
                strokeStyle: "#DA6917",
                min: goalCallLabelFormula,
                max: goalCallLabelFormula * 2
            },
            {
                strokeStyle: "#ffb700",
                min: goalCallLabelFormula * 2,
                max: goalCallLabelFormula * 3
            },
            {
                strokeStyle: "#e1cc00",
                min: goalCallLabelFormula * 3,
                max: goalCallLabelFormula * 4
            },
            {
                strokeStyle: "#30b32d",
                min: goalCallLabelFormula * 4,
                max: goalCalls
            },
            ]
        };

        var target = document.getElementById('fup-calls-gauge' + goalsIDs[index]); // your canvas element
        var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
        gauge.maxValue = goalCalls; // set max gauge value
        gauge.setMinValue(0); // Prefer setter over gauge.minValue = 0
        gauge.animationSpeed = 32; // set animation speed (32 is default value)
        if (typeof fupCalls[index] !== "undefined") {
            // console.log(fupCalls[index]);
            gauge.set(fupCalls[index].total_calls); // set actual value
        } else {
            gauge.set(0); // set actual value
        }
    }
}