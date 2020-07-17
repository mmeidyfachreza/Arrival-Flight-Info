/*global $, document, Chart, LINECHART, data, options, window*/
$(document).ready(function () {

    

    // Main Template Color
    


    // ------------------------------------------------------- //
    // Line Chart
    // ------------------------------------------------------ //
    var LINECHART = $('#lineCahrt');
    var myLineChart = new Chart(LINECHART, {
        type: 'line',
        options: {
            legend: {
                display: true
            }
        },
        data: {
            labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11],
            datasets: [
                {
                    label: "My First dataset",
                    data: [280.0119928,
                        267.5997137,
                        255.737642,
                        244.4013882,
                        233.5676442,
                        223.2141349,
                        213.3195724,
                        203.8636129,
                        194.826814,
                        186.1905954,
                        177.9372001,
                        ],
                    
                }
            ]
        }
    });

});
