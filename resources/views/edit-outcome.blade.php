@extends('adminlte::page')

@section('title', 'Cervical Cancer | Update Outcomes')

@section('content_header')
<h1></h1>
@stop

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="font-size: 20px">{{ __('Cervical Cancer Referral Outcomes') }}</div>
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
            <form method="POST" action="/updateoutcome/{{$outcome->outcomeid}}">
                 {{csrf_field()}}
                 @method('PUT')
            <div class="form-group" style="font-size: 15px">
            <div class=form-group style="margin-left: 10%">
              <label class="col-form-label">{{ __('Client Number') }}</label>
              <input id="clientnumber" class="text-box" name="clientnumber" style="font-size: 12px; width: 17%; margin-left: 8.5%" value="{{$outcome->clientnumber}}">
              <label class="col-form-label" style="margin-left: 15%">{{ __('Assessment Outcome') }}</label>
              <select class="text-box" name="assessment_outcome" style="font-size: 12px; width: 15%; margin-left:2.5%" value="{{ $outcome->assessment_outcome}}">
              <option value="">-- Assessment Outcome --</option>
              <option {{ ($outcome->assessment_outcome =="Chronic Cervitis/STI") ? 'selected' : ''}}>Chronic Cervitis/STI</option>
              <option {{ ($outcome->assessment_outcome =="VIA Negative") ? 'selected' : ''}}>VIA Negative</option>
              <option {{ ($outcome->assessment_outcome =="VIA Positive") ? 'selected' : ''}}>VIA Positive</option>
              <option {{ ($outcome->assessment_outcome =="PAP Smear Normal") ? 'selected' : ''}}>PAP Smear Normal</option>
              <option {{ ($outcome->assessment_outcome =="PAP Smear Abnormal") ? 'selected' : ''}}>PAP Smear Abnormal</option>
              <option {{ ($outcome->assessment_outcome =="No Visible Lesion") ? 'selected' : ''}}>No Visible Lesion</option>
              <option {{ ($outcome->assessment_outcome =="CA Suspect") ? 'selected' : '' }}>Suspected Cancer</option>
              </select>
            </div>
            <div class="form-group" style="font-size: 12px">
              <div class="input-group date form-group col-xs-5" id="followup_outcome_date" style="margin-left: 10%">
                <label class="col-form-label" style="font-size: 15px">{{ __('Followup Outcome Date') }}</label>
                <input id="followup_outcome_date" class="text-box" name="followup_outcome_date" style="width: 40%; margin-left: 5%" value="{{ $outcome->followup_outcome_date }}">
                <span class="input-group-addon" style="width:10%">
                    <span class="glyphicon glyphicon-calendar">
                    </span>
                </span>
              </div>
              </div>
            <div class="form-group" style="font-size: 15px">
                <label class="col-form-label" style="margin-left: 10%">{{ __('Followup Outcome') }}</label>
                <select type="text" class="text-box" name="followup_outcome" style="width: 15%; margin-left: 5%; font-size: 12px" value="{{ $outcome->followup_outcome}}">
                  <option value="">-- Followup Outcome --</option>
                  <option {{ ($outcome->followup_outcome == "Consultation") ? 'selected' : ''}}>Booked for Consultation</option>
                  <option {{ ($outcome->followup_outcome == "Biopsy Booked") ? 'selected' : ''}}>Biopsy Booked</option>
                  <option {{ ($outcome->followup_outcome == "Biopsy Taken") ? 'selected' : ''}}>Biopsy Taken</option>
                  <option {{ ($outcome->followup_outcome == "Booked for Colposcopy") ? 'selected' : ''}}>Booked for Colposcopy</option>
                  <option {{ ($outcome->followup_outcome == "LEEP Booked") ? 'selected' : ''}}>LEEP Booked</option>
                  <option {{ ($outcome->followup_outcome == "Negative Result") ? 'selected' : ''}}>Negative Result</option>
                  <option {{ ($outcome->followup_outcome == "Confirmed Cancer") ? 'selected' : ''}}>Confirmed Cancer</option>
                  <option {{ ($outcome->followup_outcome == "Booked for Operation") ? 'selected' : ''}}>Booked for Operation</option>
                  <option {{ ($outcome->followup_outcome == "Non-Cancerous") ? 'selected' : ''}}>Non-Cancerous</option>
                  <option {{ ($outcome->followup_outcome == "Other Gynae") ? 'selected' : ''}}>Other Gynae</option>
                  <option {{ ($outcome->followup_outcome == "Not Reachable") ? 'selected' : ''}}>Not Reachable</option>
                  <option {{ ($outcome->followup_outcome == "No Follow-up") ? 'selected' : ''}}>No Follow-up</option>
                  <option {{ ($outcome->followup_outcome == "Treatment Done") ? 'selected' : ''}}>Treatment Done</option>
                  <option {{ ($outcome->followup_outcome == "Transfer Out") ? 'selected' : ''}}>Transfer Out</option>
                  <option {{ ($outcome->followup_outcome == "Died") ? 'selected' : ''}}>Died</option>
                </select>
                <label class="col-form-label text-md-right" style="margin-left: 14%">{{ __('Sample Type') }}</label>
                <select type="text" class="text-box" name="sample_type" style="width: 13%; margin-left: 8%; font-size: 12px" value="{{ $outcome->sample_type}}">
                            <option value="">-- Sample Type --</option>
                            <option {{ ($outcome->sample_type == "Punch Biopsy") ? 'selected' : ''}}>Punch Biopsy</option>
                            <option {{ ($outcome->sample_type == "LLETZ") ? 'selected' : '' }}>LLETZ Sample</option>
                </select>
            </div>
            <div class="form-group" style="font-size: 12px">
              <div class="input-group date form-group col-xs-5" id="histology_result_date" style="margin-left: 10%">
                <label class="col-form-label" style="font-size: 15px">{{ __('Histology Result Date') }}</label>
                <input id="histology_result_date" class="text-box" name="histology_result_date" style="width: 40%; margin-left: 9%" value="{{ $outcome->histology_result_date }}">
                <span class="input-group-addon" style="width:10%">
                    <span class="glyphicon glyphicon-calendar">
                    </span>
                </span>
              </div>
              </div>
            <div class=form-group>
            <label class="col-form-label text-md-right" style="margin-left: 10%">{{ __('Histology Result') }}</label>
              <select type="text" class="text-box" name="histology_result" style="font-size: 15px; width: 15%; margin-left: 6.5%; font-size: 12px" value="{{ $outcome->histology_result}}">
                          <option value="">-- Histology Result --</option>
                          <option {{ ($outcome->histology_result =="Normal") ? 'selected' : '' }}>Normal</option>
                          <option {{ ($outcome->histology_result =="CIN I") ? 'selected' : '' }}>CIN I</option>
                          <option {{ ($outcome->histology_result =="CIN II") ? 'selected' : '' }}>CIN II</option>
                          <option {{ ($outcome->histology_result =="CIN III") ? 'selected' : '' }}>CIN III</option>
                          <option {{ ($outcome->histology_result =="Carcinoma") ? 'selected' : ''}}>Carcinoma in Situ</option>
                          <option {{ ($outcome->histology_result =="Invasive Cancer") ? 'selected' : '' }}>Invasive Cancer</option>
              </select>
              <label class="col-form-label" style="margin-left: 14%">{{ __('Treatment Provided') }}</label>
              <select type="text" class="text-box" name="treatment_provided" style="width: 13%; margin-left: 3.5%; font-size: 12px" value="{{ $outcome->treatment_provided}}">
                          <option value="">-- Treatment Provided --</option>
                          <option {{ ($outcome->treatment_provided =="LLETZ/LEEP") ? 'selected' : '' }}>LLETZ/LEEP</option>
                          <option {{ ($outcome->treatment_provided =="Hysterectomy") ? 'selected' : '' }}>Hysterectomy</option>
                          <option {{ ($outcome->treatment_provided =="Chemotherapy") ? 'selected' : '' }}>Chemotherapy</option>
                          <option {{ ($outcome->treatment_provided =="Palliative Care") ? 'selected' : '' }}>On Palliative Care</option>
                          <option {{ ($outcome->treatment_provided =="Other Gynae") ? 'selected' : '' }}>Treated for Other Gynae</option>
                          <option {{ ($outcome->treatment_provided =="Thermotherapy") ? 'selected' : '' }}>Thermotherapy</option>
              </select>
            </div>
            <div class="form-group" style="font-size: 12px">
              <div class="input-group date form-group col-xs-5" id="LEEP_date" style="margin-left: 10%">
                <label class="col-form-label" style="font-size: 15px">{{ __('Treatment(LEEP) Date') }}</label>
                <input id="LEEP_date" class="text-box" name="LEEP_date" style="width: 40%; margin-left: 8%" value="{{ $outcome->treatment_date}}">
                <span class="input-group-addon" style="width:10%">
                    <span class="glyphicon glyphicon-calendar">
                    </span>
                </span>
              </div>
              </div>
            <div class=form-group>
              <label class="col-form-label" style="margin-left: 10%">{{ __('Recommended Plan') }}</label>
              <select type="text" class="text-box" name="recommended_plan" style="font-size: 15px; width: 15%; margin-left: 4.5%; font-size: 12px" value="{{ $outcome->recommended_plan}}">
                          <option value="">-- Recommended Plan --</option>
                          <option {{ ($outcome->recommended_plan =="Hysterectomy") ? 'selected' : ''}}>Hysterectomy</option>
                          <option {{ ($outcome->recommended_plan =="Trachelectomy") ? 'selected' : ''}}>Trachelectomy</option>
                          <option {{ ($outcome->recommended_plan =="Discharged") ? 'selected' : ''}}>Discharged Normal</option>
                          <option {{ ($outcome->recommended_plan =="Routine Screening") ? 'selected' : ''}}>Routine Screening</option>
                          <option {{ ($outcome->recommended_plan =="Follow-up") ? 'selected' : ''}}>Continue Follow-up</option>
              </select>
              <label class="col-form-label text-md-right" style="margin-left: 14%">{{ __('Feedback') }}</label>
              <input id="feedback" class="text-box" name="feedback" style="font-size: 12px; width:18%; margin-left: 5%" value="{{$outcome->feedback}}">
            </div>
            <div>
              <label class="col-form-label text-md-right" style="margin-left: 10%">{{ __('Referral Outcome') }}</label>
              <select type="text" class="text-box" name="referral_outcome" style="font-size: 15px; width: 15%; margin-left: 6%; font-size: 12px" value="{{ $outcome->referral_outcome}}">
                          <option value="">-- Referral Outcome --</option>
                          <option {{ ($outcome->referral_outcome =="Complete Feedback") ? 'selected' : ''}}>Complete Feedback</option>
              </select>
            </div>
            </div>
            <hr>
              <div>
              <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-2" style="margin-bottom: 2%">
                    <button type="submit" class="btn btn-success float-right" style="font-size:20px; width:12%">
                        {{ __('Save') }}
                    </button>
                    <button type="button" class="btn btn-primary float-left" onclick="location.href='{{ route('searchclient') }}'" style="font-size:20px; width:12%">
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
          $('#followup_outcome_date').datepicker({
          format: "yyyy-mm-dd",
                autoclose: true,
                changeMonth: true,
                changeYear: true
              });
          $('#histology_result_date').datepicker({
          format: "yyyy-mm-dd",
                autoclose: true,
                changeMonth: true,
                changeYear: true
             });
          $('#LEEP_date').datepicker({
          format: "yyyy-mm-dd",
                autoclose: true,
                changeMonth: true,
                changeYear: true
            });
  });
</script>
@stop
