<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $guarded = ['created_at', 'deleted_at', 'updated_at'];

    protected $fillable = [
        'name',
        'age',
        'sex',
        'phone',
        'address',
        'agent_id',
    ];

    public function agent(){
        return $this->belongsTo(Agent::class);
    }
}
