<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    //Aqui se definen los campos que se puedan rellenar de manera masiva
    protected $filliable = ['name','due','comments'];
}
