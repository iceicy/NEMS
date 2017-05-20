
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript" src="https://www.google.com/jsapi"></script>
  <script type="text/javascript">
    
    // ColumnChart
    google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(drawColumnChart);

    function drawColumnChart() {
      var data = google.visualization.arrayToDataTable([
        ['Subjects', 'Students'],
        <?php echo $dataRenderGraphColumn; ?>
      ]);

      var options = {
        title: 'Total Students of Subjects',
        hAxis: {title: 'Round Exam', titleTextStyle: {color: 'red'}}
     };

    var chart = new google.visualization.ColumnChart(document.getElementById('chart_div1'));
      chart.draw(data, options);
    }// end ColumnChart


      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Rounds', 'O-NET', 'GAT', 'PAT'],
          ['1', 40, 55, 45],
          ['2', 50, 40, 30],
          ['3', 66, 55, 70],
          ['4', 66, 89, 76]
        ]);

        var options = {
          title: 'Scores Performance',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_div2'));

        chart.draw(data, options);
      }


    // PieChart
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawPieChart);

      function drawPieChart() {
        var data = google.visualization.arrayToDataTable([
          ['Total Student of Exam Type', 'Type'],
           <?php echo $dataRenderGraphPie; ?>
        ]);

        var options = {
          title: 'Total Students of Exam Types',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }// end PieChart

    google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
         ['Round Exam', 'O-NET', 'GAT', 'PAT', 'Average'],
         ['1',  65,      38,        22,             17.6],
         ['2',  35,      50,        59,             20.1],
         ['3',  57,      67,        58,             10.3],
         ['4',  39,      40,        61,             28.4]
      ]);

    var options = {
      title : 'Round Exam by Exam Types',
      vAxis: {title: 'Scores'},
      hAxis: {title: 'Round Exam'},
      seriesType: 'bars',
      series: {3: {type: 'line'}}
    };

    var chart = new google.visualization.ComboChart(document.getElementById('series_chart_div'));
    chart.draw(data, options);
  }

    $(window).resize(function(){
      drawColumnChart();
      drawBarChart();
      drawChart();
      drawSeriesChart();
    });

    function genChartToImg() {
      var url = "<?php echo base_url(); ?>index.php/testresult/report/dashboardexportpdf";
      window.location.assign(url)
    }

  </script>

<style>
  .chart {
    width: 100%; 
    min-height: 450px;
  }
</style>

<div class="content-wrapper">
  <div class="panel panel-default">

    <div class="row">

      <div class="col-md-12 text-center">
        <h1>Dashboard Test Result Viewer</h1>
        <p>Full Dashboard View details</a></p>
      </div>

      <div class="col-md-4 col-md-offset-4">
        <hr/>
      </div>

      <div class="clearfix"></div>

      <div class="col-md-6">
        <div id="chart_div1" class="chart"></div>
      </div>

      <div class="col-md-6">
        <div id="piechart" class="chart"></div>
      </div>

      <div class="col-md-6">
        <div id="chart_div2" class="chart"></div>
      </div>

      <div class="col-md-6">
        <div id="series_chart_div" class="chart"></div>
      </div>
  </div>
 </div>     
  



  




