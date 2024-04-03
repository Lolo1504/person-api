<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table ="personas";

    protected $fillable = [

        "nombre","DNi", "pais","ciudad",
        "apellido","calle","numero","soltero"
     ];    
       protected $hidden = ["created_at","updated_at"];
        
        
        
   
        
    use HasFactory;
}
