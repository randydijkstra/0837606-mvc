<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;

use Session;

class PostController extends Controller
{

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

    public function create(Request $request){
      $request->user()->authorizeRoles(['player', 'admin']);

      $this->validate($request, [
       'title' => 'required',
       'message' => 'required'
      ]);

      $post = new Post;
      $post->title = $request->title;
      $post->message = $request->message;
      $post->user_id = $request->user()->id;
      $post->save();

      //store status message
      Session::flash('success_msg', 'Post posted successfully!');

      return redirect('/posts');
    }

    public function edit(){

      //   $validator = Validator::make($request->all(), [
      //     'title' => 'required|max:255',
      //     'message' => 'required',
      //   ]);
      //
      //   if ($validator->fails()) {
      //     return redirect('/')
      //       ->withInput()
      //       ->withErrors($validator);
      //   }
      //
      //   $post = new Post;
      //   $post->title = $request->title;
      //   $post->message = $request->message;
      //   $post->user_id = Auth::user()->id;
      //   $post->save();
      //
      //   return redirect('/posts');

    }

    public function delete(Request $request, $id){
      $request->user()->authorizeRoles(['player', 'admin']);

      $post = Post::findOrFail($id);

      if ($request->user()->id !== $post->user_id)
      {
        if (!$request->user()->hasRole('admin')) {
          return redirect()->route('home')->withError("Un-Authorise access");
        }
      }

      //update post data
      Post::find($id)->delete();

      //store status message
      Session::flash('delete_success_msg', 'Post deleted successfully!');

      return redirect()->route('user.posts', ['id' => $id]);
    }


    public function index(Request $request)
    {
      $request->user()->authorizeRoles(['player', 'admin']);

      $posts = Post::with('user')->where('active', true)->orderBy('created_at', 'DESC')->simplePaginate(10);

      return view('post/index', ['posts' => $posts]);
    }

    public function userPosts(Request $request){
      $request->user()->authorizeRoles(['player', 'admin']);

      $user = $request->user();
      $posts = $user->posts()->get();

      return view('/user/posts', ['posts' => $posts]);
    }

    public function postStatus(Request $request, $id){
      $request->user()->authorizeRoles(['player', 'admin']);

      $post = Post::findOrFail($id);

      if ($post->active == true) {
        $post->active = false;
        $post->save();
      }elseif($post->active == false){
        $post->active = true;
        $post->save();
      }

      return redirect()->route('user.posts', ['id' => $request->user()->id]);
    }

    /*
    public function someAdminStuff(Request $request)
    {
      $request->user()->authorizeRoles('manager');
      return view(‘some.view’);
    }
    */
}
