<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



class blogs extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $timestamps=false;


    protected $fillable = [
        'tittle',
        'body',

    ];
}
