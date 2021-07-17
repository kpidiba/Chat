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
        ->join('invitations','utilisateurs.idUser','=', 'invitations.idIrec')
        ->where('invitations.idIsend','!=',session('id'))
        // ->orWhere(function($query)
        //     {
        //         $query->join('invitations','utilisateurs.idUser','=', 'invitations.idIsend')
        //         ->where('invitations.idIrec','!=',session('id'));
        //     })
        ->get();
        // dd($propo);

        foreach($propo as $value){
            $resultat=$value->nom.' '.$value->prenom;
            strlen($resultat) > 28 ? $msg = substr($resultat,0,22)."...":$msg = $resultat;
            $value->image='user.png'?$img="user.png":$img="IMAGE/'.$value->image.'";
            echo '
                <div  class="all">
                        <div class="li_left">
                        <img src="'.$img.'" alt="friend image">
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
        // dd($invS);

        //pour la liste des invitations recues
        $invR =DB::table('utilisateurs')
        ->join('invitations','utilisateurs.idUser','=', 'invitations.idIsend')
        ->where('invitations.idIrec','=',session('id'))
        ->get();
        // dd($invR);

        foreach($invS as $data){
            echo '
        <p class="inv-title">invitations envoyees</p>
        <div  class="all">
            <div class="li_left">
                <img src="user.png" alt="friend image">
            </div>
            <div  class="li_right">
                <div class="message">
                    <div class="title">Alex John</div>
                    <a type="button" class="btn btn-primary">Annuler</a>
                    <div class="time">10M</div>
                </div>
            </div>
        </div>';
        }

        foreach($invR as $data){
            echo'<p class="inv-title">invitations recues</p>
        <div  class="all">
            <div class="li_left">
                <img src="user.png" alt="friend image">
            </div>
            <div  class="li_right">
                <div class="message">
                    <div class="title">'.$data->nom.' '.$data->prenom.'</div>
                    <a type="button" class="btn btn-success">Accepter</a>
                    <a type="button" class="btn btn-secondary">Refuser</a>
                    <div class="time">10M</div>
                </div>
            </div>
        </div>
        ';
        }
        
        
        // echo '
        // <div  class="all">
        //     <div class="li_left">
        //         <img src="user.png" alt="friend image">
        //     </div>
        //     <div  class="li_right">
        //         <div class="message">
        //             <div class="title">Alex John</div>
        //             <a type="button" class="btn btn-success">Accepter</a>
        //             <a type="button" class="btn btn-secondary">Refuser</a>
        //             <div class="time">10M</div>
        //         </div>
        //     </div>
        // </div>';
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

    public function search(){
        $search = $_POST['search'];
        $output="";
        $sql = DB::table('utilisateurs')
        ->where('nom','like',"%$search%")
        ->orwhere('prenom','like',"%$search%")       
        ->get();
        if( count($sql) == 0 ){
            $output .="<p>Aucun utilisateur ne correspond a vos recherches</p>";
        }else if(count($sql)>0){
            foreach($sql as $user){
                
                //pour recuperer le dernier message
                $bobo = DB::table('messages')
                ->orderBy('msg_id', 'desc')
                ->where('receveir_id',$user->idUser)
                ->orwhere('sender_id',$user->idUser)
                ->Where(function($query)
                {
                    $query->where('receveir_id',session('id'))
                    ->orwhere('sender_id',session('id'));
                })
                ->first();

                if(empty($bobo->msg) && empty($bobo->sender_id)){
                    $resultat ="Aucun message pour l'instant hhh";
                }else{
                    $resultat =$bobo->msg;
                }
                
                // // pour limiter la taille du message
                strlen($resultat) > 28 ? $msg = substr($resultat,0,28)."...":$msg = $resultat;
                $ver = session('id');
                
                //pour a qui appartient le dernier message
                if( !empty($bobo->sender_id) && $ver == $bobo->sender_id ){
                    $you="TOI : ";
                }else{
                    $you="";
                }

                //verifier si l' utilisateur est connecte ou non
                $offline ="";
                if( $user->status == 0 ){
                    $offline ="offline";
                }
                //veririfer si l'image est egale a l'image par defaut
                if($user->image =="user.png"){
                    $image = "user.png";
                }else{
                    $image = "IMAGE/$user->image";
                }
                $output .='<a href="'.route('chat').'/'.$user->idUser.'">
                    <div class="content">
                        <img src="'.$image.'" >
                        <div class="details">
                            <span>'.$user->nom.'  '.$user->prenom.'</span>
                            <p>'.$you.''.$msg.'</p>
                        </div>
                    </div>
                    <div class="status-dot " ><i class="fa fa-circle '.$offline.'"></i></div>
                </a>';
            }

        }
        echo $output;
    }
}
