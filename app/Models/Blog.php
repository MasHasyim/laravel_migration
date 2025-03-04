<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Blog extends Model
{
    use HasFactory;

    // izin untuk input data ke column2 yang maxassignment
    protected $fillable = [
        'title', 'description'
    ];

    // menjaga terkait column apa saja yang tidak boleh di maxassignment
    // protected $guarded = [
    //     'id'
    // ];

    // "$fillable" dan "$guarded" tidak boleh dijalankan bersamaan
    // penggunaan dari keduanya, wajib memberikan/menamai peload
        
    
}
