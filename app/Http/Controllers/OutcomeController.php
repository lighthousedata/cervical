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
      'clientnumber' =>'required | exists:referrals,clientnumber', //check if client has referral details
      'assessment_outcome' =>'',
      'followup_outcome' =>'',
      'sample_type' =>'',
      'histology_result' =>'',
      'treatment_provided' =>'',
      'recommended_plan' =>'',
      'feedback' =>'',
    ];

    $customMessages = [
        'clientnumber.exists' => 'This Client number has no referral details.',
    ];

    $validator = Validator::make($request->all(), $rules, $customMessages);

    if ($validator->fails()) {

        return redirect()->route('referraloutcome')->with(['errors' => $validator->errors()], 422);
    }

    $outcome = new Outcome();
    $outcome->clientnumber = $request->clientnumber;
    $outcome->assessment_outcome=$request->assessment_outcome;
    $outcome->followup_outcome = $request->followup_outcome;
    $outcome->sample_type = $request->sample_type;
    $outcome->histology_result = $request->histology_result;
    $outcome->treatment_provided = $request->treatment_provided;
    $outcome->recommended_plan = $request->recommended_plan;
    $outcome->feedback = $request->feedback;
    $outcome->save();

    return redirect()->route('referraloutcome')->with('success','Referral Outcome Successfully Entered !');
  }

    public function update(Request $request, $id)
    {
      $outcome = Outcome::find($id);
      $input = $request->all();
      $outcome->update($input);

      return redirect()->route('searchoutcome')->with('success','Referral Outcome Updated Successfully !');
    }

    public function client(Request $request)
    {
      $find = Input::get('query');
      $outcome = Outcome::where('outcomes.clientnumber', 'LIKE', $find)
        ->orwhere('referrals.firstname', 'LIKE', $find)
        ->Join('referrals', 'referrals.clientnumber', 'outcomes.clientnumber')->get()->take(5);

      return view ('searchclient')->withDetails($outcome);
    }
    public function search(Request $request)
    {
      $find = Input::get('query');
      $outcome = Outcome::where('clientnumber', 'LIKE', $find)
                          ->get()->take(5);

      return view ('searchoutcome')->withDetails($outcome);
  }

  //public function client(Request $request)
  //{
    //$find = Input::get('query');
    //$referraldetails = Referral::where('clientnumber', 'LIKE', $find)->orwhere('firstname', 'LIKE', $find)->get()->take(5);

    //return view ('searchclient')->withDetails($referraldetails);
  //}

  public function edit($id)
  {
    $outcome = Outcome::find($id);
    return view('edit-outcome', compact('outcome'));
  }
}
