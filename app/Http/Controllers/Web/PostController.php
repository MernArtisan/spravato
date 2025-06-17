<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\comments;
use App\Models\likes;
use Illuminate\Http\Request;
use App\Models\post;
use App\Models\postmedia;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'text' => 'nullable|string',
            'files.*' => 'nullable|file|mimes:jpeg,webp,png,jpg,mp4,mov,avi',
        ]);

        $post = post::create([
            'user_id' => auth()->id(),
            'content' => $request->text,
        ]);
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $mime = $file->getMimeType();

                if (str_starts_with($mime, 'image/')) {
                    $folder = 'uploads/content/images';
                    $type = 'image';
                } elseif (str_starts_with($mime, 'video/')) {
                    $folder = 'uploads/content/videos';
                    $type = 'video';
                } else {
                    continue; // skip unsupported types
                }

                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path($folder), $filename);

                $path = $folder . '/' . $filename;

                postmedia::create([
                    'post_id'   => $post->id,
                    'path'      => $path,
                    'type' => $type,
                ]);
            }
        }


        return response()->json(['message' => 'Post created successfully']);
    }

    public function likePost(Request $request)
    {
        $user = Auth::user();

        $postId = $request->post_id;

        $like = likes::where('user_id', $user->id)->where('post_id', $postId)->first();

        if ($like) {
            $like->delete();
            $liked = false;
        } else {
            likes::create([
                'user_id' => $user->id,
                'post_id' => $postId
            ]);
            $liked = true;
        }

        $likeCount = likes::where('post_id', $postId)->count();

        return response()->json([
            'liked' => $liked,
            'like_count' => $likeCount
        ]);
    }

    public function commentPost(Request $request)
    {
        $user = Auth::user();
        $postId = $request->post_id;
        $commentText = $request->comment_text;

        $comment = comments::create([
            'user_id' => $user->id,
            'post_id' => $postId,
            'comment_text' => $commentText
        ]);

        return response()->json([
            'user_name' => $user->first_name.''.$user->last_name, 
            'comment_text' => $comment->comment_text
        ]);
    }

    public function single_post($id)
{
    $post = Post::with(['user', 'likes', 'comments', 'postmedia'])
        ->where('id', $id)
        ->first();

    if (!$post) {
        abort(404, 'Post not found');
    }

    return view('web.home.single_post', compact('post'));
}



}
