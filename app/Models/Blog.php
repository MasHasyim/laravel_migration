<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Blog extends Model
{
    use HasFactory;
    use SoftDeletes;

    //  $fillable & $guarded harus ada ketika hendak menggunakan elloquent

    // izin untuk input data ke column2 yang mass assignment
    protected $fillable = [
        'title',
        'description'
    ];
    // menjaga terkait column apa saja yang tidak boleh di mass assignment
    // protected $guarded = [
    //     'id'
    // ];

    // "$fillable" dan "$guarded" tidak boleh dijalankan bersamaan
    // penggunaan dari keduanya, wajib memberikan/menamai peload


    /**
     * Get all of the comments for the Blog
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments(): HasMany
    {
        // return $this->hasMany(Comment::class, 'blog_id', 'id');
        return $this->hasMany(Comment::class);    //return simpel ini bisa digunakan ketika sudah membuat foreign key,local key dll nya sesuai dengan aturan laravel

    }


    /**
     * The tags that belong to the Blog
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}
