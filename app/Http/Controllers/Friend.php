<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use DB;
use Illuminate\Support\Facades\Crypt;
use Session;
use Illuminate\Http\Request;

class Friend extends Controller
{
    public function listPropo(){
        //pour la liste des propositions
        $propo = DB::table('utilisateurs')
        // ->where('utilisateurs.idUser', '!=', 'friends.idFriend')
        // ->where('utilisateurs.idUser', '!=', 'friends.idUser')
        ->join('invitations','utilisateurs.idUser','!=', 'invitations.idIrec')
        ->where('invitations.idIsend','=',3)
        // ->where('idUser','!=',session('id'))
        // ->select('utilisateurs.idUser','utilisateurs.nom', 'utilisateurs.prenom','utilisateurs.image')
        ->get();
        // dd($propo);

        foreach($propo as $value){
            $resultat=$value->nom.' '.$value->prenom;
            strlen($resultat) > 28 ? $msg = substr($resultat,0,22)."...":$msg = $resultat;
            echo '
                <div  class="all">
                        <div class="li_left">
                        <img src="IMAGE/'.$value->image.'" alt="friend image">
                    </div>
                    <div  class="li_right">
                        <div class="message">
                            <div  class="title">'.$msg.'</div>
                            <div class="time_status">
                                <a id="spacebtn" href="'.route('add').'/'.$value->idUser.'" type="button" class="btn btn-success">Inviter</a>
                            </div>
                        </div>
                    </div>            
                </div>';
        }
        
    }

    public function listInv(){
        // pour la liste des invitations envoyees
        $invS =DB::table('utilisateurs')
        ->join('invitations','utilisateurs.idUser','=', 'invitations.idIrec')
        ->where('invitations.idIsend','=',session('id'))
        ->get();
        dd($invS);

        //pour la liste des invitations recues
        $invR =DB::table('utilisateurs')
        ->where('utilisateurs.idUser', '=', 'invitations.idIrec')
        ->where('idUser','!=',session('id'))
        ->select('utilisateurs.nom', 'utilisateurs.prenom')
        ->get();
        // dd($invR);

        echo '
        <div  class="all">
            <div class="li_left">
                <img src="user.png" alt="friend image">
            </div>
            <div  class="li_right">
                <div class="message">
                    <div class="title">Alex John</div>
                    <a type="button" class="btn btn-success">Accepter</a>
                    <a type="button" class="btn btn-secondary">Refuser</a>
                    <div class="time">10M</div>
                </div>
            </div>
        </div>';
    }

    public function add($id){
        DB::table('invitations')->insert([
            'idIrec' => $id,
            'idIsend' => session('id'),
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
        ]);
        dd("ok");
    }
}
