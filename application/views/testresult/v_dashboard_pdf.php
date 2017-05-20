  
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

      var url = "<?php echo base_url(); ?>index.php/testresult/report/savecharttoimg";
      $.post( url, {data: chart.getImageURI(), fileName: "ColumnChart.png"});

    }// end ColumnChart

      google.charts.load('current', {packages: ['corechart', 'bar']});
      google.charts.setOnLoadCallback(drawStacked);

      function drawStacked() {
                // Some raw data (not necessarily accurate)
       var data = google.visualization.arrayToDataTable([
          ['Round', 'AVG'],
          [ 1,      12.00],
          [ 2,      5.50],
          [ 3,     14.0],
          [ 4,      50.0],
        ]);

        var options = {
          title: 'Age vs. Weight comparison',
          hAxis: {title: 'Round', minValue: 0, maxValue: 15},
          vAxis: {title: 'AVG', minValue: 0, maxValue: 15},
          legend: 'none'
        };

        var chart = new google.visualization.ScatterChart(document.getElementById('chart_div2'));
        chart.draw(data, options);

        var url = "<?php echo base_url(); ?>index.php/testresult/report/savecharttoimg";
        $.post( url, {data: chart.getImageURI(), fileName: "Stacked.png"});
    };

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

        var url = "<?php echo base_url(); ?>index.php/testresult/report/savecharttoimg";
        $.post( url, {data: chart.getImageURI(), fileName: "PieChart.png"});        
      }// end PieChart

    // BubbleChart
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawSeriesChart);

    function drawSeriesChart() {
      var data = google.visualization.arrayToDataTable([
        ['ID', 'Life Expectancy', 'Fertility Rate', 'Region',     'Population'],
        ['CAN',    80.66,              1.67,      'North America',  33739900],
        ['DEU',    79.84,              1.36,      'Europe',         81902307],
        ['DNK',    78.6,               1.84,      'Europe',         5523095],
        ['EGY',    72.73,              2.78,      'Middle East',    79716203],
        ['GBR',    80.05,              2,         'Europe',         61801570],
        ['IRN',    72.49,              1.7,       'Middle East',    73137148],
        ['IRQ',    68.09,              4.77,      'Middle East',    31090763],
        ['ISR',    81.55,              2.96,      'Middle East',    7485600],
        ['RUS',    68.6,               1.54,      'Europe',         141850000],
        ['USA',    78.09,              2.05,      'North America',  307007000]
      ]);

      var options = {
        title: 'Correlation between life expectancy, fertility rate ' +
               'and population of some world countries (2010)',
        hAxis: {title: 'Life Expectancy'},
        vAxis: {title: 'Fertility Rate'},
        bubble: {textStyle: {fontSize: 11}}
      };

      var chart = new google.visualization.BubbleChart(document.getElementById('series_chart_div'));
      chart.draw(data, options);

      var url = "<?php echo base_url(); ?>index.php/testresult/report/savecharttoimg";
      $.post( url, {data: chart.getImageURI(), fileName: "SeriesChart.png"});
    } // end BubbleChart

    $(window).resize(function(){
      drawColumnChart();
      drawBarChart();
      drawStacked();
      drawSeriesChart();
    });

    $(document).ready(function(){
      alert("Test");
    });

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
  
</div>



  




