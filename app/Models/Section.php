<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Section extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'library_id'];

    public function library()
    {
        return $this->belongsTo(Library::class);
    }

    public function materials()
    {
        return $this->hasMany(Material::class);
    }
}
