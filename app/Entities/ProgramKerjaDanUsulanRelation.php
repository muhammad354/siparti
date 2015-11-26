<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use App\Entities\ProgramKerja;
use App\Entities\ProgramKerjaUsulan;

class ProgramKerjaDanUsulanRelation extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = "program_kerja_usulan";

    protected $fillable = ['program_kerja_id', 'usulan_id'];
}