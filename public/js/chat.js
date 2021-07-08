const form = document.querySelector('.typing-area'),
inputField = form.querySelector(".input-field"),
sendBtn = form.querySelector("button");

var URL = window.location.href;
sendBtn.onclick = ()=>{
    //commencons Ajax
    let xhr = new XMLHttpRequest();
xhr.open("POST","/chat/{{ $friend[0]->idUser }}",true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            let data = xhr.response;
            alert(data);
            if( data == "success"){
                location.href=URL;
            }else{
                alert("echec");
            }
        }
    }
    //pour envoyer les donnees du formulaire via ajax a php
    let formData = new FormData(form);//creation d 'un nouveau formulaire
    xhr.send(formData);
}
