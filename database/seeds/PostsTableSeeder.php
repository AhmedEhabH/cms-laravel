<?php

use Illuminate\Database\Seeder;

use App\Post;

use App\Category;

use App\Tag;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $category1 = Category::create([
            'name' => 'News'
        ]);

        $category2 = Category::create([
            'name' => 'Marketing'
        ]);

        $category3 = Category::create([
            'name' => 'Partnership'
        ]);

        // $category4 = Category::create([
        //     'name' => 'Hiring'
        // ]);

        // $category5 = Category::create([
        //     'name' => 'News'
        // ]);

        // $category6 = Category::create([
        //     'name' => 'News'
        // ]);

        $post1 = Post::create([
            'title' => 'We relocated our office to a new designed garage',
            'description' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
            'content' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
            "category_id" => $category1->id,
            "image" => 'images/posts/1.jpg',

        ]);

        $post2 = Post::create([
            'title' => 'Top 5 brilliant content marketing strategies',
            'description' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
            'content' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
            "category_id" => $category2->id,
            "image" => 'images/posts/2.jpg',

        ]);

        $post3 = Post::create([
            'title' => 'Best practices for minimalist design with example',
            'description' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
            'content' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
            "category_id" => $category3->id,
            "image" => 'images/posts/3.jpg',

        ]);

        $post4 = Post::create([
            'title' => 'Congratulate and thank to Maryam for joining our team',
            'description' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
            'content' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
            "category_id" => $category2->id,
            "image" => 'images/posts/4.jpg',

        ]);

        // $post5 = Post::create([
        //     'title' => 'New published books to read by a product designer',
        //     'description' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
        //     'content' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
        //     "category_id" => $category1->id,

        // ]);

        // $post6 = Post::create([
        //     'title' => 'This is why it\'s time to ditch dress codes at work',
        //     'description' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
        //     'content' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
        //     "category_id" => $category3->id,
        // ]);

        $tag1 = Tag::Create([
            'name' => "Job"
        ]);

        $tag2 = Tag::Create([
            'name' => "Customers"
        ]);

        $tag3 = Tag::Create([
            'name' => "Record"
        ]);

        $post1->tags()->attach([$tag1->id, $tag2->id]);

        $post2->tags()->attach([$tag2->id, $tag3->id]);

        $post3->tags()->attach([$tag1->id, $tag3->id]);

    }
}
