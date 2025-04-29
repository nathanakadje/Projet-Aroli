<?php

namespace App\Http\Controllers;

use App\Models\admins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Rules\ValidName;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Mail\ResetPasswordMail;

class UserController extends Controller
{

    public function form_login()
    {
        return  view('login');
    }
    public function form_register()
    {
        return  view('register');
    }
    // ***********************Traitement des donnees de la page register*****************************
    public function form_traitement(Request $request)
    {
         $request->validate([
            'name' => ['required', 'max:11', new ValidName],
            'email' => 'email|required|unique:admins',
            'password' => [
        'required',
        'min:8',
        'regex:/^(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\W_]).+$/',
    ],
         ]);
         $messages = [

             'name.required' => 'Le nom est obligatoire',
             'email.required' => 'L\'email est obligatoire',
             'email.unique' => 'L\'email saisie exite déjà',
             'email.email' => 'Format d\'email invalide',
            'password.required' => 'le password est  obligatoire',
            'password.min' => 'Saisie au moins huit caractère',
            'password.regex' => 'Le mot de passe doit contenir au moins un caractère spécial.',

         ];
         try {
            $validator = Validator::make($request->all(), $messages);

            $verificationToken = Str::random(64);
            $user = new admins();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->token = $verificationToken;
            $user->save();
            
            return redirect('/dashboard');
         } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Une erreur est survenue lors de la création',
                'error' => $e->getMessage()
            ], 500);
        }
        
    }

// ***********************Traitement des donnees de la page login*****************************
    public function login_form(Request $request)
    {
        $request->validate([
            'email' => 'email|required',
            'password' => 'required|min:8'
        ]);
        $user = admins::where('email', $request->input('email'))->first();
        // *********************compare le password entrer à celui de la bd*****************
        if($user)
        {
            if($user && Hash::check($request->input('password'), $user->password)){

                $request->session()->put('admins', $user);
                return redirect('/dashboard');

            }else{
                return back()->with('status', 'Identifiant ou mot de passe incorrect');
            }

        }else{
            return back()->with('status', 'désole vous n\'avez pas de compte client.');
        }
    }
// ----------------------------------------------------Reset password---------------------------------
public function showForgotPasswordForm()
{
    return view('forgot-password');
}

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:admins,email',
        ], [
            'email.required' => 'L\'email est obligatoire',
            'email.email' => 'Format d\'email invalide',
            'email.exists' => 'Cet email n\'existe pas dans notre base de données',
        ]);

        $token = Str::random(64);

        // Met à jour ou insère le token pour éviter l'erreur SQL
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $request->email],
            [
                'token' => $token,
                'created_at' => Carbon::now()
            ]
        );

        Mail::send('emails.forgot-password', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Réinitialisation de mot de passe');
        });

        return back()->with('status', 'Nous vous avons envoyé un email de réinitialisation de mot de passe!');
    }

    public function showResetForm($token)
    {
        return view('reset-password', ['token' => $token]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:admins,email',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required',
            'token' => 'required'
        ]);

        $updatePassword = DB::table('password_reset_tokens')
            ->where([
                'email' => $request->email,
                'token' => $request->token
            ])->first();

        if(!$updatePassword){
            return back()->withInput()->with('error', 'Token invalide!');
        }

        admins::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_reset_tokens')->where(['email'=> $request->email])->delete();

        return redirect('/login')->with('status', 'Votre mot de passe a été modifié!');
    }
}