<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\App;

class LoginController extends Controller
{
    /*
 |--------------------------------------------------------------------------
 | Login Controller
 |--------------------------------------------------------------------------
 |
 | This controller handles authenticating users for the application and
 | redirecting them to your home screen. The controller uses a trait
 | to conveniently provide its functionality to your applications.
 |
 */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
            if (auth()->user()->is_admin == 1) {
                $name = $request->input('email');
                $id = auth()->user()->id;
                $user = User::find($id);
                $posts = Post::where('user_id', $id)->get();
                // $posts=$user->posts;
                return view('adminHome', ['posts' => $posts]);
            } else {
                $id = auth()->user()->id;
                $user = User::find($id);
                $posts = Post::where('user_id', $id)->get();
                // $posts=$user->posts;

                return view('home', ['posts' => $posts]);
            }
        } else {
            return redirect()->route('login')
                ->with('error', 'Email-Address And Password Are Wrong.');
        }

    }

    public function showbyuser()
    {
        $id = auth()->user()->id;
        $posts=Post::where('user_id', 5)->get();

        return redirect('home')->with('posts',$posts);
    }
}
