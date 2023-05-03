<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FederalDistrictModel extends Model
{
    use HasFactory;

    protected $table = 'federal_district';

    protected $fillable = [
        'name',
        'code',
        'description',
    ];
}
