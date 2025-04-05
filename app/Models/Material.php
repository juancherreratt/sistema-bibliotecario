<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Material extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'authors',
        'isbn',
        'issn',
        'description',
        'reference_code',
        'quantity',
        'price',
        'type',
        'section_id',
        'library_id',
    ];

    public function library()
    {
        return $this->belongsTo(Library::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
