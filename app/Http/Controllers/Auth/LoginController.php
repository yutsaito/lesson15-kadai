<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    //protected $redirectTo = '/';
        //これはログイン「後」なので、welcomeでなく、tasklistのトップページになるように'tasks.show'とした→SorryCouldNotFind
        //ディベロッパーでみるとこれはこれでよさそうだが、ダブっているようにみえる
        //なぜかbodyの中に、よびたいhtmlの一式が入ってしまっている、入れ子になってる
        //ディベロッパーでみると「/」でよんでいるのはresoources/views/layout/のapp.blade.phpのよう、この@yieldがおかしい？
        //何かのなかでresoources/views/layout/のapp.blade.phpをよんでるようだ
 
    //protected $redirectTo = '/home';
    //protected $redirectTo = 'tasks.show';
    //protected $redirectTo = 'welcome';
    protected $redirectTo = '/';
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
