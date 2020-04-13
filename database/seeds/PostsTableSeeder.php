<?php

use App\Tag;

use App\Post;

use App\User;

use App\Category;

use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Seeder;

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
        $author1 = User::create([
            "name" => "John Doe",
            "email" => "john@doe.com",
            "password" => Hash::make('password'),
        ]);

        $author2 = User::create([
            "name" => "Jane Doe",
            "email" => "jane@doe.com",
            "password" => Hash::make('password'),
        ]);

        $category1 = Category::create([
            "name" => "News"
        ]);

        $category2 = Category::create([
            'name' => 'Marketing'
        ]);

        $category3 = Category::create([
            'name' => 'Partnership'
        ]);

        $post1 = Post::create([
            'title' => 'We relocated our office to a new designed garage',
            'description' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
            'content' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
            "category_id" => $category1->id,
            "image" => 'images/posts/1.jpg',
            "user_id" => $author1->id,

        ]);

        $post2 = $author2->posts()->create([
            'title' => 'Top 5 brilliant content marketing strategies',
            'description' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
            'content' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
            "category_id" => $category2->id,
            "image" => 'images/posts/2.jpg',

        ]);

        $post3 = $author1->posts()->create([
            'title' => 'Best practices for minimalist design with example',
            'description' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
            'content' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
            "category_id" => $category3->id,
            "image" => 'images/posts/3.jpg',

        ]);

        $post4 = $author2->posts()->create([
            'title' => 'Congratulate and thank to Maryam for joining our team',
            'description' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
            'content' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
            "category_id" => $category2->id,
            "image" => 'images/posts/4.jpg',

        ]);

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
