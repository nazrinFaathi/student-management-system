<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'students';
    protected $primaryKey = 'student_id';

    public function teacher()
    {
        return $this->belongsTo('Teacher', 'teacher_id');
    }
}
