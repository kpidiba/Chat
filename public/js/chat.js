const form = document.querySelector('.typing-area'),
inputField = form.querySelector(".input-field"),
sendBtn = form.querySelector("button");
chatBox = document.querySelector('.chat-box');


form.onsubmit = (e)=>{
    e.preventDefault();
}

var URL = window.location.href;

sendBtn.onclick = ()=>{
    //commencons Ajax
    let xhr = new XMLHttpRequest();
    xhr.open("POST","/chat/{{ $friend[0]->idUser }}",true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            //vider le input apres l' envoie du message
            inputField.value = "";
        }
    }
    //pour envoyer les donnees du formulaire via ajax a php
    let formData = new FormData(form);//creation d 'un nouveau formulaire
    xhr.send(formData);
}

setInterval(()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST","/getChat",true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            let data = xhr.response;
            chatBox.innerHTML=data;    
        }
    }
    let formData = new FormData(form);//creation d 'un nouveau formulaire
    xhr.send(formData);
},700);
