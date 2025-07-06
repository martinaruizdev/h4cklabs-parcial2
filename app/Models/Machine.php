<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Machine extends Model
{
    protected $table = 'machines';

    protected $primaryKey = 'machine_id';

    protected $fillable = ['name', 'description', 'attack_type', 'os', 'status', 'difficulty_fk', 'image'];

    public function difficulty(): BelongsTo{
        return $this->belongsTo(Difficulty::class, 'difficulty_fk', 'difficulty_id');
    }

    public function attack_types(): BelongsToMany{
        return $this->belongsToMany(
            AttackType::class,
            'machines_have_attacktypes',
            'machine_fk',
            'attack_type_fk',
            'machine_id',
            'attack_type_id'
        );
    }

}
