<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalInfo extends Model
{
    use HasFactory;
    protected $table = 'personal_info';

    protected $fillable = [
        'first_name',
        'last_name',
        'birthdate',
        'address',
    ];
    public function contactDetails()
{
    return $this->hasOne(ContactDetails::class);
}

public function reviews()
{
    return $this->hasMany(Review::class);
}

}
