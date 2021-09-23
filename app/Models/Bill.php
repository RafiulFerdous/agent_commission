<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $guarded = ['created_at', 'deleted_at', 'updated_at'];

    protected $fillable = [
        'name',
        'patient_name',

    ];

    public function agent(){
        return $this->belongsTo(Agent::class);
    }

    public function patient(){
        return $this->belongsTo(patient::class);
    }



}
