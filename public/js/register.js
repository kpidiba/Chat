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

form.onsubmit = (e)=>{
    e.preventDefault();
}


continueBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest(); 
    xhr.onreadystatechange = function(){
        if (xhr.readyState == 4 && xhr.status==200) {
            console.log(this.responseText);
        }
    }

    xhr.open("POST", "/register", true);
    xhr.setRequestHeader("Content-type", "application/x-www-formurlencoded");
    xhr.send("fname=Henry&lname=Ford");
    };

