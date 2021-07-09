@extends('layouts.head')

@section('title')
    Parametre de l' utilisateur
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-2">
        </div>
    <div class="col-sm-8" style="margin-top:40px;">
    <form action="" method="post" enctype="multipart/form-data">
        <table class="table table-bordered table-hover">
            <tr align="center">
                <td colspan="6" class="active"><h2>VOTRE COMPTE</h2></td>
            </tr>
            <tr>
                <td style="font-weight: bold;" style="margin-right: 100px">NOM</td>
                <td>
                    <input type="text" name="username" class="form-control" readonly value="">
                </td>
            </tr>
            <tr>
                <td style="font-weight: bold;"style="margin-right: 100px">PRENOM</td>
                <td>
                    <input type="text" name="username" class="form-control" readonly value="">
                </td>
            </tr>
            <tr>
                <td style="font-weight: bold;" style="margin-right: 100px">E-MAIL</td>
                <td>
                    <input type="text" name="username" class="form-control" readonly value="">
                </td>
            </tr>
            <tr>
                <td style="font-weight: bold;" style="margin-right: 100px">IMAGE DE PROFILE</td>
                <td>
                    <a href="{{ route('user.file') }}" class="btn btn-default" style="text-decoration: none;font-size:15px;color:blue;border:none">VISUALISER IMAGE ET/OU CHANGER</a>
                </td>
            </tr>
            <tr>
                <td style="font-weight: bold;" style="margin-right: 100px">CHANGER MOT DE PASSE</td>
                <td>
                    <a href="" class="btn btn-default" style="text-decoration: none;font-size:15px;color:blue;border:none">MIS A JOUR DU MOT DE PASSE</a>
                </td>
            </tr>
            <tr align="center">
                <td colspan="6" class="active">
                    <a href="{{ route('user.home') }}" class="btn btn-primary  btn-lg" style="padding-left: 40px;padding-right:40px" >Valider</a></td>
            </tr>
        </table>
    </form>
</div>
    </div>
@endsection