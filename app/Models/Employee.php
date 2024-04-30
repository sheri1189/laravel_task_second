<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        "company",
        "first_name",
        "last_name",
        'email',
        'contact_no',
        'added_from',
    ];
}
