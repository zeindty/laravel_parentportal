<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReportsTableSeeder extends Seeder
{
    public function run()
    {
        // DB::table('reports')->insert([
        //     [
        //         'child_name' => 'John Doe',
        //         'class' => 'TK A',
        //         'status' => 'Completed',
        //         'report_date' => Carbon::now(),
        //         'category' => 'Behavior',
        //         'description' => 'Good behavior throughout the month.',
        //         'teacher_notes' => 'Continue encouraging positive behavior.',
        //         'user_id' => 1,  // assuming user_id of the teacher
        //     ],
        //     [
        //         'child_name' => 'Jane Smith',
        //         'class' => 'TK B',
        //         'status' => 'Pending',
        //         'report_date' => Carbon::now(),
        //         'category' => 'Academics',
        //         'description' => 'Needs improvement in reading.',
        //         'teacher_notes' => 'Needs extra attention during lessons.',
        //         'user_id' => 2,  // assuming user_id of the teacher
        //     ],
        //     // Add more entries as needed...
        // ]);
    }
}
