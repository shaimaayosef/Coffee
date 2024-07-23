<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('messages')->insert([
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'message' => 'This is a test message.',
                'is_read' => false, // Assuming you have an is_read column
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Jane Doe',
                'email' => 'jane@example.com',
                'message' => 'Another test message.',
                'is_read' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'shaimaa sayed',
                'email' => 'shimaa@example.com',
                'message' => 'hello thanks for your serveces.',
                'is_read' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'sars joun',
                'email' => 'sara@example.com',
                'message' => 'hi thanks for amazing drinks.',
                'is_read' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'mena shalapy',
                'email' => 'mena@example.com',
                'message' => 'hi your coffe is wonderfull thanks.',
                'is_read' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

        ]);
    }
}
