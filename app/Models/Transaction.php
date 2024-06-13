<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $connection = 'mysql_second';

    protected $table = 'transactions';

    protected $fillable = [
        'sender',
        'recipient',
        'country',
        'city',
        'address',
        'phone',
        'withdrawal_method',
        'amount',
        'user_id',

    ];
}
