<?php

use App\Models\Teacher;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeachersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('** Seeding started for teachers table **');
        DB::table('teachers')->truncate();

        Teacher::create(['name' => 'Katie']);
        Teacher::create(['name' => 'Max']);
        $this->command->info('** Seeding ended for teachers table **');
    }
}
