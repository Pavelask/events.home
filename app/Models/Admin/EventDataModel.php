<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EventDataModel extends Model
{
    use HasFactory;

    protected $table = 'events_data';

    protected $fillable = [
        'events_id',
        'banner',
        'contacts',
        'image',
        'info',
        'locate',
        'adress',
        'shema',
        'map',
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(EventsModel::class, 'id', 'events_id');
    }
}
