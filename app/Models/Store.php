<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Store extends Model
{
    use HasFactory;
    protected $fillable = ['name','code','manager','speedDial','orderNumber','orderValue','order','notes','colour','textColour'];
}