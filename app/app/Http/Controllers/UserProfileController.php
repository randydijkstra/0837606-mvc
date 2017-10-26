<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;

class UserProfileController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function show(Request $request, $id){
    $request->user()->authorizeRoles(['player', 'admin']);

    $user = User::findOrFail($id);
    $userProfile = $user->profile;
    $posts = $user->posts->sortByDesc('created_at')->take(4);

    return view('profile/show')->with(
      array(
        'user'=>$user,
        'profile'=>$userProfile,
        'posts'=>$posts
      )
    );
  }

  public function edit(Request $request){
    $request->user()->authorizeRoles(['player', 'admin']);
    $current_user = $request->user();

    return view('profile/edit')->with(
      array(
        'user'=>$current_user
      )
    );
  }

  public function index(Request $request){
    $request->user()->authorizeRoles(['player', 'admin']);
    $users = User::select('id', 'firstname', 'lastname')->get();

    return view('profile/index', ['users' => $users]);
  }
}
