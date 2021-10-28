<?php

namespace App\Http\Controllers;

use App\Events\EditPost;
use App\Jobs\ProcessLog;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Post;
use App\PostLog;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role == 'admin') {
            $posts = Post::paginate(5);
        }
        else {
            $posts = Post::where('user_id', Auth::user()->id)->paginate(5);
        }
        return view('admin_post')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
        ]);

        $post = Post::create([
            'title' => $request['title'],
            'content' => $request['content'],
            'user_id' => Auth::user()->id,
            'user_name' => Auth::user()->name,
        ]);

        $postLog = new PostLog([
            'user_id' => Auth::user()->id,
            'post_id' => $post->id,
            'type' => 'create'
        ]);
        event(new EditPost($postLog));

        return redirect(route('post.index'))->with('success', 'Post is successfully saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('detail')->with('post', Post::findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        if($post->user_id == Auth::user()->id || Auth::user()->role == 'admin') {
            return view('edit_post')->with('post', $post);
        }
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
        ]);

        Post::whereId($id)->update([
            'title' => $request['title'],
            'content' => $request['content'],
        ]);

        $postLog = new PostLog([
            'user_id' => Auth::user()->id,
            'post_id' => $id,
            'type' => 'edit'
        ]);
        event(new EditPost($postLog));

        return redirect(route('post.index'))->with('success', 'Post is successfully saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        $postLog = new PostLog([
            'user_id' => Auth::user()->id,
            'post_id' => $id,
            'type' => 'delete'
        ]);
        event(new EditPost($postLog));

        return redirect(route('post.index'))->with('success', 'Show is successfully deleted');
    }
}
