<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $connection = 'mysql_second';

    protected $table = 'users';

    protected $fillable = [
        'first_name',
        'last_name',
        'date_of_birth',
        'email',
        'password',
    ];
}
