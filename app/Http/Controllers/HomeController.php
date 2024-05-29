<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Referral;
use App\Models\Outcome;
use Khill\Lavacharts\Lavacharts;
use Carbon\Carbon;
/*use Illuminate\Support\Facades\Referral;*/

class HomeController extends Controller
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
    public function index()
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

      $oct = Referral::whereBetween('referral_date', ['2023-10-01', '2023-10-31'])
                       ->where('facility', '=', $facility_id)->count();
      $nooutcome_oct = Referral::whereBetween('referral_date', ['2023-10-01', '2023-10-31'])
                        ->join('outcomes', 'outcomes.referralid', 'referrals.id')
                        ->whereNull('followup_outcome')
                        ->where('facility', '=', $facility_id)->count();
      $partialoutcome_oct = Referral::whereBetween('referral_date', ['2023-10-01', '2023-10-31'])
                        ->join('outcomes', 'outcomes.referralid', 'referrals.id')
                        ->where('followup_outcome', '<>', Null)->whereNull('histology_result')
                        ->where('facility', '=', $facility_id)->count();
      $fulloutcome_oct = Referral::whereBetween('referral_date', ['2023-10-01', '2023-10-31'])
                        ->join('outcomes', 'outcomes.referralid', 'referrals.id')
                        ->where('histology_result', '<>', Null)
                        ->where('facility', '=', $facility_id)->count();
      $nov = Referral::whereBetween('referral_date', ['2023-11-01', '2023-11-30'])
                        ->where('facility', '=', $facility_id)->count();
      $nooutcome_nov = Referral::whereBetween('referral_date', ['2023-11-01', '2023-11-30'])
                        ->join('outcomes', 'outcomes.referralid', 'referrals.id')
                        ->whereNull('followup_outcome')
                        ->where('facility', '=', $facility_id)->count();
      $partialoutcome_nov = Referral::whereBetween('referral_date', ['2023-11-01', '2023-11-30'])
                        ->join('outcomes', 'outcomes.referralid', 'referrals.id')
                        ->where('followup_outcome', '<>', Null)->whereNull('histology_result')
                        ->where('facility', '=', $facility_id)->count();
      $fulloutcome_nov = Referral::whereBetween('referral_date', ['2023-11-01', '2023-11-30'])
                        ->join('outcomes', 'outcomes.referralid', 'referrals.id')
                        ->where('histology_result', '<>', Null)
                        ->where('facility', '=', $facility_id)->count();
      $dec = Referral::whereBetween('referral_date', ['2023-12-01', '2023-12-31'])
                        ->where('facility', '=', $facility_id)->count();
      $nooutcome_dec = Referral::whereBetween('referral_date', ['2023-12-01', '2023-12-31'])
                        ->join('outcomes', 'outcomes.referralid', 'referrals.id')
                        ->whereNull('followup_outcome')
                        ->where('facility', '=', $facility_id)->count();
      $partialoutcome_dec = Referral::whereBetween('referral_date', ['2023-12-01', '2023-12-31'])
                        ->join('outcomes', 'outcomes.referralid', 'referrals.id')
                        ->where('followup_outcome', '<>', Null)->whereNull('histology_result')
                        ->where('facility', '=', $facility_id)->count();
      $fulloutcome_dec = Referral::whereBetween('referral_date', ['2023-12-01', '2023-12-31'])
                        ->join('outcomes', 'outcomes.referralid', 'referrals.id')
                        ->where('histology_result', '<>', Null)
                        ->where('facility', '=', $facility_id)->count();
      $jan = Referral::whereBetween('referral_date', ['2024-01-01', '2024-01-31'])
                        ->where('facility', '=', $facility_id)->count();
      $nooutcome_jan = Referral::whereBetween('referral_date', ['2024-01-01', '2024-01-31'])
                        ->join('outcomes', 'outcomes.referralid', 'referrals.id')
                        ->whereNull('followup_outcome')
                        ->where('facility', '=', $facility_id)->count();
      $partialoutcome_jan = Referral::whereBetween('referral_date', ['2024-01-01', '2024-01-31'])
                        ->join('outcomes', 'outcomes.referralid', 'referrals.id')
                        ->where('followup_outcome', '<>', Null)->whereNull('histology_result')
                        ->where('facility', '=', $facility_id)->count();
      $fulloutcome_jan = Referral::whereBetween('referral_date', ['2024-01-01', '2024-01-31'])
                        ->join('outcomes', 'outcomes.referralid', 'referrals.id')
                        ->where('histology_result', '<>', Null)
                        ->where('facility', '=', $facility_id)->count();
      $feb = Referral::whereBetween('referral_date', ['2024-02-01', '2024-02-28'])
                          ->where('facility', '=', $facility_id)->count();
      $nooutcome_feb = Referral::whereBetween('referral_date', ['2024-02-01', '2024-02-28'])
                        ->join('outcomes', 'outcomes.referralid', 'referrals.id')
                        ->whereNull('followup_outcome')
                        ->where('facility', '=', $facility_id)->count();
      $partialoutcome_feb = Referral::whereBetween('referral_date', ['2024-02-01', '2024-02-28'])
                        ->join('outcomes', 'outcomes.referralid', 'referrals.id')
                        ->where('followup_outcome', '<>', Null)->whereNull('histology_result')
                        ->where('facility', '=', $facility_id)->count();
      $fulloutcome_feb = Referral::whereBetween('referral_date', ['2024-02-01', '2024-02-28'])
                        ->join('outcomes', 'outcomes.referralid', 'referrals.id')
                        ->where('histology_result', '<>', Null)
                        ->where('facility', '=', $facility_id)->count();
      $mar = Referral::whereBetween('referral_date', ['2024-03-01', '2024-03-31'])
                        ->where('facility', '=', $facility_id)->count();
      $nooutcome_mar = Referral::whereBetween('referral_date', ['2024-03-01', '2024-03-31'])
                        ->join('outcomes', 'outcomes.referralid', 'referrals.id')
                        ->whereNull('followup_outcome')
                        ->where('facility', '=', $facility_id)->count();
      $partialoutcome_mar = Referral::whereBetween('referral_date', ['2024-03-01', '2024-03-31'])
                        ->join('outcomes', 'outcomes.referralid', 'referrals.id')
                        ->where('followup_outcome', '<>', Null)->whereNull('histology_result')
                        ->where('facility', '=', $facility_id)->count();
      $fulloutcome_mar = Referral::whereBetween('referral_date', ['2024-03-01', '2024-03-31'])
                        ->join('outcomes', 'outcomes.referralid', 'referrals.id')
                        ->where('histology_result', '<>', Null)
                        ->where('facility', '=', $facility_id)->count();
      $apr = Referral::whereBetween('referral_date', ['2024-04-01', '2024-04-30'])
                        ->where('facility', '=', $facility_id)->count();
      $nooutcome_apr = Referral::whereBetween('referral_date', ['2024-04-01', '2024-04-30'])
                        ->join('outcomes', 'outcomes.referralid', 'referrals.id')
                        ->whereNull('followup_outcome')
                        ->where('facility', '=', $facility_id)->count();
      $partialoutcome_apr = Referral::whereBetween('referral_date', ['2024-04-01', '2024-04-30'])
                        ->join('outcomes', 'outcomes.referralid', 'referrals.id')
                        ->where('followup_outcome', '<>', Null)->whereNull('histology_result')
                        ->where('facility', '=', $facility_id)->count();
      $fulloutcome_apr = Referral::whereBetween('referral_date', ['2024-04-01', '2024-04-30'])
                        ->join('outcomes', 'outcomes.referralid', 'referrals.id')
                        ->where('histology_result', '<>', Null)
                        ->where('facility', '=', $facility_id)->count();
      $may = Referral::whereBetween('referral_date', ['2024-05-01', '2024-05-31'])
                        ->where('facility', '=', $facility_id)->count();
      $nooutcome_may = Referral::whereBetween('referral_date', ['2024-05-01', '2024-05-31'])
                        ->join('outcomes', 'outcomes.referralid', 'referrals.id')
                        ->whereNull('followup_outcome')
                        ->where('facility', '=', $facility_id)->count();
      $partialoutcome_may = Referral::whereBetween('referral_date', ['2024-05-01', '2024-05-31'])
                        ->join('outcomes', 'outcomes.referralid', 'referrals.id')
                        ->where('followup_outcome', '<>', Null)->whereNull('histology_result')
                        ->where('facility', '=', $facility_id)->count();
      $fulloutcome_may = Referral::whereBetween('referral_date', ['2024-05-01', '2024-05-31'])
                        ->join('outcomes', 'outcomes.referralid', 'referrals.id')
                        ->where('histology_result', '<>', Null)
                        ->where('facility', '=', $facility_id)->count();
      $jun = Referral::whereBetween('referral_date', ['2024-06-01', '2024-06-30'])
                        ->where('facility', '=', $facility_id)->count();
      $nooutcome_jun = Referral::whereBetween('referral_date', ['2024-06-01', '2024-06-30'])
                        ->join('outcomes', 'outcomes.referralid', 'referrals.id')
                        ->whereNull('followup_outcome')
                        ->where('facility', '=', $facility_id)->count();
      $partialoutcome_jun = Referral::whereBetween('referral_date', ['2024-06-01', '2024-06-30'])
                        ->join('outcomes', 'outcomes.referralid', 'referrals.id')
                        ->where('followup_outcome', '<>', Null)->whereNull('histology_result')
                        ->where('facility', '=', $facility_id)->count();
      $fulloutcome_jun = Referral::whereBetween('referral_date', ['2024-06-01', '2024-06-30'])
                        ->join('outcomes', 'outcomes.referralid', 'referrals.id')
                        ->where('histology_result', '<>', Null)
                        ->where('facility', '=', $facility_id)->count();
      $jul = Referral::whereBetween('referral_date', ['2024-07-01', '2024-07-31'])
                        ->where('facility', '=', $facility_id)->count();
      $nooutcome_jul = Referral::whereBetween('referral_date', ['2024-07-01', '2024-07-31'])
                        ->join('outcomes', 'outcomes.referralid', 'referrals.id')
                        ->whereNull('followup_outcome')
                        ->where('facility', '=', $facility_id)->count();
      $partialoutcome_jul = Referral::whereBetween('referral_date', ['2024-07-01', '2024-07-31'])
                        ->join('outcomes', 'outcomes.referralid', 'referrals.id')
                        ->where('followup_outcome', '<>', Null)->whereNull('histology_result')
                        ->where('facility', '=', $facility_id)->count();
      $fulloutcome_jul = Referral::whereBetween('referral_date', ['2024-07-01', '2024-07-31'])
                        ->join('outcomes', 'outcomes.referralid', 'referrals.id')
                        ->where('histology_result', '<>', Null)
                        ->where('facility', '=', $facility_id)->count();
      $aug = Referral::whereBetween('referral_date', ['2024-08-01', '2024-08-31'])
                        ->where('facility', '=', $facility_id)->count();
      $nooutcome_aug = Referral::whereBetween('referral_date', ['2024-08-01', '2024-08-31'])
                        ->join('outcomes', 'outcomes.referralid', 'referrals.id')
                        ->whereNull('followup_outcome')
                        ->where('facility', '=', $facility_id)->count();
      $partialoutcome_aug = Referral::whereBetween('referral_date', ['2024-08-01', '2024-08-31'])
                        ->join('outcomes', 'outcomes.referralid', 'referrals.id')
                        ->where('followup_outcome', '<>', Null)->whereNull('histology_result')
                        ->where('facility', '=', $facility_id)->count();
      $fulloutcome_aug = Referral::whereBetween('referral_date', ['2024-08-01', '2024-08-31'])
                        ->join('outcomes', 'outcomes.referralid', 'referrals.id')
                        ->where('histology_result', '<>', Null)
                        ->where('facility', '=', $facility_id)->count();
      $sep = Referral::whereBetween('referral_date', ['2024-09-01', '2024-09-30'])
                        ->where('facility', '=', $facility_id)->count();
      $nooutcome_sep = Referral::whereBetween('referral_date', ['2024-09-01', '2024-09-30'])
                        ->join('outcomes', 'outcomes.referralid', 'referrals.id')
                        ->whereNull('followup_outcome')
                        ->where('facility', '=', $facility_id)->count();
      $partialoutcome_sep = Referral::whereBetween('referral_date', ['2024-09-01', '2024-09-30'])
                        ->join('outcomes', 'outcomes.referralid', 'referrals.id')
                        ->where('followup_outcome', '<>', Null)->whereNull('histology_result')
                        ->where('facility', '=', $facility_id)->count();
      $fulloutcome_sep = Referral::whereBetween('referral_date', ['2024-09-01', '2024-09-30'])
                        ->join('outcomes', 'outcomes.referralid', 'referrals.id')
                        ->where('histology_result', '<>', Null)
                        ->where('facility', '=', $facility_id)->count();
      $initial = Referral::whereBetween('referral_date', ['2020-10-01', '2024-09-30'])
                        ->where('screening_type', 'Initial Screening')
                        ->where('facility', '=', $facility_id)->count();
      $subsequent = Referral::whereBetween('referral_date', ['2020-10-01', '2024-09-30'])
                        ->where('screening_type', 'Subsequent')
                        ->where('facility', '=', $facility_id)->count();
      $post_tx = Referral::whereBetween('referral_date', ['2020-10-01', '2024-09-30'])
                        ->where('screening_type', 'Post Treatment')
                        ->where('facility', '=', $facility_id)->count();
      $largelesion = Referral::whereBetween('referral_date', ['2020-10-01', '2024-09-30'])
                        ->where('referral_reason', 'Lesion >75%')
                        ->where('facility', '=', $facility_id)->count();
      $CAsuspect = Referral::whereBetween('referral_date', ['2020-10-01', '2024-09-30'])
                        ->where('referral_reason', 'CA Suspect')
                        ->where('facility', '=', $facility_id)->count();
      $othergynae = Referral::where('referral_reason', 'Other Gynae')
                        ->where('facility', '=', $facility_id)->count();
      $normal = Outcome::where('histology_result', 'Normal')
                        ->where('facility', '=', $facility_id)
                        ->join('referrals', 'referrals.id', 'outcomes.referralid')->count();
      $cin1 = Outcome::where('histology_result', 'CIN I')
                        ->where('facility', '=', $facility_id)
                        ->join('referrals', 'referrals.id', 'outcomes.referralid')->count();
      $cin2 = Outcome::where('histology_result', 'CIN II')
                        ->where('facility', '=', $facility_id)
                        ->join('referrals', 'referrals.id', 'outcomes.referralid')->count();
      $cin3 = Outcome::where('histology_result', 'CIN III')
                        ->where('facility', '=', $facility_id)
                        ->join('referrals', 'referrals.id', 'outcomes.referralid')->count();
      $carcinoma = Outcome::where('histology_result', 'Carcinoma')
                        ->where('facility', '=', $facility_id)
                        ->join('referrals', 'referrals.id', 'outcomes.referralid')->count();
      $invasivecancer = Outcome::where('histology_result', 'Invasive Cancer')
                        ->where('facility', '=', $facility_id)
                        ->join('referrals', 'referrals.id', 'outcomes.referralid')->count();
      $leep = Outcome::where('treatment_provided', 'LLETZ/LEEP')
                        ->where('facility', '=', $facility_id)
                        ->join('referrals', 'referrals.id', 'outcomes.referralid')->count();
      $chemo = Outcome::where('treatment_provided', 'Chemotherapy')
                        ->where('facility', '=', $facility_id)
                        ->join('referrals', 'referrals.id', 'outcomes.referralid')->count();
      $hysterectomy = Outcome::where('treatment_provided', 'Hysterectomy')
                        ->where('facility', '=', $facility_id)
                        ->join('referrals', 'referrals.id', 'outcomes.referralid')->count();
      $thermo = Outcome::where('treatment_provided', 'Thermotherapy')
                        ->where('facility', '=', $facility_id)
                        ->join('referrals', 'referrals.id', 'outcomes.referralid')->count();
      $gynae = Outcome::where('treatment_provided', 'Other Gynae')
                        ->where('facility', '=', $facility_id)
                        ->join('referrals', 'referrals.id', 'outcomes.referralid')->count();

        return view('home', compact('oct', 'nooutcome_oct', 'partialoutcome_oct', 'fulloutcome_oct', 'nov', 'nooutcome_nov', 'partialoutcome_nov', 'fulloutcome_nov', 'dec', 'nooutcome_dec', 'partialoutcome_dec', 'fulloutcome_dec',
                    'jan', 'nooutcome_jan', 'partialoutcome_jan', 'fulloutcome_jan', 'feb', 'nooutcome_feb', 'partialoutcome_feb', 'fulloutcome_feb', 'mar', 'nooutcome_mar', 'partialoutcome_mar', 'fulloutcome_mar',
                    'apr', 'nooutcome_apr', 'partialoutcome_apr', 'fulloutcome_apr', 'may', 'nooutcome_may', 'partialoutcome_may', 'fulloutcome_may', 'jun', 'nooutcome_jun', 'partialoutcome_jun', 'fulloutcome_jun',
                    'jul', 'nooutcome_jul', 'partialoutcome_jul', 'fulloutcome_jul', 'aug', 'nooutcome_aug', 'partialoutcome_aug', 'fulloutcome_aug', 'sep', 'nooutcome_sep', 'partialoutcome_sep', 'fulloutcome_sep',
                    'initial', 'subsequent', 'post_tx', 'largelesion', 'CAsuspect', 'othergynae', 'normal', 'cin1', 'cin2', 'cin3', 'carcinoma', 'invasivecancer',
                    'leep', 'chemo', 'hysterectomy', 'thermo', 'gynae', 'this_facility'));
    }
  }    
