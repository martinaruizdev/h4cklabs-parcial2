<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Machine extends Model
{
    protected $table = 'machines';

    protected $primaryKey = 'machine_id';

    protected $fillable = ['name', 'description', 'attack_type', 'os', 'status', 'difficulty_fk'];

    public function difficulty(): BelongsTo{
        return $this->belongsTo(Difficulty::class, 'difficulty_fk', 'difficulty_id');
    }

}
