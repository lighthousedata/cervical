@extends('adminlte::page')
@section('content_header')
<div style="text-align:center; font-size:50px; font-weight: bold"> Cervical Cancer Referral Dashboard</div>
@stop
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="font-size: 20px">{{ __('Cervical Cancer Client Referral') }}</div>
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
            <form method="GET" action="{{ route ('admin') }}">
                @csrf
       
           
        <hr>
            <div class="form-group row mb-2">
            <div class="col-md-8 offset-md-2">
              <button type="button" class="btn btn-primary float-left" onclick="location.href='{{ route('home') }}'" style="font-size:20px; width:12%">
                {{ __('Back') }}
              </button>
              <button type="submit" class="btn btn-success float-right" style="font-size:20px; width:12%">
                {{ __('Save') }}
              </button>
          </div>
          </div>
        </form>
      </div>
      </div>
    </div>
   </div>
@stop
