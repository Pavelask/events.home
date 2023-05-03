<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EventStatusModel extends Model
{
    use HasFactory;

    protected $table = 'events_status';

    protected $fillable = [
        'name',
        'sort',
    ];

    public function events(): BelongsTo
    {
        return $this->belongsTo(EventsModel::class);
    }

}
