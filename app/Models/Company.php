<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Competitor;

class Company extends Model
{
    use HasFactory;

    public function competitors()
    {
        return $this->belongsTo(Competitor::class);
    }
}
