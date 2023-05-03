<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberStatusModel extends Model
{
    use HasFactory;

    protected $table = 'member_status';

    protected $fillable = [
        'name',
        'sort',
    ];

    protected $attributes = [
        'sort' => '500',
    ];
}
