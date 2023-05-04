<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ModeratorsModel extends Model
{
    use HasFactory;

    protected $table = 'moderators';

    protected $fillable = [
        'events_id',
        'name',
        'jobtitle',
        'description',
        'image',
        'active',
        'sort'
    ];

    public function event(): belongsTo
    {
        return $this->belongsTo(Event::class);
    }
}
