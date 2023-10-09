@extends('adminlte::page')

@section('title', 'Cervical Cancer | Search Client')

@section('content_header')
<h1></h1>
@stop

@section('content')
<div>
  <div class="">
    <div class="">
      <form class="col-md-9 offset-md-2" action="searchclient" method="GET" role="search">
        <div class="input-group">
          <button class="btn btn-info" style="font-size:15px;" type="submit" title="Search projects">
          <span class="fas"></span>Search</button>
          <input type="text" class="form-control mr-4" style="font-size:20px; margin-left: 1%;" name="query" placeholder="Search By Client Number or FirstName" id="find">
          <a href="{{ route('searchclient') }}" class="">
          <span class="input-group-btn">
            <button class="btn btn-danger" style="font-size:15px;" type="button" title="Refresh page">
              <span class="fas"></span>Refresh
            </button>
           </span>
         </a>
         <a>
           <span class="input-group-btn">
             <button class="btn btn-primary" type="button"  style="margin-left: 15%" title="home" onclick="location.href='{{ route('home') }}'">
               <span class="fas"></span>Dashboard
             </button>
          </span>
          </a>
        </div>
        <table class="table table-responsive" style="font-size: 15px">
          <thead>
            <tr>
              <th>Client Number</th>
              <th>FirstName</th>
              <th>LastName</th>
              <th>Referral Date</th>
              <th>Histology Result</th>
              <th>Treatment</th>
            </tr>
          </thead>
          <tbody>
            @foreach($details as $clientdetails)
           <tr>
             <td>{{$clientdetails->clientnumber}}</td>
             <td>{{$clientdetails->firstname}}</td>
             <td>{{$clientdetails->lastname}}</td>
             <td>{{$clientdetails->referral_date}}</td>
             <td>{{$clientdetails->histology_result}}</td>
             <td>{{$clientdetails->treatment_provided}}</td>
          </tr>
           @endforeach
          </tbody>
        </table>
      </form>
    </div>
  </div>
</div>
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
@stop
