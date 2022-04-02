<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $a = new Comment();
        $a->content="This is content.";
        $a->title="Title";
        $a->post_id=1;
        $a->user_id=1;
        $a->save();

        Comment::factory()->count(15)->create();
    }
}
