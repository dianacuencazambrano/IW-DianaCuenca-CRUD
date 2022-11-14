<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Skill;
use App\Models\Qualification;

class Skill_Qual_Stud extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'skill_qual_studs';

    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }

    public function skill(){
        return $this->belongsTo(Skill::class, 'id_skill');
    }

    public function qual(){
        return $this->belongsTo(Qualification::class, 'id_qual');
    }
}
