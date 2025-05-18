<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id', 'borrower_name', 'quantity', 'borrow_date', 'status'
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
