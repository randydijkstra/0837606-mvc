<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;

use Session;
use Validator;

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
    $posts = $user->posts->where('active', true)->sortByDesc('created_at')->take(4);

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

    $validator = Validator::make($request->all(), [
      'firstname' => 'required|max:255',
      'lastname' => 'required',
      'location' => 'required',
      'homefield' => 'required',
    ]);

    if ($validator->fails()) {
      return redirect('/')
        ->withInput()
        ->withErrors($validator);
    }

    $user = $request->user();

    $user->firstname = $request->firstname;
    $user->lastname = $request->lastname;
    $user->profile->location = $request->location;
    $user->profile->home_field = $request->homefield;
    $user->save();
    $user->profile->save();

    //store status message
    Session::flash('success_msg', 'Profile updated successfully!');

    return redirect('/profile/edit');
  }

  public function index(Request $request){
    $request->user()->authorizeRoles(['player', 'admin']);
    $users = User::select('id', 'firstname', 'lastname')->get();

    return view('profile/index', ['users' => $users]);
  }
}
