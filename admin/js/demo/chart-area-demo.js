
      var data = 1;
      
      var result = [];
// ajax code starts from here

        var xhr = new XMLHttpRequest();


        xhr.open('GET', 'fetcher.php?chart=bar' , true );

        xhr.onload = function() {
          if (this.status == 200) {
            // 200 means okay 404 means not found
            // we are here so it means content found
          
            
         data =  JSON.parse(this.responseText);
          // data = this.responseText;
           //  var result = data[0].concat(data[1]);
          for(var i =0 ; i<30; i++){
          //     // var alpha = data[i].name;
             var gamma = [1,2,3];
              result.push( data[i]);   
              
          }
            
        //  console.log(gamma);
            console.log(data);
          
            
          
                      // all code here 
                      var ctx = document.getElementById('myAreaChart').getContext('2d');
                      var chart = new Chart(ctx, {
                          // The type of chart we want to create
                          type: 'bar',
                      
                          // The data for our dataset
                          data: {
                              labels: ['1', '2', '3', '4', '5', '6', '7' , '8', '9' , '10' , '11', '12', '13', '14', '15', '16', '17' , '18', '19' , '20', '21', '22', '23', '24', '25', '26', '27' , '28', '29' , '30'],
                              datasets: [{
                                  label: 'Submissions',
                                  backgroundColor: '#4e9525',
                                  borderColor:'rgba(0, 0, 0, 0.1)',
                                  borderColor: 'rgb(255, 99, 132)',
                                  data:result
                              }]
                          },
                      
                          // Configuration options go here
                          options: {
                            scales: {
                              yAxes: [{
                                  ticks: {
                                      beginAtZero: true
                                  }
                              }]
                          }
                          }
                      });

                      // all code ends







            }
           
          }


      
              

      xhr.send();
     


  



// ajax code ends from here 



//  this is the variable
      


// Area Chart Example

