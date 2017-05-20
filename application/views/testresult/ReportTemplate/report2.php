
<html>
<head>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {

      var data = google.visualization.arrayToDataTable([
        ['Element', 'Density', { role: 'style' }],
        ['Copper', 8.94, '#b87333', ],
        ['Silver', 10.49, 'silver'],
        ['Gold', 19.30, 'gold'],
        ['Platinum', 21.45, 'color: #e5e4e2' ]
      ]);

      var options = {
        title: "Density of Precious Metals, in g/cm^3",
        bar: {groupWidth: '95%'},
        legend: 'none',
      };

      var chart_div = document.getElementById('chart_div');
      var chart = new google.visualization.ColumnChart(chart_div);

      // Wait for the chart to finish drawing before calling the getImageURI() method.
      google.visualization.events.addListener(chart, 'ready', function () {
        chart_div.innerHTML = '<img src="' + chart.getImageURI() + '">';
        console.log(chart_div.innerHTML);
      });

      chart.draw(data, options);

  }
  </script>




<img src="http://s2.thingpic.com/images/2J/YRuJQtWbQFLjHWx7w5MQE9sS.png" alt="Paris" width="400" height="300">


<div id='chart_div'></div>

<table border="1">
    <thead>
        <th>test</th>
        <th>test</th>
        <th>test</th>
        <th>test</th>
        <th>test</th>
    </thead>
    <tbody>
        <tr>
            <td>test 1</td>
            <td>test 1</td>
            <td>test 1</td>
            <td>test 1</td>
            <td>test 1</td>
        </tr>
                <tr>
            <td>test 2</td>
            <td>test 2</td>
            <td>test 2</td>
            <td>test 2</td>
            <td>test 2</td>
        </tr>        <tr>
            <td>test 3</td>
            <td>test 3</td>
            <td>test 3</td>
            <td>test 3</td>
            <td>test 3</td>
        </tr>
    </tbody>
</table>