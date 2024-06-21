<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Request as Input;

class ClientController extends Controller
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

       return view ('client', ['this_facility'=>$this_facility]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'clientnumber'=>'required',
            'visitdate'=>'required',
            'LH_pid'=>'',
            'firstname'=>'required',
            'lastname'=>'required',
            'contact'=>'',
            'age_group'=>'',
            'hiv_status'=>'required',
            'visit_reason'=>'',
            'screening_method'=>'required',
            'screening_result'=>'required',
            'treatment_status'=>'required',
            'treatment_done'=>'required',
        ]);
        $client = new Client();
        $client->clientnumber=$request->clientnumber;
        $client->visitdate=$request->visitdate;
        $client->LH_pid=$request->LH_pid;
        $client->firstname=$request->firstname;
        $client->lastname=$request->lastname;
        $client->contact=$request->contact;
        $client->age_group=$request->age_group;
        $client->hiv_status=$request->hiv_status;
        $client->visit_reason=$request->visit_reason;
        $client->screening_method=$request->screening_method;
        $client->screening_result=$request->screening_result;
        $client->treatment_status=$request->treatment_status;
        $client->treatment_done=$request->treatment_done;
        $client->save();

        return redirect()->route('newclient')->with('success','New Client Registered Successfully !');
    }
}
