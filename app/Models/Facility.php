<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class facility extends Model
{
    use HasFactory;

    protected $fillable = [
        'facility_name',        
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    } 
}
