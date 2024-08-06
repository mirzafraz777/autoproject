<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'u_id', 'current_balance', 'total_earning', 'ref_bonus', 'status', 'ref_code', 'img'
    ];

    // for creating team
    public function team_info()
    {
        return $this->belongsTo(User::class,'u_id');
    }
}
