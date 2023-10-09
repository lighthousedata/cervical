@extends('adminlte::page')

@section('title', 'Cervical Cancer | Search Outcome')

@section('content_header')
<h1></h1>
@stop
@section('content')
<div>
  <div class="">
    <div class="">
      <form class="col-md-9 offset-md-2" action="searchoutcome" method="GET" role="search">
        <div class="input-group">
          <button class="btn btn-info" style="font-size:15px;" type="submit" title="Search projects">
          <span class="fas"></span>Search</button>
          <input type="text" class="form-control mr-4" style="font-size:20px; margin-left: 1%;" name="query" placeholder="Search By Client Number" id="find">
          <a href="{{ route('searchoutcome') }}" class="">
          <span class="input-group-btn">
            <button class="btn btn-danger" style="font-size:15px;" type="button" title="Refresh page">
              <span class="fas"></span>Refresh
            </button>
           </span>
         </a>
         <a>
           <span class="input-group-btn">
             <button class="btn btn-primary" type="button"  style="margin-left: 15%; font-size: 15px" title="home" onclick="location.href='{{ route('home') }}'">
               <span class="fas"></span>Dashboard
             </button>
          </span>
          </a>
        </div>
        <table class="table table-responsive" style="font-size: 15px">
          <thead>
            <tr>
              <th>ID</th>
              <th>Client Number</th>
              <th>Follow-up Outcome</th>
              <th>Sample Type</th>
              <th>Histology Result</th>
              <th>Treatment Provided</th>
              <th>Recommended Plan</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($details as $outcomes)
           <tr>
             <td>{{$outcomes->id}}</td>
             <td>{{$outcomes->clientnumber}}</td>
             <td>{{$outcomes->followup_outcome}}</td>
             <td>{{$outcomes->sample_type}}</td>
             <td>{{$outcomes->histology_result}}</td>
             <td>{{$outcomes->treatment_provided}}</td>
             <td>{{$outcomes->recommended_plan}}</td>
             <td>
               <a href="editoutcome/{{$outcomes->id}}" style="font-size:15px;" class="btn btn-success">Edit</a>
             </td>
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
