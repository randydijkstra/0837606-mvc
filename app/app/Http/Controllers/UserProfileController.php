<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\UserProfile;

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

  public function edit(Request $request, $id = null){
    $method = $request->method();

    if ($request->isMethod('get') && $id && $request->user()->hasRole('admin')) {
      $user = User::findOrFail($id);
      return view('/user/edit', ['user' => $user]);
    }

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

    if ($id) {
      $user = User::findOrFail($id);
    }else{
      $user = $request->user();
    }

    $user->firstname = $request->firstname;
    $user->lastname = $request->lastname;
    $user->profile->location = $request->location;
    $user->profile->home_field = $request->homefield;
    $user->save();
    $user->profile->save();

    //store status message
    Session::flash('success_msg', 'Profile updated successfully!');

    if ($id) {
      return redirect()->route('admin.users');
    }else{
      return redirect('/profile/edit');
    }
  }


  public function delete(Request $request, $id){
    $request->user()->authorizeRoles(['player', 'admin']);

    $user = Post::findOrFail($id);

    if ($request->user()->id !== $user->user_id)
    {
      if (!$request->user()->hasRole('admin')) {
        return redirect()->route('home')->withError("Un-Authorise access");
      }
    }

    //update post data
    User::find($id)->delete();

    //store status message
    Session::flash('delete_success_msg', 'User deleted successfully!');

    return redirect()->route('admin.users', ['id' => $id]);
  }


  public function index(Request $request){
    $request->user()->authorizeRoles(['player', 'admin']);

    if ($request->query('location')) {

      $location = $request->query('location');

      $users = User::select('id', 'firstname', 'lastname')->get();
    }else{
      $users = User::select('id', 'firstname', 'lastname')->get();
    }

    $users = User::select('id', 'firstname', 'lastname')->get();

    $locations = UserProfile::distinct('location')->pluck('location');


    return view('profile/index', ['users' => $users, 'locations' => $locations]);
  }
}
