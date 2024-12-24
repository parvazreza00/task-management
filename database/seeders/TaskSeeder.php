<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tasks')->insert([
            [
                'user_id' => 1,
                'task_title' => 'Complete project report',
                'task_des' => 'Prepare and submit the final project report.',
                'status' => 'Pending',
                'due_date' => now()->addDays(5)->toDateString(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'task_title' => 'Update website content',
                'task_des' => 'Revise and update the content on the homepage.',
                'status' => 'In Progress',
                'due_date' => now()->addDays(7)->toDateString(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'task_title' => 'Organize team meeting',
                'task_des' => 'Schedule and plan the next team meeting.',
                'status' => 'Completed',
                'due_date' => now()->subDays(2)->toDateString(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'task_title' => 'Prepare sales pitch',
                'task_des' => 'Draft a presentation for the sales pitch next week.',
                'status' => 'Pending',
                'due_date' => now()->addDays(10)->toDateString(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'task_title' => 'Fix bug in application',
                'task_des' => 'Resolve the reported bug in the application login module.',
                'status' => 'In Progress',
                'due_date' => now()->addDays(3)->toDateString(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'task_title' => 'Design marketing strategy',
                'task_des' => 'Plan and finalize the new marketing strategy.',
                'status' => 'Pending',
                'due_date' => now()->addDays(15)->toDateString(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'task_title' => 'Update user manuals',
                'task_des' => 'Revise the user manuals for the latest release.',
                'status' => 'In Progress',
                'due_date' => now()->addDays(12)->toDateString(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'task_title' => 'Conduct code review',
                'task_des' => 'Review the codebase for the upcoming release.',
                'status' => 'Completed',
                'due_date' => now()->subDays(1)->toDateString(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'task_title' => 'Organize training session',
                'task_des' => 'Prepare and conduct the training session for new employees.',
                'status' => 'Pending',
                'due_date' => now()->addDays(20)->toDateString(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'task_title' => 'Analyze customer feedback',
                'task_des' => 'Compile and analyze customer feedback from surveys.',
                'status' => 'In Progress',
                'due_date' => now()->addDays(8)->toDateString(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
