<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;

class AdminController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function adminPosts(Request $request)
  {
    $this->checkIfAuthorized($request);

    $posts = Post::with('user')->orderBy('created_at', 'DESC')->simplePaginate(10);

    return view('admin/posts', ['posts' => $posts]);
  }

  public function adminUsers(Request $request)
  {
    $this->checkIfAuthorized($request);

    $users = User::select('id', 'firstname', 'lastname', 'email')
          ->withCount('posts')
          ->get();

    return view('admin/users', ['users' => $users]);
  }

  private function checkIfAuthorized(Request $request){
    $request->user()->authorizeRoles('admin');

    if (!$request->user()->hasRole('admin')){
//      return redirect()->route('home')->withError("Un-Authorise access");
      return redirect()->route('home');
    }
  }
}
