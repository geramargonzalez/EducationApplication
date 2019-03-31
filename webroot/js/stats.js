function drawChart() {
   // Define the chart to be drawn.
   var data = new google.visualization.DataTable();
   data.addColumn('string', 'Month');
   data.addColumn('number', 'Rendimiento');
   data.addColumn('number', 'Conducta');
   data.addColumn('number', 'Expresion Oral');
   data.addRows([
      ['Mar',  9.5,  5.7, 3.5],
      ['Apr',  14.5, 11.3, 8.4],
      ['May',  18.2, 17.0, 13.5],
      ['Jun',  21.5, 22.0, 17.0],
      
      ['Jul',  25.2, 24.8, 18.6],
      ['Aug',  26.5, 24.1, 17.9],
      ['Sep',  23.3, 20.1, 14.3],
      ['Oct',  18.3, 14.1, 9.0],
      ['Nov',  13.9,  8.6, 3.9],
      ['Dec',  9.6,  2.5,  1.0]
   ]);
      
   // Set chart options
   var options = {'title' : 'Promedio Rendimiento por mes',
      hAxis: {
         title: 'Mes'
      },
      vAxis: {
         title: 'Trabajo'
      },   
      'width':550,
      'height':400	  
   };

   // Instantiate and draw the chart.
   var chart = new google.visualization.LineChart(document.getElementById('container'));
   chart.draw(data, options);
}

google.charts.setOnLoadCallback(drawChart);