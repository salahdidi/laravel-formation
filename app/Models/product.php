<?php

namespace App\Models;

use App\Observers\ProductObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy([ProductObserver::class])]
class product extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';
    protected $primaryKey = 'product_id';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'product_name',
        'product_description',
        'product_price',
    ];
    protected function casts(): array
    {
        return [
            'product_name' => 'string',
            'product_price' => 'float',
            'product_description' => 'string',
        ];
    }
}
