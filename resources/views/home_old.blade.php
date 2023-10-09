@extends('adminlte::page')

@section('content')
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-9"  style="margin: 0 auto">
          <!-- BAR CHART -->
            <div class="card card-success">
              <div class="card-header">
                <h1 class="card-title">Cervical Cancer Referral Outcomes</h1>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="barChart" style="min-height: 250px; height: 500px; max-height: 500px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col (RIGHT) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<script>
  $(function () {
    //-------------
    //- BAR CHART -
    //-------------
    //var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartCanvas = document.getElementById('barChart').getContext('2d')
    var barChartData = {
      labels  : ['October', 'November', 'December', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August','September'],
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
    }

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false

    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })
  })
</script>
@endsection
<!-- AdminLTE CSS and JS -->
<link rel="stylesheet" href="path-to-adminlte/dist/css/adminlte.min.css">
<script src="path-to-adminlte/plugins/jquery/jquery.min.js"></script>
<script src="path-to-adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="path-to-adminlte/dist/js/adminlte.min.js"></script>

<!-- Chart.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
