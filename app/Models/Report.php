<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'reports';
    protected $primaryKey = 'report_id';

    public function student()
    {
        return $this->belongsTo('Student', 'student_id');
    }
}
