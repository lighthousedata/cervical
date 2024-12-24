<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outcome extends Model
{
    use HasFactory;

    protected $table = 'outcomes';
    protected $primaryKey = 'outcomeid';

    protected $fillable = [
        'referralid', 'clientnumber', 'assessment_outcome', 'followup_outcome', 'followup_outcome_date', 'sample_type', 'histology_result', 'histology_result_date', 'treatment_provided', 'treatment_date', 'recommended_plan', 'feedback', 'referral_outcome'];

    public function referral()
    {
        return $this->belongsTo(Referral::class,'id');
    }
}
