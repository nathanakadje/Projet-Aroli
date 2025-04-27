<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class registry extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'operator_id',
        'country_id',
        'status',
        'date_sub',
        'date_valid',
        'commentaire'
    ];

    public function operator()
{
    return $this->belongsTo(operators::class, 'operator_id');
}

public function country()
{
    return $this->belongsTo(countries::class, 'country_id');
}

}
