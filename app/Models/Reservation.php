<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    public $timestamps = true;

    /**
     * The name of the database table.
     *
     * @var string
     */
    protected $table = 'reservations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'location_id',
        'date',
        'start_time',
        'end_time',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'date' => 'date:Y-m-d'
    ];

    /**
     * Get bound location
     */
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    /**
     * Get bound user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
