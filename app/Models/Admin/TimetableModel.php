<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TimetableModel extends Model
{
    use HasFactory;

    protected $table = 'timetable';

    protected $fillable = [
        'time',
        'place',
        'description',
        'image',
        'sort',
        'active'
    ];

    public function scheduleTable(): belongsTo
    {
        return $this->belongsTo(ScheduleModel::class);
    }


}
