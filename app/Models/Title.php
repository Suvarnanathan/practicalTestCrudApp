<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    use HasFactory;
    public $table = 'titles';




    public $fillable = [
        'employee_id',
        'title',
        'from_date',
        'to_date'
       
       
    ];
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
