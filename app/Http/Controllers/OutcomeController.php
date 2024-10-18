<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as Input;
use Illuminate\Support\Facades\Validator;
use App\Models\Outcome;
use App\Models\Client;

class OutcomeController extends Controller
{
  public function __construct()
{
    $this->middleware('auth');
}
/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
  public function create()
  {
    
     return view ('outcome');
  }

  public function store(Request $request)
  {

    $rules =[
      'referralid' => 'reqired | exists:referrals,id', //check if client has referral details 
      'clientnumber' =>'required', 
      'assessment_outcome' =>'',
      'followup_outcome' =>'',
      'sample_type' =>'',
      'histology_result' =>'',
      'treatment_provided' =>'',
      'recommended_plan' =>'',
      'feedback' =>'',
      'referral_outcome'=>'',
    ];

    $customMessages = [
        'clientnumber.exists' => 'This Client number has no referral details.',
    ];

    $validator = Validator::make($request->all(), $rules, $customMessages);

    if ($validator->fails()) {

        return redirect()->route('referraloutcome')->with(['errors' => $validator->errors()], 422);
    }

    $outcome = new Outcome();
    $outcome->referralid = $request->referralid;  
    $outcome->clientnumber = $request->clientnumber;      
    $outcome->assessment_outcome=$request->assessment_outcome;
    $outcome->followup_outcome = $request->followup_outcome;
    $outcome->sample_type = $request->sample_type;
    $outcome->histology_result = $request->histology_result;
    $outcome->treatment_provided = $request->treatment_provided;
    $outcome->recommended_plan = $request->recommended_plan;
    $outcome->feedback = $request->feedback;
    $outcome->referral_outcome = $request->referral_outcome;
    $outcome->save();

    return redirect()->route('referraloutcome')->with('success','Referral Outcome Successfully Entered !');
  }

    public function update(Request $request, $outcomeid)
    {
      $outcome = Outcome::find($outcomeid);
      $input = $request->all();
      $outcome->update($input);

      return redirect()->route('searchclient')->with('success','Referral Outcome Updated Successfully !');
    }
    
    public function search(Request $request)
    {
      $facility_id = auth()->user()->facility;

      $facilities = $for = [
        '1' => 'MPC',
        '2'  => 'Lighthouse',
        '3'  => 'Rainbow',
        '4'  => 'UFC',
        '5'  => 'Tisungane',
    ];

    $this_facility = $facilities[$facility_id];

      $find = Input::get('query');
      $outcome = Outcome::where('clientnumber', 'LIKE', $find)
                          ->get()->take(5);

      return view ('searchoutcome', ['this_facility'=>$this_facility])->withDetails($outcome);
  }

  public function edit($outcomeid)
  {
    $facility_id = auth()->user()->facility;

      $facilities = $for = [
        '1' => 'MPC',
        '2'  => 'Lighthouse',
        '3'  => 'Rainbow',
        '4'  => 'UFC',
        '5'  => 'Tisungane',
    ];

    $this_facility = $facilities[$facility_id];

    $outcome = Outcome::find($outcomeid);
    return view('edit-outcome', ['this_facility'=>$this_facility], compact('outcome'));
  }

  public function editsearch($outcomeid)
  {
    $outcome = Outcome::find($outcomeid);
    return view('edit-search-outcome', compact('outcome'));
  }
}
