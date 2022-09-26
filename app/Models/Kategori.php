<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table="kategori";
    protected $guarded=['id','created_at','updated_at'];

    /**
     * Get all of the berita for the Kategori
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function berita()
    {
        return $this->hasMany(Berita::class);
    }
}
