<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    public $table = 'employees';




    public $fillable = [
        'birth_date',
        'first_name',
        'last_name',
        'gender',
        'hire_date'
       
    ];
    public function salary()
    {
        return $this->hasOne(Salary::class);
    }
    public function title()
    {
        return $this->hasOne(Title::class);
    }
}
