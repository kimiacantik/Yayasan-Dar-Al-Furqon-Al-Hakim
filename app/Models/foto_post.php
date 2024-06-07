<?php

namespace App\Models;

use App\Models\posts;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable;


class foto_post extends Model
{
    use HasFactory, Searchable;

    protected $fillable =[
        'foto_id',
        'nama_foto',
        'deskripsi',
        'gambar',
        'nama_fotografer',
        'post_id'
    ];

    protected $visible =[
        'nama_foto',
        'deskripsi',
        'gambar',
        'nama_fotografer',
    ];

   protected $casts = [
        'published' => 'boolean',
    ];

    public function scopePublished($query)
    {
        return $query->where('published', 1);
    }

    public function posts(): BelongsTo
    {
        return $this->belongsTo(posts::class);
    }

    public function toSearchableArray(): array
    {
        return [
 'foto_id'=>$this->foto_id,
        'nama_foto'=>$this->nama_foto,
        'deskripsi'=>$this->deskripsi,
        'gambar'=>$this->gambar,
        'nama_fotografer'=>$this->nama_fotografer,
        'post_id'=>$this->post_id
       ];
    }
}
