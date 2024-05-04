@extends('adminlte::page')

@section('title', 'Cervical Cancer | Search Client')

@section('content_header')
<div></div>
@stop

@section('content')
<div class="col-md-12">
  <div class="">
    <div class="">
      <form class="col-md-9 offset-md-2" action="filterclient" method="GET" role="search">
        <div class="form-group col-md-6">
          <label class="form-group">Start Date: </label>
          <input type="date" name="startdate" class="form-control">
          <label class="form-group">End Date: </label>
          <input type="date" name="enddate" class="form-control">
        </div>
        <div class="input-group">
          <button class="btn btn-info" style="font-size:15px; margin-bottom: 2%" type="submit" title="Search projects">
          <span class="fas"></span>Search</button>
          <a href="{{ route('filterclient') }}" class=""></a>
        </div>
        <table class="table table-striped table-bordered" style="font-size: 15px; ">
          <thead>
            <tr>
              <th>Client Number</th>
              <th>FirstName</th>
              <th>LastName</th>
              <th>Referral Date</th>
              <th>Follow-up Outcome</th>
              <th>Sample Type</th>
              <th>Histology Result</th>
              <th>Treatment</th>
            </tr>
          </thead>
          <tbody>
            @foreach($details as $filters)
           <tr>
             <td>{{$filters->clientnumber}}</td>
             <td>{{$filters->firstname}}</td>
             <td>{{$filters->lastname}}</td>
             <td>{{$filters->referral_date}}</td>
             <td>{{$filters->followup_outcome}}</td>
             <td>{{$filters->sample_type}}</td>
             <td>{{$filters->histology_result}}</td>
             <td>{{$filters->treatment_provided}}</td>
          </tr>
           @endforeach
          </tbody>
        </table>
      </form>
    </div>
  </div>
</div>
@endsection
