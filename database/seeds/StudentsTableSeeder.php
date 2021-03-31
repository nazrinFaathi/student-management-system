<?php

use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('** Seeding started for students table **');
        DB::table('students')->truncate();

        Student::create(['name' => 'John Doe', 'teacher_id' => 1, 'age' => 18, 'gender' => 'M']);

        $this->command->info('** Seeding ended for students table **');
    }
}
