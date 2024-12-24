@extends('adminlte::page')

@section('title', 'Cervical Cancer | Referral Outcomes')
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
            <form method="GET" action="{{ ('outcomes') }}">
                 {{csrf_field()}}
            <div class="form-group" style="font-size: 15px">
            <div class=form-group style="font-size: 15px; margin-left: 10%">              
              <label class="col-form-label">{{ __('Client Number') }}</label>
              <input id="clientnumber" class="text-box" name="clientnumber" style="width: 20%; margin-left: 5%" value="{{ old('clientnumber') }}">
              <label class="col-form-label" style="margin-left: 10%">{{ __('Assessment Outcome') }}</label>
              <select class="text-box" name="assessment_outcome" style="width: 20%; margin-left:1.5%" value="{{ old('assessment_outcome') }}">
              <option value="">-- Assessment Outcome --</option>
              <option value="{{ 'Chronic Cervitis/STI' }}">{{ _('Chronic Cervitis/STI') }}</option>
              <option value="{{ 'VIA Negative' }}">{{ _('VIA Negative') }}</option>
              <option value="{{ 'VIA Positive' }}">{{ _('VIA Positive') }}</option>
              <option value="{{ 'PAP Smear Normal' }}">{{ _('PAP Smear Normal') }}</option>
              <option value="{{ 'PAP Smear Abnormal' }}">{{ _('PAP Smear Abnormal') }}</option>
              <option value="{{ 'No Visible Lesion' }}">{{ _('No Visible Lesion') }}</option>
              <option value="{{ 'CA Suspect' }}">{{ _('Suspected Cancer') }}</option>
              </select>
            </div>
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
              <label class="col-form-label" style="margin-left: 10%">{{ __('Followup Outcome') }}</label>
              <select class="text-box" name="followup_outcome" style="width: 18%; margin-left: 2.3%; font-size: 15px" value="{{ old('followup_outcome') }}">
                          <option value="">-- Followup Outcome --</option>
                          <option value="{{ 'Consultation' }}">{{ _('Booked for Consultation') }}</option>
                          <option value="{{ 'Biopsy Booked' }}">{{ _('Biopsy Booked') }}</option>
                          <option value="{{ 'Biopsy Taken' }}">{{ _('Biopsy Taken') }}</option>
                          <option value="{{ 'Colposcopy' }}">{{ _('Booked for Colposcopy') }}</option>
                          <option value="{{ 'LEEP Booked' }}">{{ _('LEEP Booked') }}</option>
                          <option value="{{ 'Negative' }}">{{ _('Negative Result') }}</option>
                          <option value="{{ 'Confirmed Cancer' }}">{{ _('Confirmed Cancer') }}</option>
                          <option value="{{ 'Operation' }}">{{ _('Booked for Operation') }}</option>
                          <option value="{{ 'Non-Cancerous' }}">{{ _('Non-Cancerous') }}</option>
                          <option value="{{ 'Other Gynae' }}">{{ _('Other Gynae') }}</option>
                          <option value="{{ 'Not Reachable' }}">{{ _('Not Reachable') }}</option>
                          <option value="{{ 'No Follow-up' }}">{{ _('No Follow-up') }}</option>
                          <option value="{{ 'Treatment Done' }}">{{ _('Treatment Done') }}</option>
                          <option value="{{ 'Transfer Out' }}">{{ _('Transfer Out') }}</option>
                          <option value="{{ 'Died' }}">{{ _('Died') }}</option>
              </select>
              <label class="col-form-label text-md-right" style="margin-left: 8.7%">{{ __('Sample Type') }}</label>
              <select class="text-box" name="sample_type" style="width: 18%; margin-left: 6.5%; font-size: 15px" value="{{ old('sample_type') }}">
                          <option value="">-- Sample Type --</option>
                          <option value="{{ 'Punch Biopsy' }}">{{ _('Punch Biopsy Sample') }}</option>
                          <option value="{{ 'LLETZ' }}">{{ _('LLETZ Sample') }}</option>
              </select>
            </div>
            <div class=form-group>
              <label class="col-form-label text-md-right" style="margin-left: 10%">{{ __('Histology Result') }}</label>
              <select class="text-box" name="histology_result" style="width: 18%; margin-left: 3.9%; font-size: 15px" value="{{ old('histology_result') }}">
                          <option value="">-- Histology Result --</option>
                          <option value="{{ 'Normal' }}">{{ _('Normal') }}</option>
                          <option value="{{ 'CIN I' }}">{{ _('CIN I') }}</option>
                          <option value="{{ 'CIN II' }}">{{ _('CIN II') }}</option>
                          <option value="{{ 'CIN III' }}">{{ _('CIN III') }}</option>
                          <option value="{{ 'Carcinoma' }}">{{ _('Carcinoma in Situ') }}</option>
                          <option value="{{ 'Invasive Cancer' }}">{{ _('Invasive Cancer') }}</option>
              </select>
              <label class="col-form-label" style="margin-left: 8.5%">{{ __('Treatment Provided') }}</label>
              <select class="text-box" name="treatment_provided" style="width: 18%; margin-left: 2.5%; font-size: 15px" value="{{ old('treatment_provided') }}">
                          <option value="">-- Treatment Provided --</option>
                          <option value="{{ 'LLETZ/LEEP' }}">{{ _('LLETZ/LEEP') }}</option>
                          <option value="{{ 'Hysterectomy' }}">{{ _('Hysterectomy') }}</option>
                          <option value="{{ 'Chemotherapy' }}">{{ _('Chemotherapy') }}</option>
                          <option value="{{ 'Palliative Care' }}">{{ _('On Palliative Care') }}</option>
                          <option value="{{ 'Other Gynae' }}">{{ _('Treated for Other Gynae') }}</option>
                          <option value="{{ 'Thermotherapy' }}">{{ _('Thermotherapy') }}</option>
              </select>
            </div>
            <div class=form-group>
              <label class="col-form-label" style="margin-left: 9.5%">{{ __('Recommended Plan') }}</label>
              <select class="text-box" name="recommended_plan" style="width: 18%; margin-left: 2.2%; font-size: 15px" value="{{ old('recommended_plan') }}">
                          <option value="">-- Recommended Plan --</option>
                          <option value="{{ 'Hysterectomy' }}">{{ _('Hysterectomy') }}</option>
                          <option value="{{ 'Trachelectomy' }}">{{ _('Trachelectomy') }}</option>
                          <option value="{{ 'Discharged' }}">{{ _('Discharged Normal') }}</option>
                          <option value="{{ 'Routine Screening'}}">{{ _('Routine Screening')}}</option>
                          <option value="{{ 'Follow-up' }}">{{ _('Continue Follow-up') }}</option>
              </select>
              <label class="col-form-label text-md-right" style="margin-left: 9%">{{ __('Feedback') }}</label>
              <input id="feedback" class="text-box" name="feedback" style="width:18%; margin-left: 8.5%" value="{{ old('feedback') }}">
              <label class="col-form-label text-md-right" style="margin-left: 9%">{{ __('Referral Outcome') }}</label>
              <input id="referraloutcome" class="text-box" name="referraloutcome" style="width:18%; margin-left: 8.5%" value="{{ old('referraloutcome') }}">
            </div>
            </div>
            <hr>
              <div>
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
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
