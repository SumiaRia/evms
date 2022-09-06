<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Amenity2 extends Model
{
    use HasFactory;

    use SoftDeletes;

    public $table = 'amenities2';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function prices2()
    {
        return $this->belongsToMany(Price2::class);
    }
}
