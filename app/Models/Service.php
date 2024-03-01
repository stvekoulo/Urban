<?php

namespace App\Models;

use App\Models\Notification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;


class Service extends Model
{
    use HasFactory;

    protected $fillable = ['notification_id', 'description', 'prix'];

    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }

    public function expediteur()
    {
        return $this->belongsTo(User::class, 'expediteur_id');
    }
    public function notification()
    {
        return $this->belongsTo(Notification::class);
    }

}
