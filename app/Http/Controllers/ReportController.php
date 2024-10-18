<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
/*use Illuminate\Http\StreamedResponse;*/
use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\Support\Facades\Response;
use App\Models\Referral;
use App\Models\Outcome;
use Khill\Lavacharts\Lavacharts;
use Carbon\Carbon;
/*use Illuminate\Support\Facades\Referral;*/

class ReportController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
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

      return view('reportdata', ['this_facility'=>$this_facility]);
    }

    public function exportcsv()
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

      return view('reportdata(csv)', ['this_facility'=>$this_facility]);
    }

    public function exportdata(Request $request)
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

        //Fetch data from the database
      $referralreport = Referral::whereBetween('referral_date', [$startdate, $enddate])->orderBy('referral_date', 'DESC')
                          ->where('facility', '=', $facility_id)
                          ->Join('outcomes', 'outcomes.referralid', 'referrals.id')->get();

          //Create a callback function to write data to the CSV
        $callback= function() use ($referralreport){
            $handle = fopen('php://output', 'w');

            //write CSV header
            fputcsv($handle, ['Patient ID', 'Date Referred', 'Age Group', 'Reason For Visit', 'Category', 'Management', 'Diagnosis', 'Final Outcome', 'Comments']);

            //write CSV data
            foreach ($referralreport as $report) {
              fputcsv($handle, [
               $report->clientnumber,
               $report->referral_date,
               $report->age_group,
               $report->screening_type,
               $report->referral_reason,
               $report->followup_outcome,
               $report->histology_result,
               $report->recommended_plan,
               $report->feedback,
              ]);}
                fclose($handle);
              } ;
              
              //Create a streamed response
              $response = new StreamedResponse($callback, 200, [
                'content-type' => 'text/csv',
                'Content-Disposition' => 'attachment; filename="ReferralReport.csv"',
              ]);

              return $response;             
    }

    public function index(Request $request)
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

      $referralreport = Referral::whereBetween('referral_date', [$startdate, $enddate])->orderBy('referral_date', 'DESC')
                                ->Join('outcomes', 'outcomes.referralid', 'referrals.id')
                                ->where('facility', '=', $facility_id)->get();

      return view ('report', compact('this_facility'))->withDetails($referralreport);
    }
}
