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
            <form method="POST" action="{{ ('saveclient') }}">
                 {{csrf_field()}}
            <div class="form-group" style="font-size: 12px">
            <div class="input-group date form-group col-xs-5" style="margin-left: 10%" id="visitdate">
              <label class="col-form-label">{{ __('Visit Date') }}</label>
              <input id="visitdate" class="text-box" name="visitdate" style="width: 51%; margin-left: 20.5%" value="{{ old('visitdate') }}">
              <span class="input-group-addon" style="width:10%;  margin-left: 15px; margin-right: 45% ">
                <span class="glyphicon glyphicon-calendar">
                </span>
              </span>
            </div>
            <div class=form-group style="font-size: 12px; margin-left: 10%">
              <label class="col-form-label">{{ __('Client Number') }}</label>
              <input id="clientnumber" class="text-box" name="clientnumber" style="width: 21.3%; margin-left: 6%" value="{{ old('clientnumber') }}">
              <label class="col-form-label text-md-right" style="margin-left: 5.8%">{{ __('LH PID') }}</label>
              <input id="LH_pid" class="text-box" name="LH_pid" style="width: 17%; margin-left: 7%" value="{{ old('LH_pid') }}">
            </div>
            <div class=form-group>
              <label class="col-form-label text-md-right" style="margin-left: 10%">{{ __('FirstName') }}</label>
              <input id="firstname" class="text-box" name="firstname" style="width:19.3%; margin-left: 7.3%" value="{{ old('firstname') }}">
              <label class="col-form-label" style="margin-left: 5%">{{ __('LastName') }}</label>
              <input id="lastname" class="text-box" name="lastname" style="width:15.5%; margin-left: 4.5%" value="{{ old('lastname') }}">
            </div>
            <div class=form-group>
              <label class="col-form-label" style="margin-left: 10%">{{ __('Contact') }}</label>
              <input id="contact" class="text-box" name="contact" style="width:19.5%; margin-left: 8.5%" value="{{ old('contact') }}">
              <label class="col-form-label text-md-right" style="margin-left: 5%">{{ __('Age Group') }}</label>
              <select class="text-box" name="age_group" style="width: 8%; margin-left: 4.4%" value="{{ old('age_group') }}">
              <option value="">-- Age Group --</option>
              <option value="{{ 'Unknown' }}">{{ _('Unknown') }}</option>
              <option value="{{ '15-19' }}">{{ _('15-19') }}</option>
              <option value="{{ '20-24' }}">{{ _('20-24') }}</option>
              <option value="{{ '25-29' }}">{{ _('25-29') }}</option>
              <option value="{{ '30-34' }}">{{ _('30-34') }}</option>
              <option value="{{ '35-39' }}">{{ _('35-39') }}</option>
              <option value="{{ '40-45' }}">{{ _('40-45') }}</option>
              <option value="{{ '45-49' }}">{{ _('45-49') }}</option>
              <option value="{{ '50+' }}">{{ _('50+') }}</option>
              </select>
            </div>
            <div class=form-group>
              <label class="col-form-label text-md-right" style="margin-left: 10%">{{ __('HIV Status') }}</label>
              <select class="text-box" name="hiv_status" style="width: 19.6%; margin-left: 7%" value="{{ old('hiv_status') }}">
              <option value="">-- HIV Status --</option>
              <option value="{{ 'Pos on ART' }}">{{ _('Positive on ART') }}</option>
              <option value="{{ 'Pos NOT on ART' }}">{{ _('Positive NOT on ART') }}</option>
              <option value="{{ 'Neg Tested < 1 Year' }}">{{ _('Negative Tested < 1 Year') }}</option>
              <option value="{{ 'Unknown' }}">{{ _('Unknown') }}</option>
              </select>
              <label class="col-form-label" style="margin-left: 5%">{{ __('Reason for Visit') }}</label>
              <select class="text-box" name="visit_reason" style="width: 15%; margin-left: 1.8%" value="{{ old('visit_reason') }}">
              <option value="">-- Reason for Visit --</option>
              <option value="{{ 'Initial Screening' }}">{{ _('Initial Screening') }}</option>
              <option value="{{ 'Postponed Tx' }}">{{ _('Postponed Tx') }}</option>
              <option value="{{ 'Subsequent after Tx' }}">{{ _('Subsequent after Tx') }}</option>
              <option value="{{ 'Susequent Screening' }}">{{ _('Susequent Screening') }}</option>
              <option value="{{ 'Referral' }}">{{ _('Referral') }}</option>
              <option value="{{ 'Problem after Tx' }}">{{ _('Problem after Tx') }}</option>
              </select>
            </div>
            <div class=form-group>
              <label class="col-form-label text-md-right" style="margin-left: 10%">{{ __('Screening Method') }}</label>
              <select class="text-box" name="screening_method" style="width: 19.6%; margin-left: 3%" value="{{ old('screening_method') }}">
              <option value="">-- Screening Method --</option>
              <option value="{{ 'VIA' }}">{{ _('VIA') }}</option>
              <option value="{{ 'SSE' }}">{{ _('Speculum Exam') }}</option>
              <option value="{{ 'PAP Smear' }}">{{ _('PAP Smear') }}</option>
              <option value="{{ 'HPV DNA' }}">{{ _('HPV DNA') }}</option>
              </select>
              <label class="col-form-label" style="margin-left: 5%">{{ __('Screening Result') }}</label>
              <select class="text-box" name="screening_result" style="width: 15%; margin-left: 1.3%" value="{{ old('screening_result') }}">
              <option value="">-- Screening Result --</option>
              <option value="{{ 'Negative' }}">{{ _('VIA Negative') }}</option>
              <option value="{{ 'Positive' }}">{{ _('VIA Positive') }}</option>
              <option value="{{ 'CA Suspect' }}">{{ _('Suspect Cancer') }}</option>
              <option value="{{ 'PAP Normal' }}">{{ _('PAP Smear Normal') }}</option>
              <option value="{{ 'PAP Abnormal' }}">{{ _('PAP Smear Abnormal') }}</option>
              <option value="{{ 'HPV-' }}">{{ _('HPV-') }}</option>
              <option value="{{ 'HPV-' }}">{{ _('HPV-') }}</option>
              <option value="{{ 'No Visible Lesion' }}">{{ _('No Visible Lesion') }}</option>
              <option value="{{ 'Other Gynae' }}">{{ _('Other Gynae') }}</option>
              </select>
            </div>
            <div class=form-group>
              <label class="col-form-label text-md-right" style="margin-left: 10%">{{ __('Treatment Status') }}</label>
              <select class="text-box" name="treatment_status" style="width: 19.6%; margin-left: 3.6%" value="{{ old('treatment_status') }}">
              <option value="">-- Treatment Status --</option>
              <option value="{{ 'Same Day Tx' }}">{{ _('Same Day Treatment') }}</option>
              <option value="{{ 'Postponed Tx' }}">{{ _('Postponed Treatment') }}</option>
              <option value="{{ 'Postponed Tx Performed' }}">{{ _('Postponed Treatment Performed') }}</option>
              <option value="{{ 'Referral' }}">{{ _('Referral') }}</option>
              </select>
              <label class="col-form-label" style="margin-left: 5%">{{ __('Treatment Done') }}</label>
              <select class="text-box" name="treatment_done" style="width: 15%; margin-left: 2%" value="{{ old('treatment_done') }}">
              <option value="">-- Treatment Done --</option>
              <option value="{{ 'Cryotherapy' }}">{{ _('Cryotherapy') }}</option>
              <option value="{{ 'Thermal Coagulation' }}">{{ _('Thermal Coagulation') }}</option>
              <option value="{{ 'LEEP' }}">{{ _('LEEP') }}</option>
              <option value="{{ 'Other' }}">{{ _('Other') }}</option>
              </select>
            </div>
            </div>
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
