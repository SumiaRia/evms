<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Price2 extends Model
{
    use SoftDeletes;
    use HasFactory;
    public $table = 'prices2';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'price2',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function amenities2()
    {
        return $this->belongsToMany(Amenity2::class);
    }

}
