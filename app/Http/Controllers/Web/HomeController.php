<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\post;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $user = User::with('provider')->find(Auth::id());

        // paginate with 6 per page
        $posts = Post::with(['likes', 'comments', 'postmedia'])
            ->inRandomOrder()
            ->paginate(10);

        // check if AJAX request (for Load More button)
        if ($request->ajax()) {
            return view('web.home.partials.post_list', ['posts' => $posts])->render();
        }

        $latest_post = Post::with(['likes', 'comments', 'postmedia'])
            ->latest()->take(8)->get();

        return view('web.home.index', [
            'user' => $user,
            'posts' => $posts,
            'latest_post' => $latest_post
        ]);
    }



    public function user_profile(Request $request, $id)
    {
        $user = User::with('provider')->find($id);

        // Full same as index (likes + comments + postmedia) + pagination
        $posts = Post::with(['likes', 'comments', 'postmedia'])
            ->where('user_id', $id)
            ->latest()->get();

        // If ajax request (for Load More)
        if ($request->ajax()) {
            return view('web.home.partials.post_user', ['posts' => $posts])->render();
        }

        // Normal page load
        return view('web.home.user-profile', [
            'user' => $user,
            'posts' => $posts
        ]);
    }

}
