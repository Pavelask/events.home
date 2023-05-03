<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventFaqModel extends Model
{
    use HasFactory;

    protected $table = 'f_a_q';

    protected $fillable = [
        'question',
        'answer',
        'sort',
    ];
}
