<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lottery extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $count = 1;

    public function calculate()
    {
        return $amount = $this->total_lottery * $this->total_price;
    }

    public function alphabets()
    {
        return $this->belongsToMany(Alphabet::class);
    }
}
