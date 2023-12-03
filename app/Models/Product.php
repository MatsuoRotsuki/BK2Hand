<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'name',
        'time_used',
        'price',
        'description',
        'status',
        'user_id',
    ];

    // Nếu bạn sử dụng UUID làm khóa chính
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    public function setProductIdAttribute($value)
    {
        $this->attributes['product_id'] = Str::uuid();
    }

    // ... Các phương thức và quan hệ khác có thể được thêm vào đây
}
