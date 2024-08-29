@extends('adminlte::page')

@section('title', 'Cervical Cancer | Referral Report')

@section('content_header')
<div></div>
@stop

@section('content')
<div class="col-md-12">
  <div class="">
    <div class="">
      <form class="col-md-9 offset-md-2" action="report" method="GET" role="search">
        <div class="form-group col-md-6">
          <label class="form-group">Start Date: </label>
          <input type="date" name="startdate" class="form-control">
          <label class="form-group">End Date: </label>
          <input type="date" name="enddate" class="form-control">
        </div>
        <div class="input-group">
          <button class="btn btn-info" style="font-size:15px; margin-bottom: 2%" type="submit" title="Search projects">
          <span class="fas"></span>Search</button>
          <a href="{{ route('report') }}" class=""></a>          
        </div>        
      </form>
    </div>
  </div>
</div>
@endsection
