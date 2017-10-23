<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function show(Request $request, $id){
      $request->user()->authorizeRoles(['player', 'admin']);

      $post = Post::findOrFail($id);
      $user = $post->user;

      return view('post/show')->with(
        array(
          'user'=>$user,
          'post'=>$post,
        )
      );
    }

    public function index(Request $request)
    {
      $request->user()->authorizeRoles(['player', 'admin']);

      $posts = Post::with('user')->get();

      return view('post/index', ['posts' => $posts]);
    }

    /*
    public function someAdminStuff(Request $request)
    {
      $request->user()->authorizeRoles('manager');
      return view(‘some.view’);
    }
    */
}
