<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    protected $table = 'machines';

    protected $primaryKey = 'machine_id';

    protected $fillable = ['name', 'description', 'difficulty', 'attack_type', 'os', 'status'];
}
