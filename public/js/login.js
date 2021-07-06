
//Partie Pour Afficher le mot de passe cacher
const pswrdField = document.querySelector("form .field input[type='password']"), 
toggleBtn = document.querySelector("form .field i");

toggleBtn.onclick = ()=>{
    if(pswrdField.type == "password"){
        pswrdField.type = "text";
        toggleBtn.classList.add("active");
    }else{
        pswrdField.type ="password";
        toggleBtn.classList.remove("active");

    }
}

//Partie pour soumettre le formulaire via ajax

const form = document.querySelector(".wrapper form"),
continueBtn = form.querySelector(".wrapper form input[type='submit']");
btnAlert = form.querySelector(".wrapper form .error-css");

form.onsubmit = (e)=>{
    e.preventDefault();
}

continueBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST","/",true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            let data = xhr.response;
            if( data == "success"){
                location.href="/home";
            }else{
                btnAlert.textContent =data;
                btnAlert.style.display="flex";
            }
        }
    }
    let formData = new FormData(form);

    xhr.send(formData)    
    };

