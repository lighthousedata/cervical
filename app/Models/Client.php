<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table = 'clients';
    protected $fillable = [
        'clientnumber', 'visitdate', 'LH_pid', 'firstname', 'lastname',
        'contact', 'age_group', 'hiv_status', 'visit_reason', 'screening_method',
        'screening_result', 'treatment_status', 'treatment_done'];

    public function referrals()
    {
        return $this->hasMany(Referral::class, 'clientnumber');
    }    
}
