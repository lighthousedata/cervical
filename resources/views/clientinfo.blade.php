@extends('adminlte::page')

@section('title', 'Cervical Cancer | New Client')

@section('content_header')
<h1></h1>
@stop

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="font-size: 20px">{{ __('Cervical Cancer Clients') }}</div>
                <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                   <ul>
                       @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                       @endforeach
                   </ul>
                </div>
                @endif
                </div>
            <form method="GET" action="{{ ('clientinfo/id') }}">
                 {{csrf_field()}}
            <div class="form-group" style="font-size: 12px">
            <div class="input-group date form-group col-xs-5" style="margin-left: 10%" id="visitdate">
              <p>Date: {{$referral->firstname}}
            </div>
            @foreach($outcomes as $outcome)
            <li>ID: {{$outcome->clientnumber}}
            @endforeach  
            <hr>
              <div>
              <div class="form-group row mb-2">
                <div class="col-md-8 offset-md-2">
                    <button type="submit" class="btn btn-success float-left" style="font-size:20px; width:12%">
                        {{ __('Save') }}
                    </button>
                    <button type="button" class="btn btn-primary float-right" onclick="location.href='{{ route('home') }}'" style="font-size:20px; width:12%">
                        {{ __('Back') }}
                    </button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datepicker.min.css">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript">
          $(document).ready(function() {
          $('#visitdate').datepicker({
          format: "yyyy-mm-dd",
                autoclose: true,
                changeMonth: true,
                changeYear: true
              });
  });
</script>
@stop
