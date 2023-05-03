<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MembersModel extends Model
{
    use HasFactory;

    protected $table = 'member';

    protected $fillable = [
        'user_id',
        'events_id',
        'eventsName',
        'surName',
        'firstName',
        'middleName',
        'birthDate',
        'snils',
        'education',
        'contactPhone',
        'email',
        'job_title',
        'workPhone',
        'name_ppo',
        'name_to',
        'region',
        'note',
        'qr_code',
        'qr_code_pic',
        'confirmation',
        'agreement',
    ];

    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function event(): belongsTo
    {
        return $this->belongsTo(EventsModel::class );
    }
}
