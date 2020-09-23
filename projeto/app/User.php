<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class User extends Authenticatable 
{
    use Notifiable;

    protected $table = 'users';
    
    protected $fillable = [
        'name', 'email', 'password','sexo',
    ];

    
    protected $hidden = [
        'password', 'remember_token',
    ];

   
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function sendEmailNotificationion($user){
        $activate_code = bcrypt(Str::random(15));
        $user->remember_token = $activate_code;
        $user->save();
        $viewData['full_name']=$user->name;
        $email_code = $user->remenber_token;
        $viewData['link']=asset('/verify_account?token=').$email_code;
        Mail::send('auth.email_verification',$viewData, function($m) use ($user){
            $m->from("imobiliaria@exemplo.com",'Ativação do usuario no sistema');
            $m->to($user->email, $user->name)->subject('Email de confirmação');
        });
    }
    
    public static function requestPasswordReset($email){
        self:: generatePasswordResetToken($email);
        return self:: sendPasswordResetEmail($email);
    }

    public static function generatePasswordResetToken($email){
        if(User::where('email',$email)->first()){
            DB::table('password_resets')->where('email',$email)->delete();
            DB::table('password_resets')->insert([
                'email'=>$email,
                'token'=>bcrypt(Str::random(15)),
                'created_at'=>Carbon::now(),
            ]);
        }
    }

    Public static function  sendPasswordResetEmail($email){
        $token = DB::table('password_resets')->where('email',$email)->first();

        if($token){
            $user = DB::table('users')->where('email',$email)->select('name','email')->first();
            $viewData['full_name']=$user->name;
            $viewData['link']=asset('/reset_password?token=').$token->token;
            Mail::send('auth.forgot_password',$viewData, function($m) use ($user){
                $m->from("imobiliaria@exemplo.com",'Ativação do usuario no sistema');
                $m->to($user->email, $user->name)->subject('Recupera senha de acesso!');
        });
            return true;
        }
        return false;
    }
}

