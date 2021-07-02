<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    public function login(){
        return view('page-login');
    }

    public function register(){
        return view('page-register');
    }

    public function store(Request $request){
        
        //recuperation des donnees des differents champs
        $data = $request->input();

        //verifier si le nom existe deja
        $emailver = DB::table('utilisateurs')
        ->where('email', $data['email'])
        ->get();
        if( !count($emailver)== 0 ){
            return redirect()->route('user.register')
            ->withInput()
            ->with('failed connection',"Change Your E-MAIL");
        }
        
        //Si les champs obligatoires sont remplis
        $rules = [
            'nom' => 'required',
            'prenom' =>'required',
            'date' => 'required',
            'email' => 'required',
            'password' => 'required',
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return redirect()->route('user.register')
            ->withInput()
            ->with('failed',"Remplissez les champs");
        }

        //Entrez des donnees de l'utilisateur
        $pass = Crypt::encrypt($data['password']);
        try{
            
            DB::table('utilisateurs')->insert([
                'nom' => $data['nom'],
                'prenom' => $data['prenom'],
                'dnais' => $data['date'],
                'image' => $data['file'],
                'password' => $pass,
                'email'  => $data['email'],
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
            ]);
            return redirect()->route('user.login')->with('status',"Insert successfully");
        }
        catch(Exception $e){
            return redirect()->route('user.register')->with('failed',"operation failed");
        }
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
            
            if($a != $data['password']){
                return redirect()->route('admin.login')
                ->withInput()
                ->with('failed',"mot de passe Incorrect");
            }else{
                
                //utilisation de la session
                $request->session()->put('email',$data['email']);
                $request->session()->put('password',$data['password']);
                return redirect()->route('user.home');
            }
    }

    public function home(){
        dd("baby");
        dd ('home');
    }
}
