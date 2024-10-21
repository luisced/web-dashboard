<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Assesory extends Model
{
    protected $fillable = ['email', 'date', 'duration', 'id_sede', 'category_id'];

    public function asesors(): BelongsToMany
    {
        return $this->belongsToMany(Asesor::class, 'asesor_assesory');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Categoria::class, 'category_id');
    }
}
