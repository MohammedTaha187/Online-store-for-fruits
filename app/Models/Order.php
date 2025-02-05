<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;
    protected $guarded = ['id' , 'created_at' , 'updated_at'];

    public function products() {
        return $this->belongsToMany(Product::class);
        }

        public function user() {
            return $this->belongsTo(User::class);
        }

}
