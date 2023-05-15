<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Str;

class EventsModel extends Model
{
    use HasFactory;

    protected $table = 'events';

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($events) {
            $events->{$events->getKeyName()} = (string) Str::uuid();
        });
    }

    public function getIncrementing()
    {
        return false;
    }

    public function getKeyType()
    {
        return 'string';
    }

    protected $fillable = [
        'name',
        'description',
        'date_start',
        'date_end',
        'event_type',
        'sort',
        'status',
        'agreement'
    ];


    public function eventData(): HasOne
    {
        return $this->hasOne(EventDataModel::class, 'events_id', 'id');
    }

//    public function members(): hasMany
//    {
//        return $this->hasMany(Member::class, 'events_id', 'id');
//    }
//
//    public function news(): hasMany
//    {
//        return $this->hasMany(EventsNews::class, 'events_id', 'id');
//    }
//
    public function moderators(): hasMany
    {
        return $this->hasMany(ModeratorsModel::class, 'events_id', 'id');
    }

    public function guests(): hasMany
    {
        return $this->hasMany(GuestsModel::class, 'events_id', 'id');
    }

    public function schedule(): hasMany
    {
        return $this->hasMany(ScheduleModel::class, 'events_id', 'id');
    }
}

