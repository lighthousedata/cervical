@extends('adminlte::page')
@section('content_header')
<div style="text-align:center; font-size:50px; font-weight: bold">{{$this_facility}} Cervical Cancer Referral Dashboard</div>
@stop
@section('content')
    <!-- AdminLTE CSS and JS -->
    <link rel="stylesheet" href="path-to-adminlte/dist/css/adminlte.min.css">
    <script src="path-to-adminlte/plugins/jquery/jquery.min.js"></script>
    <script src="path-to-adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="path-to-adminlte/dist/js/adminlte.min.js"></script>

    <!-- Chart.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>

    <!-- Content Wrapper. Contains page content -->
    <div class="chart-container col-md-12" style="display: flex;">
      <!-- Chart.js Chart -->
      <div class="card" style="margin-top: 2%; margin-left: 5%; margin-right: 5%">
        <div class="card-header">
          <h1 class="card-title">Cervical Cancer Referals and Outcomes</h1>
        </div>
        <div class="chart">
          <canvas id="barChart" height="300px" width="800px"></canvas>
        </div>
      </div>

    <!-- Chart.js Chart -->
    <div class="card" style="margin-top: 2%">
      <div class="card-header">
        <h1 class="card-title">Referrals By Screening Type</h1>
      </div>
      <div class="chart">
        <canvas id="pieChart" height="300px" width="600px"></canvas>
      </div>
    </div>
  </div>

  <div class="chart-container col-md-12" style="display: flex;">
  <div class="card" style="margin-top: 2%; margin-left: 5%; margin-right: 5%">
    <div class="card-header">
      <h1 class="card-title">Reasons for Referral</h1>
    </div>
    <div class="chart">
      <canvas id="pieChart1" height="300px" width="600px"></canvas>
    </div>
  </div>
  <div class="card" style="margin-top: 2%; margin-right: 5%">
    <div class="card-header">
      <h1 class="card-title">Diagnosis Outcomes</h1>
    </div>
    <div class="chart">
      <canvas id="pieChart2" height="300px" width="500px"></canvas>
    </div>
  </div>
  <div class="card" style="margin-top: 2%; margin-right: 3.1%">
    <div class="card-header">
      <h1 class="card-title">Treatment Outcomes</h1>
    </div>
    <div class="chart">
      <canvas id="pieChart3" height="300px" width="500px"></canvas>
    </div>
  </div>
 </div>
    <script>
        // Get a reference to the canvas element
        var barChart = document.getElementById('barChart').getContext('2d');

        // Create a data object with your data
        var data = {
          labels  : ['Oct-23', 'Nov-23', 'Dec-23', 'Jan-24', 'Feb-24', 'Mar-24', 'Apr-24', 'May-24', 'Jun-24', 'Jul-24', 'Aug-24','Sep-24'],
          datasets: [
            {
              label               : 'Total Referals',
              backgroundColor     : 'green',
              borderColor         : 'rgba(60,141,188,0.8)',
              pointRadius          : false,
              pointColor          : '#3b8bba',
              pointStrokeColor    : 'rgba(60,141,188,1)',
              pointHighlightFill  : '#fff',
              pointHighlightStroke: 'rgba(60,141,188,1)',
              data                : [{{$oct}},{{$nov}},{{$dec}},{{$jan}},{{$feb}},{{$mar}},{{$apr}},{{$may}},{{$jun}},{{$jul}},{{$aug}},{{$sep}}]
            },
            {
              label               : 'No Outcomes',
              backgroundColor     : 'red',
              borderColor         : 'rgba(60,141,188,0.8)',
              pointRadius          : false,
              pointColor          : '#3b8bba',
              pointStrokeColor    : 'rgba(60,141,188,1)',
              pointHighlightFill  : '#fff',
              pointHighlightStroke: 'rgba(60,141,188,1)',
              data                : [{{$nooutcome_oct}},{{$nooutcome_nov}},{{$nooutcome_dec}},{{$nooutcome_jan}},{{$nooutcome_feb}},{{$nooutcome_mar}},
                                     {{$nooutcome_apr}},{{$nooutcome_may}},{{$nooutcome_jun}},{{$nooutcome_jul}},{{$nooutcome_aug}},{{$nooutcome_sep}}]
            },
            {
              label               : 'Partial Outcomes',
              backgroundColor     : 'blue',
              borderColor         : 'rgba(60,141,188,0.8)',
              pointRadius          : false,
              pointColor          : '#3b8bba',
              pointStrokeColor    : 'rgba(60,141,188,1)',
              pointHighlightFill  : '#fff',
              pointHighlightStroke: 'rgba(60,141,188,1)',
              data                : [{{$partialoutcome_oct}},{{$partialoutcome_nov}},{{$partialoutcome_dec}},{{$partialoutcome_jan}},{{$partialoutcome_feb}},{{$partialoutcome_mar}},
                                     {{$partialoutcome_apr}},{{$partialoutcome_may}},{{$partialoutcome_jun}},{{$partialoutcome_jul}},{{$partialoutcome_aug}},{{$partialoutcome_sep}}]
            },
            {
              label               : 'Full Outcomes',
              backgroundColor     : 'pink',
              borderColor         : 'rgba(60,141,188,0.8)',
              pointRadius          : false,
              pointColor          : '#3b8bba',
              pointStrokeColor    : 'rgba(60,141,188,1)',
              pointHighlightFill  : '#fff',
              pointHighlightStroke: 'rgba(60,141,188,1)',
              data                : [{{$fulloutcome_oct}},{{$fulloutcome_nov}},{{$fulloutcome_dec}},{{$fulloutcome_jan}},{{$fulloutcome_feb}},{{$fulloutcome_mar}},
                                     {{$fulloutcome_apr}},{{$fulloutcome_may}},{{$fulloutcome_jun}},{{$fulloutcome_jul}},{{$fulloutcome_aug}},{{$fulloutcome_sep}}]
            },
          ]
        };

        // Create and render the chart
        var myChart = new Chart(barChart, {
            type: 'bar', // Type of chart (e.g., 'bar', 'line', 'pie')
            data: data,

        });
    </script>
    <script>
        // Get a reference to the canvas element
        var pieChart = document.getElementById('pieChart').getContext('2d');

        // Create a data object with your data
        var data = {
          labels  : ['Initial Screening', 'Subsequent', 'Post Treatment'],
          datasets: [
            {
              backgroundColor     : ['green', 'blue', 'red'],
              data                : [{{$initial}}, {{$subsequent}}, {{$post_tx}}]
            },
          ]
        };

        // Create and render the chart
        var myChart = new Chart(pieChart, {
            type: 'pie', // Type of chart (e.g., 'bar', 'line', 'pie')
            data: data,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                legend: {
                    display: true,
                },

              },
            },

        });
    </script>

    <script>
        // Get a reference to the canvas element
        var pieChart = document.getElementById('pieChart1').getContext('2d');

        // Create a data object with your data
        var data = {
          labels  : ['Large Lesions', 'CA Suspects', 'Other Gynae'],
          datasets: [
            {
              backgroundColor     : ['green', 'blue', 'red'],
              data                : [{{$largelesion}}, {{$CAsuspect}}, {{$othergynae}}]
            },
          ]
        };

        // Create and render the chart
        var myChart = new Chart(pieChart, {
            type: 'pie', // Type of chart (e.g., 'bar', 'line', 'pie')
            data: data,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                legend: {
                    display: true,
                },

              },
            },

        });
    </script>
    <script>
        // Get a reference to the canvas element
        var pieChart = document.getElementById('pieChart2').getContext('2d');

        // Create a data object with your data
        var data = {
          labels  : ['Normal', 'CIN I', 'CIN II', 'CIN III', 'Carcinoma', 'Invasive Cancer'],
          datasets: [
            {
              backgroundColor     : ['green', 'blue', 'red', 'pink', 'orange', 'grey'],
              data                : [{{$normal}}, {{$cin1}}, {{$cin2}}, {{$cin3}}, {{$carcinoma}}, {{$invasivecancer}}]
            },
          ]
        };

        // Create and render the chart
        var myChart = new Chart(pieChart, {
            type: 'pie', // Type of chart (e.g., 'bar', 'line', 'pie')
            data: data,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                legend: {
                    display: true,
                },

              },
            },

        });
    </script>
    <script>
        // Get a reference to the canvas element
        var pieChart = document.getElementById('pieChart3').getContext('2d');

        // Create a data object with your data
        var data = {
          labels  : ['LEEP', 'Chemotherapy', 'Hysterectomy', 'Thermotherapy', 'Other Gynae'],
          datasets: [
            {
              backgroundColor     : ['green', 'blue', 'red', 'pink', 'orange'],
              data                : [{{$leep}}, {{$chemo}}, {{$hysterectomy}}, {{$thermo}}, {{$gynae}}]
            },
          ]
        };

        // Create and render the chart
        var myChart = new Chart(pieChart, {
            type: 'pie', // Type of chart (e.g., 'bar', 'line', 'pie')
            data: data,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                legend: {
                    display: true,
                },

              },
            },

        });
    </script>

@endsection
