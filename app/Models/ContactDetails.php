<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactDetails extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'email',
        'phone_number',
    ];
    public function personalInfo()
{
    return $this->belongsTo(PersonalInfo::class);
}

}
