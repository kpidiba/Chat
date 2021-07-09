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
        //recuperation des donnees des differents champs
        $data = $request->input();

        //verifier si l ' email existe
        $emailver = DB::table('utilisateurs')
        ->where('email', $data['email'])
        ->get();
        
        // verifier si le prenom existe deja
        $prenomver = DB::table('utilisateurs')
        ->where('prenom', $data['prenom'])
        ->get();
        
        //Si les champs obligatoires sont remplis
        $rules = [
            'nom' => 'required',
            'prenom' =>'required',
            'date' => 'required',
            'email' => 'required',
            'password' => 'required',
        ];
        $validator = Validator::make($request->all(),$rules);

        if(strlen($data['password'])<8){
            echo "Mot de passe doit contenir au moins 8 caracteres";
        }else if ($validator->fails()) {
            echo "Remplissez les champs";
        }else if(!filter_var($data['email'],FILTER_VALIDATE_EMAIL)){
            echo $data['email']." n' est pas un email valide";
        }else if( !count($prenomver) == 0 ){
            echo "Changez Votre Prenom";
        }else if( !count($emailver) == 0 ){
            echo "Changez Votre E-MAIL";
        }else{
            //Entrez des donnees de l'utilisateur
            $pass = Crypt::encrypt($data['password']);
            $data['file']="user.png";

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
                $request->session()->put('email',$data['email']);
                echo "success";
            }
            catch(Exception $e){
                echo "error with input";
            }
        }
    }      

    public function connect(Request $request){
        //recuperation de toutes les valeurs du formulaire
        $data = $request->input();
        //Verification des donnees de tous les champs
        $rules =[
            'email' => 'required',
            'password' => 'required',
        ];
        
        $validator = Validator::make($request->all(),$rules);

        //recuperation des donnees de tous les utilisateurs
        $users = DB::table('utilisateurs')
        ->where('email','!=',$data['email'])
        ->get();

        // Verification de l'existence de l 'utilisateur
        $user = DB::table('utilisateurs')
        ->where('email', $data['email'])
        ->get();

        // Verification du mot de passe
        if ($validator->fails()) {
            echo "Remplissez les champs";
        }else if ( count($user) != 0 ){
            //recuperation du mot de passe
            $a =  Crypt::decrypt($user[0]->password);

            //toutes les verifications
            
            if($a != $data['password']){
                echo "mot de passe Incorrect";
            }else if(!filter_var($data['email'],FILTER_VALIDATE_EMAIL)){
                echo $data['email']."n' est pas un email valide";
            }else{
                
                foreach($user as $h){
                    $request->session()->put('id',$h->idUser);
                }
                $request->session()->put('email',$data['email']);
                $request->session()->put('users',$users);
                //changer le status de l' utilisateur
                DB::table('utilisateurs')
                ->where('email', $data['email'])
                ->update([
                    'status' => 1,
                    'last_login' => \Carbon\Carbon::now()->toDateTimeString(),
                ]);
                echo "success";
            }

        }else{
            echo "ce compte n'existe pas";
        }            
    }

    public function home(){
        return view('homes');
    }

    public function chat($id){
        $user = DB::table('utilisateurs')
        ->where('idUser',$id)
        ->get();
        return view('chat',['friend'=>$user]);
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

    public function status(){
        // Partie pour selectionner les amis de l' utilisateur
        // $users=session('users');
        $email = session('email');
        $users = DB::table('utilisateurs')
        ->where('email','!=',$email)
        ->get();
        $output="";
        if(count($users)==0){
            $output .="Aucun Utilisateur n' est valable";
        }elseif(count($users) >0 ){
            foreach($users as $user){
            $output .='<a href="'.route('chat').'/'.$user->idUser.'">
                <div class="content">
                    <img src="'.$user->image.'" >
                    <div class="details">
                        <span>'.$user->nom.'  '.$user->prenom.'</span>
                        <p>Content of last message</p>
                    </div>
                </div>
                <div class="status-dot"><i class="fa fa-circle"></i></div>
            </a>';
            }
        }
        echo $output;
    }

    public function message(Request $request,$id){
        $data = $request->input();
        
        if(!empty($data['message'])){
            DB::table('messages')->insert([
                'sender_id' => $data['sender_id'],
                'receveir_id' => $data['receveir_id'],
                'msg' => $data['message'],
                'file' => 'NULL',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
            ]);
            echo "success"; 
        }else{
            echo "echec";
        }
        
    }

    public function gChat(Request $request){
        $data = $request->input();

            $output="";
            $value1= DB::table('messages')
            ->orderBy('msg_id', 'asc')
            ->where('receveir_id',$data['receveir_id'])
            ->where('sender_id',$data['sender_id'])
            ->orWhere(function($query)
            {
                $query->where('receveir_id',$_POST['sender_id'])
                        ->where('sender_id',$_POST['receveir_id']);
            })
            ->get();

            if( count($value1) > 0){
                // Partie pour les messages envoyes
                    foreach($value1 as $v){
                        if($v->sender_id == $_POST['sender_id'] ){
                            $output.='<div class="chat outgoing">
                                        <div class="details">
                                            <p>'.$v->msg.'</p>
                                        </div>
                                    </div>';
                        }else{
                            // partie pour les messafes recus
                            $output.='<div class="chat incoming">
                            <img src="../user.png" alt="">
                                <div class="details">
                                    <p>'.$v->msg.'</p>
                                </div>
                            </div>';
                        }

                    }
                
            }
            echo $output;
            

    }
}
