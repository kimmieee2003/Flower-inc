<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;

    public function warehouseflower()
    {
        return $this->hasMany(WarehouseFlower::class);
    }
}
