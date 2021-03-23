<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Utils\UserSession;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    public function sign( Request $request )
    {

        if ( empty($request->all() ) )  $errors = [
                'error' => false,
                'firstname'=>true,
                'lastname'=>true,
                'userexists'=>false,
                'email'=>true,
                'pwd1'=>true,
                'pwd2'=>true,
                'passwords'=>true
        ];
        else $errors = $request->all()['errors'];

        return view( 'sign', $errors );
    }



    public function signin( Request $request )
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $user = User::where('email', $email )->first();
        $password_matches = $user ? password_verify( $password, $user->password ) : false;

        if ( !empty($email) && !empty($password) && !empty($user) &&  $password_matches  ) {

            UserSession::connect( $user );
            return redirect()->route('account');
        }

        else {

            //return response()->json( ['user'=>($user && true ), 'password'=>$password_matches] ); //baduser & || badpass->message to front
            return redirect()->route('sign', ['errors' => [
                'error' => true,
                'firstname'=>true,
                'lastname'=>true,
                'userexists'=>false,
                'email'=>true,
                'pwd1'=>true,
                'pwd2'=>true,
                'passwords'=>true
            ]]);
        }

    }


    public function signup( Request $request )
    {

        extract( $request->all() );

        $firstname_ok = !empty($firstname);
        $lastname_ok = !empty($lastname);
        $email_ok = !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL);
        $pwd1_ok = !empty($password);
        $pwd2_ok = !empty($confirm_password);
        $passwords_matches = ( $password === $confirm_password );

        $user_exists = $email_ok && !empty( User::where('email', $email )->first() );

        if ( $firstname_ok && $lastname_ok && !$user_exists && $pwd1_ok && $pwd2_ok && $passwords_matches ) {

            $user = new User;
            $user->firstname = $firstname;
            $user->lastname = $lastname;
            $user->email = $email;
            $user->password = password_hash( $password, PASSWORD_DEFAULT );
            $user->status = 1;
            $user->save();

            UserSession::connect( $user );

            return redirect()->route('account');
        }

        // else return response()->json( [
        //     'user'=>$user_exists,
        //     'email'=>$email_ok,
        //     'pwd1'=>$pwd1_ok,
        //     'pwd2'=>$pwd2_ok,
        //     'passwords'=>$passwords_matches
        //     ] ); //->message to front   
        
            else return redirect()->route('sign', [ 'errors' =>  [
                'error' => false,
                'firstname'=>$firstname_ok,
                'lastname'=>$lastname_ok,
                'userexists'=>$user_exists,
                'email'=>$email_ok,
                'pwd1'=>$pwd1_ok,
                'pwd2'=>$pwd2_ok,
                'passwords'=>$passwords_matches
                ]] );
    }


    public function account() {


        if ( UserSession::isConnected() ) {
            
            $user = UserSession::getUser();
            $quizzes = $user->quizzes;

            return view(' account', [ 'user'=>$user, 'quizzes'=>$quizzes ]);
        }

        else return redirect()->route('sign');
    }


    public function logout() {

        UserSession::disconnect();

        return redirect()->route('home');
    }
}
