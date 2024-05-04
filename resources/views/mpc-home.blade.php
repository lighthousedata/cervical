@extends('adminlte::page')
@section('content_header')
<div style="text-align:center; font-size:50px; font-weight: bold">MPC Cervical Cancer Referral Dashboard</div>
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
    

@endsection
