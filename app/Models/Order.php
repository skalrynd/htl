<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    function key()
    {
        return $this->belongsTo(Key::class);
    }

    function technician()
    {
        return $this->belongsTo(Technician::class);
    }
}
