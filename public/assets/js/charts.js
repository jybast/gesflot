
 window.onload = () => { 
  //pie chart
  let pieChartCtx = document.querySelector("#pieChart");
 
  if (pieChartCtx) {
    pieChartCtx.height = 200;
    var pieChart = new Chart(pieChartCtx, {
     type: 'pie',
     data: {
       datasets: [{
         data: [45, 25, 20, 10],
         backgroundColor: [
           "rgba(10, 123, 155,0.9)",
           "rgba(20, 123, 215,0.7)",
           "rgba(30, 123, 055,0.5)",
           "rgba(0,0,0,0.07)"
         ],
         hoverBackgroundColor: [
           "rgba(0, 123, 255,0.9)",
           "rgba(0, 123, 255,0.7)",
           "rgba(0, 123, 255,0.5)",
           "rgba(0,0,0,0.07)"
         ]
        }],
        labels: [
         "Diesel",
         "Essence",
         "Autre"
        ]
      },
     options: {
       legend: {
         position: 'top',
         labels: {
           fontFamily: 'Poppins'
         }

       },
       responsive: true
     }
    }
   )
  }

  //line chart
  let lineChartCtx = document.querySelector("#lineChart");
  if (lineChartCtx) {
    lineChartCtx.height = 200;
    var lineChart = new Chart(lineChartCtx, {
    type: 'line',
    data: {
      datasets: [{
        data: [45, 25, 20, 10],
        backgroundColor: [
          "rgba(10, 123, 155,0.9)",
          "rgba(20, 123, 215,0.7)",
          "rgba(30, 123, 055,0.5)",
          "rgba(0,0,0,0.07)"
        ],
        hoverBackgroundColor: [
          "rgba(0, 123, 255,0.9)",
          "rgba(0, 123, 255,0.7)",
          "rgba(0, 123, 255,0.5)",
          "rgba(0,0,0,0.07)"
        ]
      }],
        labels: [
          "Diesel",
          "Essence",
          "Autre"
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
        }
      }
    }
  }
    )
   }

    //Bar chart
  let barChartCtx = document.querySelector("#barChart");
  if (barChartCtx) {
    barChartCtx.height = 200;
    var lineChart = new Chart(barChartCtx, {
    type: 'bar',
    data: {
      datasets: [{
        data: [45, 25, 20, 10],
        backgroundColor: [
          "rgba(10, 123, 155,0.9)",
          "rgba(20, 123, 215,0.7)",
          "rgba(30, 123, 055,0.5)",
          "rgba(0,0,0,0.07)"
        ],
        hoverBackgroundColor: [
          "rgba(0, 123, 255,0.9)",
          "rgba(0, 123, 255,0.7)",
          "rgba(0, 123, 255,0.5)",
          "rgba(0,0,0,0.07)"
        ]
      }],
        labels: [
          "Diesel",
          "Essence",
          "Autre"
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
          text: 'Chart.js bar Chart'
        }
      }
    }
  }
    )
   }
 
};

