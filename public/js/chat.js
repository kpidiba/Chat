const form = document.querySelector('.typing-area'),
inputField = form.querySelector(".input-field"),
sendBtn = form.querySelector("button");

send = document.querySelector(".button");

sendBtn.onclick = ()=>{
    //commencons Ajax
    let xhr = new XMLHttpRequest();
xhr.open("POST","/chat",true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            let data = xhr.response;
            if( data == "success"){
                location.href="{{}}";
            }else{
            // console.log(data);
            }
        }
    }
    //pour envoyer les donnees du formulaire via ajax a php
    let formData = new FormData(form);//creation d 'un nouveau formulaire
    xhr.send(formData);
}
