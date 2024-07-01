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
        'referralid', 'clientnumber', 'assessment_outcome', 'followup_outcome', 'sample_type', 'histology_result', 'treatment_provided', 'recommended_plan', 'feedback'];

    public function referral()
    {
        return $this->belongsTo(Referral::class,'clientnumber');
    }
}
