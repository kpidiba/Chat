<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Crypt;
use Session;

class UserController extends Controller
{
    public function login(){
        return view('page-login');
    }

    public function register(){
        return view('page-register');
    }

    public function file(){
        return view('file');
    }
    public function store(Request $request){
        
        // //recuperation des donnees des differents champs
        // $data = $request->input();

        // //verifier si le nom existe deja
        // $emailver = DB::table('utilisateurs')
        // ->where('email', $data['email'])
        // ->get();
        // if( !count($emailver)== 0 ){
        //     return redirect()->route('user.register')
        //     ->withInput()
        //     ->with('failed connection',"Change Your E-MAIL");
        // }
        
        // //Si les champs obligatoires sont remplis
        // $rules = [
        //     'nom' => 'required',
        //     'prenom' =>'required',
        //     'date' => 'required',
        //     'email' => 'required',
        //     'password' => 'required',
        // ];
        // $validator = Validator::make($request->all(),$rules);
        // if ($validator->fails()) {
        //     return redirect()->route('user.register')
        //     ->withInput()
        //     ->with('failed',"Remplissez les champs");
        // }

        // //Entrez des donnees de l'utilisateur
        // $pass = Crypt::encrypt($data['password']);
        //     $data['file']="user.png";

        // try{
            
        //     DB::table('utilisateurs')->insert([
        //         'nom' => $data['nom'],
        //         'prenom' => $data['prenom'],
        //         'dnais' => $data['date'],
        //         'image' => $data['file'],
        //         'password' => $pass,
        //         'email'  => $data['email'],
        //         'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
        //         'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
        //     ]);
        //     $request->session()->put('email',$data['email']);
        //     return redirect()->route('user.home');
        // }
        // catch(Exception $e){
        //     return redirect()->route('user.register')->with('failed',"operation failed");
        // }

    }      

    public function connect(Request $request){
        //Verification des donnees de tous les champs
        $rules =[
            'email' => 'required',
            'password' => 'required',
        ];
        
        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {
			return redirect()->route('user.login')
			->withInput()
			->with('failed',"Remplissez les champs");
		}

        // Verification de l'existence de l 'utilisateur
        $data = $request->input();
        $users = DB::table('utilisateurs')
        ->where('email', $data['email'])
        ->get();

    // Verification du mot de passe
        if ( count($users) != 0 ){
            $a =  Crypt::decrypt($users[0]->password);
        }else{
            return redirect()->route('user.login')
            ->withInput()
            ->with('failed',"ce compte n'existe pas");
        }
        
        //verifier si le mot de passe correspond
        if($a != $data['password']){
            return redirect()->route('user.login')
            ->withInput()
            ->with('failed',"mot de passe Incorrect");
        }
        
        $request->session()->put('email',$data['email']);

        DB::table('utilisateurs')
        ->where('email', $data['email'])
        ->update([
            'status' => 1,
            'last_login' => \Carbon\Carbon::now()->toDateTimeString(),
        ]);
        return redirect()->route('user.home');
            
    }

    public function home(){
        return view('homes');
    }

    public function chat(){
        return view('chat');
    }

    public function disconnect(){
        $a=Session::get('email');
        Session::forget('email');
        DB::table('utilisateurs')
        ->where('email', $a)
        ->update([
            'status' => 0,
            'last_login' => \Carbon\Carbon::now()->toDateTimeString(),
        ]);
        return redirect()->route('user.login');

    }
}
