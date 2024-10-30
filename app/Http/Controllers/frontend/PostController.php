<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Topic;
use App\Models\Post;

use App\Models\Product;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('status', 1)
            ->paginate(8);
        $topics = Topic::where('status', 1)->get();
        $brands = Brand::where('status', 1)->get();
        $categories = Category::where('status', 1)->get();
        return view('frontend.post',compact('posts', 'categories','brands','topics'));
    }
    public function postsByTopic($topicId)
    {
        $categories = Category::where('status', 1)->get();
        $brands = Brand::where('status', 1)->get();
        $topic = Topic::findOrFail($topicId);
        $posts = Post::where('topic_id', $topicId)
            ->where('status', 1)
            ->paginate(12);
        $topics = Topic::where('status', 1)->get();
        return view('frontend.posts_by_topic', compact('posts', 'topics', 'topic', 'categories', 'brands'));
    }
    public function post_detail($id)
    {
        $post = Post::findOrFail($id);
        $topics = Topic::where('status', 1)->get();
        $brands = Brand::where('status', 1)->get();
        $categories = Category::where('status', 1)->get();
        $productsale = Product::where('id', '!=', $id)
            // ->whereNotNull('pricesale')
            ->where('status', 1)
            // ->take(4)
            ->get();
        $relatedPosts = Post::where('topic_id', $post->topic_id)
            ->where('status', 1)
            ->get();

        return view('frontend.post_detail', compact('post', 'productsale', 'categories', 'brands', 'topics', 'relatedPosts'));
    }    
    public function post_news()
    {
        $topics = Topic::where('status', 1)->get();
        $brands = Brand::where('status', 1)->get();
        $categories = Category::where('status', 1)->get();
        $latestPosts = Post::where('status', 1)
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();

        $featuredPosts = Post::where('status', 1)
            ->where('status', 1)
            ->orderBy('updated_at', 'desc')
            ->get();

        return view('frontend.post_news', compact('latestPosts', 'featuredPosts', 'categories', 'topics','brands'));
    }
}
