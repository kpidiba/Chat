const pswrdField = document.querySelector(".form .field input[type='password']"), 
toggleBtn = document.querySelector(".form .field i");

toggleBtn.onclick = ()=>{
    if(pswrdField.type == "password"){
        pswrdField.type = "text";
        toggleBtn.classList.add("active");
    }else{
        pswrdField.type ="password";
        toggleBtn.classList.remove("active");

    }
}


const form = document.querySelector(".signup form"),
continueBtn = form.querySelector(".form .field .button");
btnAlert = form.querySelector(".form .css-alert");

form.onsubmit = (e)=>{
    e.preventDefault();
}


continueBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST","/register",true);
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

