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
          <button class="btn btn-info" style="font-size:20px;" type="submit" title="Search projects">
          <span class="fas"></span>Search</button>
          <input type="text" class="form-control mr-4" style="font-size:20px; margin-left: 1%;" name="query" placeholder="Search By Client Number" id="find">
          <a href="{{ route('searchclient') }}" class=""></a>
          <span class="input-group-btn">
            <button class="btn btn-success" style="font-size:20px;" type="button" title="Referral" onclick="location.href='{{ route('referral') }}'">
              <span class="fas"></span>New Referral
            </button>
           </span>
        </div>        
        <table class="table table table-striped table-bordered" style="font-size: 15px; margin-top: 2%">
          <thead>
            <p><h4>Client Referral Details</h4></p>            
          </thead>
          <tbody>
            @foreach($details as $clientdetails)
            <tr>              
              <th>Client Number</th>
              <td>{{$clientdetails->clientnumber}}</td>
              <th>Patient ID</th>
              <td>{{$clientdetails->LH_pid}}</td>                           
            </tr>
           <tr>
             <th>FirstName</th>             
             <td>{{$clientdetails->firstname}}</td>
             <th>LastName</th>
             <td>{{$clientdetails->lastname}}</td>
           </tr>  
           <tr>
             <th>Contact</th>             
             <td>{{$clientdetails->contact}}</td>
             <th>Age Group</th>
             <td>{{$clientdetails->age_group}}</td>
           </tr> 
           <tr>
             <th>Screening Type</th>             
             <td>{{$clientdetails->screening_type}}</td>
             <th>Referral Reason</th>
             <td>{{$clientdetails->referral_reason}}</td>
           </tr>            
           @endforeach
          </tbody>
        </table>     
      </form>   
      <form class="col-md-9 offset-md-2" action="searchclient" method="GET" role="search">
        <table class="table table table-striped table-bordered" style="font-size: 15px; margin-top: 2%">        
            <p><h4>Client Referral Outcomes</h4></p>          
          <thead>
            <tr>
              <th>Outcome ID</th>   
              <th>Referral Date</th>         
              <th>Follow-up Outcome</th>
              <th>Sample Type</th>
              <th>Histology Result</th>
              <th>Treatment Provided</th>
              <th>Recommended Plan</th>
              <th>Feedback</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($details as $clientdetails)
           <tr>
             <td>{{$clientdetails->outcomeid}}</td>  
             <td>{{$clientdetails->referral_date}}</td>
             <td>{{$clientdetails->followup_outcome}}</td>
             <td>{{$clientdetails->sample_type}}</td>
             <td>{{$clientdetails->histology_result}}</td>
             <td>{{$clientdetails->treatment_provided}}</td>
             <td>{{$clientdetails->recommended_plan}}</td>
             <td>{{$clientdetails->feedback}}</td>
             <td>
               <a href="editoutcome/{{$clientdetails->outcomeid}}" style="font-size:15px;" class="btn btn-success">Edit</a>
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
