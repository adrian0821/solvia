<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardInfo extends Model
{
    use HasFactory;

    protected $table = 'card_info';

    protected $fillable = ['profile_id', 'card_number', 'month', 'year', 'ccv', 'card_type', 'code'];
}
