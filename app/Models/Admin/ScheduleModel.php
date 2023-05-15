<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ScheduleModel extends Model
{
    use HasFactory;

    protected $table = 'schedule';

    protected $fillable = [
        'events_id',
        'week',
        'date',
        'alt_data',
        'description',
        'sort',
        'active'
    ];

    public function event(): belongsTo
    {
        return $this->belongsTo(EventsModel::class);
    }

    public function timeTable(): HasMany
    {
        return $this->hasMany(TimetableModel::class, 'schedule_id', 'id');
    }
}
