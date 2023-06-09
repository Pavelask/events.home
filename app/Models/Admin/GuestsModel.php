<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GuestsModel extends Model
{
    use HasFactory;

    protected $table = 'guests';

    protected $fillable = [
        'events_id',
        'name',
        'description',
        'image',
        'active',
        'sort'
    ];

    public function event(): belongsTo
    {
        return $this->belongsTo(EventsModel::class);
    }
}
