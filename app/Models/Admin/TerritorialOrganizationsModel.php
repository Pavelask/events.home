<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TerritorialOrganizationsModel extends Model
{
    use HasFactory;

    protected $table = 'territorial_organizations';

    protected $fillable = [
        'name_to',
        'code',
        'description',
    ];
}
