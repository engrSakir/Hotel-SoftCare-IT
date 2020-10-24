<?php

use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blog = new \App\Blog();
        $blog->writer_id = '1';
        $blog->title = 'Blog title 1';
        $blog->description = 'Blog description 1';
        $blog->save();

        $blog = new \App\Blog();
        $blog->writer_id = '2';
        $blog->title = 'Blog title 2';
        $blog->description = 'Blog description 2';
        $blog->save();
    }
}
