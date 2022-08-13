<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['category', 'username'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function username()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('kode', 'like', '%' . $search . '%')
                ->orWhere('deskripsi', 'like', '%' . $search . '%')
                ->orWhere('l_deskripsi', 'like', '%' . $search . '%')
                ->orWhere('loc', 'like', '%' . $search . '%');
        });


        // $query->when(
        //     $filters['category'] ?? false,
        //     fn ($query, $category) => $query->whereHas('category', fn ($query) => $query->where('slug', $category))
        // );

        $query->when(
            $filters['category'] ?? false,
            fn($query, $category) => $query->whereHas ('category', fn($query) => $query->where('slug', $category))
        );
    }

    // selain id = slug/kode
    public function getRouteKeyName()
    {
        return 'kode';
    }
    // selain id = slug/kode

        
}
