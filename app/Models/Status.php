<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_status';
    protected $table = 'status';
    protected $fillable = [
        'name_status',
        'description_status',
    ];
    
}
