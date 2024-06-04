<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\StreamedResponse;
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
      return view('reportdata');
    }

    public function exportdata(Request $request)
    {
      $startdate = $request->startdate;
      $enddate = $request->enddate;

      $referralreport = Referral::whereBetween('referral_date', [$startdate, $enddate])->orderBy('referral_date', 'DESC')
                          ->Join('outcomes', 'outcomes.referralid', 'referrals.id')->get();

        $headers = ['Patient ID', 'Date Referred', 'Age Group', 'Reason For Visit', 'Category', 'Management', 'Diagnosis', 'Final Outcome', 'Comments'];

            $csvData = [];

            foreach ($referralreport as $report) {
                    $csvData[] = [
                     $report->clientnumber,
                     $report->referral_date,
                     $report->age_group,
                     $report->screening_type,
                     $report->referral_reason,
                     $report->followup_outcome,
                     $report->histology_result,
                     $report->recommended_plan,
                     $report->feedback,
                    ];
        }

        $fileName = 'transactions_' . time() . '.csv';

        $filePath = storage_path('app/' . $fileName);

        $fp = fopen($filePath, 'w');
          fputcsv($fp, $headers);
              foreach ($csvData as $row) {
                fputcsv($fp, $row);
              }
                fclose($fp);

                // Write the code to fetch and format the data here

                return new StreamedResponse(function () use ($csvData, $headers) {
                    $handle = fopen('php://output', 'w');
                    fputcsv($handle, $headers);

                    foreach ($csvData as $row) {
                        fputcsv($handle, $row);
                    }

                    fclose($handle);
                }, 200, [
                    'Content-Type' => 'text/csv',
                    'Content-Disposition' => 'attachment; filename="transactions.csv"',
                ]);
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
