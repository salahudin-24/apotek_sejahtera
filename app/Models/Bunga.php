<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bunga extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'bunga';
    protected $guarded = [];
    public $timestamps = true;
}
