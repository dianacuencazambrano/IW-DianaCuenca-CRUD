<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_skill';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_status',
        'title_skill',
        'description_skill',
    ];

    public function status(){
        return $this->belongsTo(Status::class, 'id_status');
    }
}
