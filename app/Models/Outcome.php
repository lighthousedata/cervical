<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outcome extends Model
{
    use HasFactory;

    protected $table = 'outcomes';
    protected $primaryKey = 'id';

    protected $fillable = [
        'clientnumber', 'followup_outcome', 'sample_type', 'histology_result', 'treatment_provided', 'recomended_plan', 'feedback'];

    public function referral()
    {
        return $this->belongsTo(Outcome::class, 'clientnumber');
    }    
}
