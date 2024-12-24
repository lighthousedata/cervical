@extends('adminlte::page')

@section('title', 'Cervical Cancer | Client Referral')

@section('content_header')
<h1></h1>
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
            <form method="POST" action="{{ ('savereferral') }}">
                 {{csrf_field()}}
                 <div class="form-group" style="font-size: 12px">
                   <div class="input-group date form-group col-xs-5" id="referral_date" style="margin-left: 10%">
                     <label class="col-form-label" style="font-size: 15px">{{ __('Referral Date') }}</label>
                     <input id="referral_date" class="text-box" name="referral_date" style="width: 48%; margin-left: 13.6%" value="{{ old('referral_date') }}">
                     <span class="input-group-addon" style="width:10%">
                         <span class="glyphicon glyphicon-calendar">
                         </span>
                     </span>
                   </div>
                   </div>
                 <div class=form-group>
                   <label class="col-form-label" style="margin-left: 10%">{{ __('Client Number') }}</label>
                   <input id="clientnumber" class="text-box" name="clientnumber" style="width: 18%; margin-left: 4.6%" value="{{ old('clientnumber') }}">
                   <label class="col-form-label text-md-right" style="margin-left: 10%">{{ __('LH PID') }}</label>
                   <input id="LH_pid" class="text-box" name="LH_pid" style="width: 15%; margin-left: 10.7%" value="{{ old('LH_pid') }}">
                </div>
                <div class=form-group>
                   <label class="col-form-label text-md-right" style="margin-left: 10%">{{ __('First Name') }}</label>
                   <input id="firstname" class="text-box" name="firstname" style="width:18%; margin-left: 7%" value="{{ old('firstname') }}">
                   <label class="col-form-label" style="margin-left: 10%">{{ __('Last Name') }}</label>
                   <input id="lastname" class="text-box" name="lastname" style="width:15%; margin-left: 8.3%" value="{{ old('lastname') }}">
                 </div>
                 <div class=form-group>
                   <label class="col-form-label" style="margin-left: 10%">{{ __('Contact') }}</label>
                   <input id="contact" class="text-box" name="contact" style="width:18%; margin-left: 9%" value="{{ old('contact') }}">
                   <label class="col-form-label text-md-right" style="margin-left: 10%">{{ __('Age Group') }}</label>
                   <select class="text-box" name="age_group" style="width: 10%; margin-left: 8%" value="{{ old('age_group') }}">
                   <option value="">-- Age Group --</option>
                   <option value="{{ 'Unknown' }}">{{ _('Unknown') }}</option>
                   <option value="{{ '15-19' }}">{{ _('15-19') }}</option>
                   <option value="{{ '20-24' }}">{{ _('20-24') }}</option>
                   <option value="{{ '25-29' }}">{{ _('25-29') }}</option>
                   <option value="{{ '30-34' }}">{{ _('30-34') }}</option>
                   <option value="{{ '35-39' }}">{{ _('35-39') }}</option>
                   <option value="{{ '40-45' }}">{{ _('40-44') }}</option>
                   <option value="{{ '45-49' }}">{{ _('45-49') }}</option>
                   <option value="{{ '50+' }}">{{ _('50+') }}</option>
                   </select>
                 </div>
                 <div class=form-group>
                   <label class="col-form-label" style="margin-left: 10%">{{ __('Type of Screening') }}</label>
                   <select class="text-box" name="screening_type" style="width: 18%; margin-left: 2.5%" value="{{ old('screening_type') }}">
                   <option value="">-- Screening Type --</option>
                   <option value="{{ 'Initial Screening' }}">{{ _('First Time Screening') }}</option>
                   <option value="{{ 'Subsequent' }}">{{ _('Subsequent Visit') }}</option>
                   <option value="{{ 'Post Treatment' }}">{{ _('Post Treatment Follow-up') }}</option>
                   </select>
                   <label class="col-form-label text-md-right" style="margin-left: 10%">{{ __('HIV Status') }}</label>
                   <select class="text-box" name="hiv_status" style="width: 15%; margin-left: 8.5%" value="{{ old('hiv_status') }}">
                   <option value="">-- HIV Status --</option>
                   <option value="{{ 'Pos on ART' }}">{{ _('Positive on ART') }}</option>
                   <option value="{{ 'Pos NOT on ART' }}">{{ _('Positive NOT on ART') }}</option>
                   <option value="{{ 'Neg Tested < 1 Year' }}">{{ _('Negative Tested < 1 Year') }}</option>
                   <option value="{{ 'Unknown' }}">{{ _('Unknown') }}</option>
                   </select>
                 </div>
            <div class=form-group style="margin-left: 10%">
              <label class="col-form-label text-md-right">{{ __('Referral Reason') }}</label>
              <select class="text-box" name="referral_reason" style="width: 20%; margin-left: 4%" value="{{ old('referral_reason') }}">
              <option value="">-- Referral Reason --</option>
              <option value="{{ 'Lesion >75%' }}">{{ _('Lesion > 75%') }}</option>
              <option value="{{ 'CA Suspect' }}">{{ _('Suspect Cancer') }}</option>
              <option value="{{ 'No Treatment' }}">{{ _('No Treatment') }}</option>
              <option value="{{ 'Other Gynae' }}">{{ _('Other Gynae') }}</option>
              </select>
              <label class="col-form-label text-md-right" style="margin-left: 11%">{{ __('Facility') }}</label>
              <select class="text-box" name="facility" style="width: 16.5%; margin-left: 12%" value="{{ old('facility') }}">
              <option value="">-- Facility --</option>
              <option value="{{ '1' }}">{{ _('MPC') }}</option>
              <option value="{{ '2' }}">{{ _('Lighthouse') }}</option>
              <option value="{{ '3' }}">{{ _('Rainbow') }}</option>
              <option value="{{ '4' }}">{{ _('UFC') }}</option>
              <option value="{{ '5' }}">{{ _('Tisungane') }}</option>
              </select>
            </div>
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
          $('#referral_date').datepicker({
          format: "yyyy-mm-dd",
                autoclose: true,
                changeMonth: true,
                changeYear: true
              });
  });
</script>
@stop
