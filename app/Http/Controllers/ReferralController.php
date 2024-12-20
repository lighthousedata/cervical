<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Referral;
use App\Models\Outcome;
use Illuminate\Support\Facades\Request as Input;


class ReferralController extends Controller
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
    $facility_id = auth()->user()->facility;

      $facilities = $for = [
        '1' => 'MPC',
        '2'  => 'Lighthouse',
        '3'  => 'Rainbow',
        '4'  => 'UFC',
        '5'  => 'Tisungane',
    ];

    $this_facility = $facilities[$facility_id];

     return view ('referral', ['this_facility'=>$this_facility]);
  }

  public function store(Request $request)
  {
    $this->validate($request,[
      'referral_date'=>'required',
      'clientnumber'=>'',
      'LH_pid'=>'',
      'firstname'=>'required',
      'lastname'=>'required',
      'contact'=>'',
      'age_group'=>'required',
      'screening_type'=>'required',
      'hiv_status'=>'required',
      'referral_reason'=>'required',
      'facility'=>'required',
    ]);
    $referral= new Referral();
    $referral->referral_date=$request->referral_date;
    $referral->clientnumber=$request->clientnumber;
    $referral->LH_pid=$request->LH_pid;
    $referral->firstname=$request->firstname;
    $referral->lastname=$request->lastname;
    $referral->contact=$request->contact;
    $referral->age_group=$request->age_group;
    $referral->screening_type=$request->screening_type;
    $referral->hiv_status=$request->hiv_status;
    $referral->referral_reason=$request->referral_reason;
    $referral->facility=$request->facility;
    $referral->save();     
    $referral->id;                          
              
              $outcome = new Outcome();
              $outcome->referralid = $referral->id;
              $outcome->clientnumber = $request->clientnumber;
              $outcome->assessment_outcome=$request->assessment_outcome;
              $outcome->followup_outcome = $request->followup_outcome;
              $outcome->sample_type = $request->sample_type;
              $outcome->histology_result = $request->histology_result;
              $outcome->treatment_provided = $request->treatment_provided;
              $outcome->recommended_plan = $request->recommended_plan;
              $outcome->feedback = $request->feedback;
              $referral->outcome()->save($outcome);

    return redirect()->route('referral')->with('success','Referral Client Successfully Entered !');
  }

public function filterclients(Request $request)
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

      $startdate = $request->startdate;
      $enddate = $request->enddate;

      $filter = Referral::whereBetween('referral_date', [$startdate, $enddate])->orderBy('referral_date', 'DESC')
                          ->Join('outcomes', 'outcomes.referralid', 'referrals.id')->get();

      return view ('searchreferredclient', ['this_facility'=>$this_facility])->withDetails($filter);
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
    $outcome = Outcome::where('clientnumber', 'LIKE', $find)->get();
    $referral = Referral::where('clientnumber', 'LIKE', $find)
                        ->orwhere('firstname', 'LIKE', $find)->get()->take(2);
    
                        

    return view ('searchclient', ['this_facility'=>$this_facility])->withDetails($referral, $outcome);
  }
  public function show($id)
  {
    $referral = Referral::find($id);
    $outcome = $referral->outcome;

    return view('clientinfo', compact('referral', 'outcome'));
  }

  public function client(Request $request)
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
      $referral = Referral::where('referrals.clientnumber', 'LIKE', $find)                        
                        ->Join('outcomes', 'outcomes.referralid', 'referrals.id')->get()->take(1);

      return view ('searchclient', ['this_facility'=>$this_facility])->withDetails($referral);
    }
}
