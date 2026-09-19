<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mood extends Model
{
    use HasFactory;

    protected $fillable = ['mood'];

    // public static function moodCount()
    // {
    //     return [
    //         'Happy' => self::where('mood', 'Happy')->count(),
    //         'Neutral' => self::where('mood', 'Neutral')->count(),
    //         'Sad' => self::where('mood', 'Sad')->count(),
    //         'Angry' => self::where('mood', 'Angry')->count(),
    //     ];
    // }
}
