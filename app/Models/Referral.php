<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    use HasFactory;

    protected $table = 'referrals';
    protected $primaryKey = 'id';
    protected $fillable = [
        'clientnumber', 'LH_pid', 'referral_date', 'firstname', 'lastname', 'age_group', 'screening_type', 'hiv_status', 'referral_reason'];

    public function client()
    {
        return $this->belongsTo(Client::class, 'clientnumber');
    }

    public function outcome()
    {
        return $this->hasMany(Outcome::class, 'referralid');
    }
}
