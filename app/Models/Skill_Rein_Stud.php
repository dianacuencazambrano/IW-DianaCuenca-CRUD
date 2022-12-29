<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill_Rein_Stud extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'skill_rein_studs';

    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }

    public function skill(){
        return $this->belongsTo(Skill::class, 'id_skill');
    }

    public function rein(){
        return $this->belongsTo(Reinforcement::class, 'id_rein');
    }
}

