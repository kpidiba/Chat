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
    // let xhr = new XMLHttpRequest();
    // xhr.open("POST","http://localhost:8000/register",true);
    // xhr.onload = ()=>{
    //     alert(xhr.status);
    //     if(xhr.readyState === XMLHttpRequest.DONE){
    //         if(xhr.status === 200){
    //             let data = xhr.response;
    //             console.log(data);
    //         }
    //     }
    // }   
    // xhr.send();
    alert("bb");
    $.ajax({
        url: "/register",
        type:"POST",
        data: { testdata : 'testdatacontent' },
        success:function(data){
            alert(data);
        },error:function(){ 
            alert("error!!!!");
        }
    });
    
    
    };

