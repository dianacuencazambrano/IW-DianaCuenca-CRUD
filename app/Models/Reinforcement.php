<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reinforcement extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_rein';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_status',
        'title_rein',
        'description_rein',
    ];
    public function status(){
        return $this->belongsTo(Status::class, 'id_status');
    }

    public function skill(){
        return $this->belongsTo(Skill::class, 'id_skill');
    }
}
