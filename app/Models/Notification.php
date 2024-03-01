<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = ['agent_id', 'user_id', 'message', 'service_type', 'read'];

    public function agent()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
