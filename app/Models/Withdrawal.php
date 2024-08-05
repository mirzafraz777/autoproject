<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdrawal extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function bankDetails(): HasMany
    {
        return $this->hasMany(BankDetail::class, 'id', 'bank_id');
    }
}
