<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = ['agent_id', 'message', 'read'];

    // Ajoutez d'autres relations, accesseurs, mutateurs ou méthodes si nécessaire
}
