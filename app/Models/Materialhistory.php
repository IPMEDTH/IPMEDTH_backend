<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materialhistory extends Model
{
    use HasFactory;

    public $timestamps = true;

    /**
     * The name of the database table.
     *
     * @var string
     */
    protected $table = 'materialhistory';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'created_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    // protected $casts = [
    //     'date_added' => 'date'
    // ];
}
