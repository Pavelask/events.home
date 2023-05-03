<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EventTypesModel extends Model
{
    use HasFactory;
    protected $table = 'events_type';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'sort',
    ];

    protected $attributes = [
        'sort' => '500',
    ];

    public function events(): belongsTo
    {
        return $this->belongsTo(EventsModel::class);
    }
}
