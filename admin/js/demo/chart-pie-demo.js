

var data = 1;
var alpha = [1];
var resultt = [];
// ajax code starts from here

var xhr = new XMLHttpRequest();


xhr.open('GET', 'fetcher.php?pie=yes', true);

xhr.onload = function () {
  if (this.status == 200) {
    // 200 means okay 404 means not found
    // we are here so it means content found

    data = JSON.parse(this.responseText);
    for (var i = 0; i < data.length; i++) {


      resultt.push(data[i]);

    }






    console.log(this.responseText);
    console.log(data);
    console.log("this is result " + resultt);
    console.log("this is alpha " + alpha);





    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    // Pie Chart 
    var ctx = document.getElementById("myPieChart");
    var myPieChart = new Chart(ctx, {
      type: 'polarArea',
      data: {
        labels: ["Utah", "Nevada", "California", "New Jersey", "Arizona", "Texas", "North Carolina"],
        datasets: [{
          data: resultt,
          backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', 'pink', 'green', 'blue', 'orange'],
          hoverBackgroundColor: ['#4e9525', '#4e9525', '#4e9525', '#4e9525', '#4e9525', '#4e9525', '#4e9525'],
          hoverBorderColor: "rgba(234, 236, 244, 1)",
        }],
      },
      options: {
        maintainAspectRatio: false,
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          caretPadding: 10,
        },
        legend: {
          display: false
        },
        cutoutPercentage: 80,
      },
    });




  }

}

xhr.send();