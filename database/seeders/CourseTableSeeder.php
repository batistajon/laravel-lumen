<?php

namespace Database\Seeders;

use Database\Factories\CourseFactory;
use Illuminate\Database\Seeder;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = CourseFactory::factoryForModel('Course')->count(10)->create();
    }
}
