<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'agent_id', 'type_service', 'description', 'prix'
    ];

    // Relation avec l'utilisateur agent
    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }

    // Relation avec l'utilisateur expéditeur
    public function expediteur()
    {
        return $this->belongsTo(User::class, 'expediteur_id');
    }
}
