document.getElementById("button").addEventListener("click",function(){
    document.querySelector(".popup").style.display ="flex";
})

document.querySelector(".close").addEventListener("click",function(){
    document.querySelector(".popup").style.display="none";
})

document.querySelector(".chat_profile").addEventListener("mouseover",function(){
    document.querySelector(".menu").style.display="flex";
})

document.querySelector("body").addEventListener("click",function(){
    document.querySelector(".menu").style.display="none";
})

usersList = document.querySelector(".users-list");

setInterval(()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("GET","/status",true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            
            if(xhr.status === 200){
            let data = xhr.response;
            console.log(data);
            usersList.innerHTML=data;
            }
        }
    }
    xhr.send();
},700);
