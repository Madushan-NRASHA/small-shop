<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class client_detailes extends Model
{
    use HasFactory;

    // Define the table name (since it's non-standard)
    protected $table = 'client_detailes';

    // Define the fillable fields to allow mass assignment
    protected $fillable = ['name', 'email', 'age', 'image', 'password'];
}
