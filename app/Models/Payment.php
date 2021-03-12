<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'date' => 'required',
        'money' => 'required',
        
    );
}
