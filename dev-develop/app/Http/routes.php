<?php

use Illuminate\Http\Request;
use Illuminate\Http\Redirect;
use Carbon\Carbon;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
Typeracer homepage that leads to sign-in page
*/
Route::get('/', function () {
    return view('welcome');
});

/*
Left for testing purposes
*/
Route::get('hello', 'indexController@sayHello');

/*
Takes user to homepage, which is sign-in page
*/
Route::get('home', function() {
	return view('homepage');
});

/*
Handles computations after a user has submitted a passage to be scored.
The following code will calculate WPM using the passage's metrics and unix
timestamps (from start and end time), as well as accuracy using a built-in
php function called "similar_text()" which returns the similarity between two strings 
a percent. This also redirects the user to a "cheater" page if the user
types faster than 212 WPM or if the user's accuracy is below 25%.
If the run is legitimate, the table containing run data is queried and a 
leaderboard for the particular passage is generated.
*/
Route::post('score', function(Request $request) {

	$after = Carbon::now()->timestamp;
	$total_time = $after - session()->get('start_time');

	$passage = session()->get('passage');
	$data = $request->all();
	$user_input = $data['input'];
	$passage_length = strlen($passage);
	$numWords = strlen($user_input) / 5;
	$WPM = round($numWords / ($total_time / 60));
	$accuracy = similar_text($passage, $user_input, $percent);
	$percent = round($percent);

	if ($accuracy < 25 || $WPM > 212) {
		return view('cheater');
	}
	else {
		session()->put('WPM', $WPM);
		session()->put('accuracy', $percent);
		DB::table('info')->insert(
    	['username' => session()->get('user'), 'wpm' => $WPM, 'accuracy' => $percent, 'passageName' => session()->get('name')]);
    	$leaderboard = DB::table('info')->where('passageName', session()->get('name'))->orderBy('wpm', 'desc')->get();
    	$count = count($leaderboard);
    	session()->put('leaderboard0', $leaderboard[0]);
    	session()->put('leaderboard1', $leaderboard[1]);
    	session()->put('leaderboard2', $leaderboard[2]);
    	session()->put('leaderboard3', $leaderboard[3]);
    	session()->put('leaderboard4', $leaderboard[4]);
    	session()->put('leaderboard5', $leaderboard[5]);
    	session()->put('leaderboard6', $leaderboard[6]);
    	session()->put('leaderboard7', $leaderboard[7]);
    	session()->put('leaderboard8', $leaderboard[8]);
    	session()->put('leaderboard9', $leaderboard[9]);
    	return view('score');
	}
});

/*
Ends the session variables "WPM" and "accuracy" for the given run, and queries the 
run data table for the user's best WPM and accuracy to be displayed on the user's 
profile
*/
Route::get('end_run', function() {
	Session::forget('WPM');
	Session::forget('accuracy');
	$user_wpm = (DB::table('info')->where('username', session()->get('user'))->orderBy('wpm', 'desc')->get());
	$user_acc = (DB::table('info')->where('username', session()->get('user'))->orderBy('accuracy', 'desc')->get());
	session()->put('user_wpm', $user_wpm[0]->wpm);
	session()->put('user_acc', $user_acc[0]->accuracy);
	return view('userInfo');
});

/*
Queries the passage table for passage name and content;
Uses Carbon::now() to generate the unix timestamp for the 
current time to be used as the run's start time
*/
Route::get('play', function(Request $request) {
  //FIXME
  $data = $request->all();
  $randomPassage = DB::table('passages')->inRandomOrder()->first();
  $goodPassage = $randomPassage->content;
  $goodName = $randomPassage->passageName;
  $now = Carbon::now()->timestamp;
  session()->put('start_time', $now);
  session()->put('passage', $goodPassage);
  session()->put('name', $goodName);
  return view('play');
});

/*
Route to view the current user's profile (i.e. the user logged in)
*/
Route::get('user', function() {
	return view('userInfo');
});

/*
Route to the passage submission page
*/
Route::get('passage_submit', function() {
	return view('passage_submit');
});

/*
Increments the "commend" field of a given user's entry in the user table
*/
Route::post('commendUser', function(Request $request) {
    $data = $request->all();
    $username = $request->session()->get('user2');
    $query=DB::table('users')->where('username', '=', $username);
    $query->increment('commend');
    return view('userInfo');
});

/*
Inserts a new entry into the users table containing a username and
a hashed password as well as a biography and a link to a profile picture
*/
Route::post('new_user', function(Request $request) {
	$data = $request->all();
	if (DB::table('users')->where('username', '=', $data['username'])->get()){
  		return view('error');
	}
	$hashed_password = Hash::make($data['password']);
    DB::table('users')->insert(
    	['username' => $data['username'], 'password' => $hashed_password, 'bio' => $data['bio'], 'picLink' => $data['picLink']]
    );
    return view('homepage');
});

/*
Trims leading and trailing whitespace of a sent passage; adds
ten "OPEN" entries to the run info table in order to make leaderboard
displaying easier. Inserts the new passage into the passage table.
*/
Route::post('submitter', function(Request $request) {
	$data = $request->all();
  	$passageNameNoSpaces = trim($data['passageName']);
  	$passageContentNoSpaces = trim($data['passage']);
  	if (DB::table('passages')->where('passageName', '=', $passageNameNoSpaces)->get()){
    	return view('error');
  	}
    for ($i = 0; $i < 10; $i++){
        DB::table('info')->insert(
          ['username' => 'OPEN', 'wpm' => $i, 'accuracy' => 0,
           'passageName' => $passageNameNoSpaces]
         );
    }
	DB::table('passages')->insert(
    	['passageName' => $passageNameNoSpaces, 'content' =>   $passageContentNoSpaces]
    );
    return view('userInfo');
});

/*
Cleans all passage names of vulgarity.
*/
Route::post('purge', function(Request $request) {
	$data = $request->all();
	DB::table('passages')->where('passageName','fuck')->delete();
	DB::table('passages')->where('passageName','shit')->delete();
	DB::table('passages')->where('passageName','bitch')->delete();
	DB::table('passages')->where('passageName','Fuck')->delete();
	DB::table('passages')->where('passageName','Shit')->delete();
	DB::table('passages')->where('passageName','Bitch')->delete();
	return view('userInfo');
});

/*
Logs the user in; creates session variables for various user info to be displayed on the
user's homepage
*/
Route::post('login', function(Request $request) {
	$data = $request->all();
	$password = DB::select('select password from users where username = ' . "'" . $data['username'] . "'");

	if (!$password) {
		return view('error');
	}
	else {
	 	if (Hash::check($data['password'], $password[0]->password)){
	 		session()->put('user', $data['username']);
	 		$bio = DB::select('select bio from users where username = ' . "'" . $data['username'] . "'");
	 		session()->put('bio', $bio[0]->bio);
	 		$propic = DB::select('select picLink from users where username = ' . "'" . $data['username'] . "'");
	 		session()->put('propic', $propic[0]->picLink);
	 		$user_wpm = (DB::table('info')->where('username', session()->get('user'))->orderBy('wpm', 'desc')->get());
	 		$user_acc = (DB::table('info')->where('username', session()->get('user'))->orderBy('accuracy', 'desc')->get());
	 		if (count($user_wpm) < 1) {
	 			$user_wpm = 0;
	 			$user_acc = 0;
	 			session()->put('user_wpm', $user_wpm);
	 			session()->put('user_acc', $user_acc);
	 		}
	 		else {
	 			session()->put('user_wpm', $user_wpm[0]->wpm);
	 			session()->put('user_acc', $user_acc[0]->accuracy);
	 		}
    		$commend = DB::select('select commend from users where username = ' . "'" . $data['username'] . "'");
        	session()->put('commend', $commend[0]->commend);
	 		return view('userInfo');
		}
	 	else {
	 		return view('error');
	 	}
	}
});

/*
Creates session variables for another user's profile
*/
Route::post('viewOther', function(Request $request) {
  $data = $request->all();

  if (!(DB::table('users')->where('username', '=', $data['otherUser'])->get())){
    return view('error');
  }

  session()->put('user2', $data['otherUser']);
  $bio = DB::select('select bio from users where username = ' . "'" . $data['otherUser'] . "'");
  session()->put('bio2', $bio[0]->bio);
  $propic = DB::select('select picLink from users where username = ' . "'" . $data['otherUser'] . "'");
  session()->put('propic2', $propic[0]->picLink);
  $commend = DB::select('select commend from users where username = ' . "'" . $data['otherUser'] . "'");
  session()->put('commend2', $commend[0]->commend);
  $user_wpm = (DB::table('info')->where('username', session()->get('user2'))->orderBy('wpm', 'desc')->get());
  $user_acc = (DB::table('info')->where('username', session()->get('user2'))->orderBy('accuracy', 'desc')->get());
  if (count($user_wpm) < 1) {
    $user_wpm = 0;
    $user_acc = 0;
    session()->put('user_wpm2', $user_wpm);
    session()->put('user_acc2', $user_acc);
  }
  else {
    session()->put('user_wpm2', $user_wpm[0]->wpm);
    session()->put('user_acc2', $user_acc[0]->accuracy);
  }
  return view('otherInfo');
});

/*
Forgets all session variables; logs user out
*/
Route::post('logout', function() {
	Session::forget('');
	return view('homepage');
});

/*
Forgets the session variables from another user's profile;
Brings the current user home
*/
Route::post('return', function() {
	Session::forget('user2');
  	Session::forget('bio2');
	return view('userInfo');
});

/*
Brings the user to a page that allows him/her to sign up for an account
*/
Route::get('signup', function() {
	return view('signup');
});
