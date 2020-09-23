<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    public function registrar(Request $request)
    {   

        //dd($request->all());

        $request->validate([
              'name' => 'required|string|max:255',  
              'email' => 'required|string|email|max:100',
              'password'=>'required|string|min:8',
              'password_confirmation'=>'required|string|min:8|same:password',
              'sexo'=>'required',
        ]);
  
        $usuario = new User([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'sexo'=>$request['sexo'],
        ]);

        //$usuario = new User();
        //$usuario->name => $request->get('name');
    
       if( $usuario->save()){
           $usuario->sendEmailNotificationion($usuario);
           return redirect()->route('usuario.registrar')->with('sucess','Registro gravado com sucesso, verifique sua conta de email');
       }
        
        return redirect()->route('usuario.registrar')->with('fail','Falha na gravação do servido, contate seu servidor');

    }

    public function verify_account(Request $request){
        $usuario = User::where('remember_token',$request['token'])->first();
        if(isset($usuario)){
            $usuario->remember_token = null;
            $usuario->is_active = true;
            $usuario->email_verified_at = Carbon::now();
            $usuario->save();
            return redirect()->route('page.login')->with('sucess','Usuario registrado no sistema,faça seuu login');
        }
        return redirect()->route('page.login')->with('fail','Usuario já validado no sistema');
    }

    public function forgotPassword(Request $request){
        $validator = Validator::make($request->all(),[
            'email' => 'requerid|exists:user,email',
        ]);
        $usuario = User::where('email', $request->email)->first();
        if($usuario){
            $resposta = User::requestPasswordReset($usuario->email);
            if($resposta){
                return redirect()->route('page.login')->with('sucess','Confira sua caixa de email');
            }
        }
        return redirect()->route('page.login')->with('fail','Aconteceu um erro inesperado, contante seu administrador');
    }

    public function showResetPasswordPage(Request $request){
        $token = $request->token;
        return view('auth.reset_password')->with('token',$token);
    }

    public function resetPassword(Request $request){
        $request->validate([
            'password'=>'required|string|min:8',
            'password_confirmation'=>'required|string|min:8|same:password',
        ]);

        $tokenData = DB::table('password_resets')->where('token',$request->reset_token)->first();
        if(!$tokenData){
            return redirect()->route('page.login')->with('fail','Token inválido');
        }
        $usuario = User::where('email',$tokenData->email)->first();
        $usuario->password = bcrypt($request->password);
        $usuario->update();

        DB::table('password_resets')->where('email',$usuario->email)->delete();
        return redirect()->route('page.login')->with('sucess','senha alterada com sucesso');
    }

    public function index(){
        return view('auth.register');
    }

    Public function mailpage(){
        return view('auth.check_reset_email');
    }
   
    
}