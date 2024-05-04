@extends('adminlte::page')

@section('title', 'Cervical Cancer | Referral Report')

@section('content_header')
<div style="text-align:center; font-size:50px; font-weight: bold">MPC Cervical Cancer Referral Report</div>
@stop
@section('content')
<div class="col-md-10">
  <div class="">
    <div class="">
      <form class="col-md-12 offset-md-1" action="report" method="GET">
        <table class="table table-striped table-bordered" style="font-size: 15px">
          <thead>
            <tr>
              <th>Patient ID</th>
              <th>Date Referred</th>
              <th>Age Group</th>
              <th>Reason For Visit</th>
              <th>Category</th>
              <th>Management</th>
              <th>Diagnosis</th>
              <th>Final Outcome</th>
              <th>Comments</th>
            </tr>
          </thead>
          <tbody>
            @foreach($details as $referralreport)
           <tr>
             <td>{{$referralreport->clientnumber}}</td>
             <td>{{$referralreport->referral_date}}</td>
             <td>{{$referralreport->age_group}}</td>
             <td>{{$referralreport->screening_type}}</td>
             <td>{{$referralreport->referral_reason}}</td>
             <td>{{$referralreport->followup_outcome}}</td>
             <td>{{$referralreport->histology_result}}</td>
             <td>{{$referralreport->recommended_plan}}</td>
             <td>{{$referralreport->feedback}}</td>
          </tr>
           @endforeach
          </tbody>
        </table>
      </form>
    </div>
  </div>
</div>
@endsection
