<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Referral;
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
     return view ('referral');
  }

  public function store(Request $request)
  {
    $this->validate($request,[
      'referral_date'=>'required',
      'clientnumber'=>'required',
      'LH_pid'=>'',
      'firstname'=>'required',
      'lastname'=>'required',
      'contact'=>'',
      'age_group'=>'required',
      'screening_type'=>'required',
      'hiv_status'=>'required',
      'referral_reason'=>'required',
      'assessment_outcome'=>'required',
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
    $referral->assessment_outcome=$request->assessment_outcome;
    $referral->save();

    return redirect()->route('referral')->with('success','Referral Client Successfully Entered !');
  }
}
