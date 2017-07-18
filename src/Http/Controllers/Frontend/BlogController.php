<?php

namespace Canvas\Http\Controllers\Frontend;

use Auth;
use Canvas\Http\Controllers\Controller;
use Canvas\Jobs\BlogIndexData;
use Canvas\Models\Post;
use Canvas\Models\PostTag;
use Canvas\Models\Settings;
use Canvas\Models\Tag;
use Canvas\Models\User;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display the blog index page.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tag = $request->get('tag');
        $data = $this->dispatch(new BlogIndexData($tag));
        $layout = $tag ? Tag::layout($tag)->first() : config('blog.tag_layout');
        $socialHeaderIconsUser = User::where('id', Settings::socialHeaderIconsUserId())->first();
        $css = Settings::customCSS();
        $js = Settings::customJS();

        return view($layout, $data, compact('css', 'js', 'socialHeaderIconsUser'));
    }

    /**
     * Display a blog post page.
     *
     * @param $slug
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function showPost($slug, Request $request)
    {
        $post = Post::with('tags')->whereSlug($slug)->firstOrFail();
        $socialHeaderIconsUser = User::where('id', Settings::socialHeaderIconsUserId())->first();
        $user = User::where('id', $post->user_id)->firstOrFail();
        $tag = $request->get('tag');
        $title = $post->title;
        $css = Settings::customCSS();
        $js = Settings::customJS();

        if ($tag) {
            $tag = Tag::whereTag($tag)->firstOrFail();
        }

        if (!$post->is_published && !Auth::guard('canvas')->check()) {
            return redirect()->route('canvas.blog.post.index');
        }

        return view($post->layout, compact('post', 'tag', 'slug', 'title', 'user', 'css', 'js', 'socialHeaderIconsUser'));
    }

    /**
     *
     */
    public function tags(Request $request)
    {
        $layout = config('blog.tags_layout') ? config('blog.tags_layout') : 'canvas::frontend.blog.tags';
        $tags = PostTag::with('tags')
            ->selectRaw('tag_id,count(*) as num')
            ->groupBy('tag_id')
            ->orderBy('num', 'desc')
            ->get();
        return view($layout, ['tags' => $tags]);
    }

    public function archives(Request $request)
    {
        $layout = config('blog.archives_layout') ? config('blog.archives_layout') : 'canvas::frontend.blog.archives';
        // $tags = PostTag::with('tags')
        //     ->selectRaw('tag_id,count(*) as num')
        //     ->groupBy('tag_id')
        //     ->orderBy('num', 'desc')
        //     ->get();
        $data = $this->dispatch(new BlogIndexData(null));
        // dd($data);
        return view($layout, $data);
    }
}
