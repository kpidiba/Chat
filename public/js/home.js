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

//dynamisation du popup
var lib_tabs = document.querySelectorAll(".tab_content ul li");
var prop = document.querySelectorAll(".all.prop");
var all = document.querySelectorAll(".all");
var unread = document.querySelectorAll(".all.unread");

unread.forEach(item=>{
    item.style.display = "none";
})

lib_tabs.forEach((tab)=>{
    tab.addEventListener("click",()=>{
        lib_tabs.forEach((tab)=>{
            tab.classList.remove("active");
        })

        tab.classList.add('active');
        var litabvalue = tab.getAttribute("data-li");
        
        all.forEach(item=>{
            item.style.display="none";
        })

        if(litabvalue == "prop"){
            prop.forEach(item=>{
                item.style.display = "flex";
            })
        }else if(litabvalue == "unread"){
            unread.forEach(item=>{
                item.style.display = "flex";
            })
        }

    })
})


// faire la liste
list = document.querySelector("#friends");
usersList = document.querySelector(".users-list");

setInterval(()=>{
    //partie liste des utilisateurs
    let xhr = new XMLHttpRequest();
    xhr.open("GET","/status",true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            
            if(xhr.status === 200){
                let data = xhr.response;
                usersList.innerHTML=data;
            }
        }
    }
    xhr.send();

    //partie liste des invitations
    let xha = new XMLHttpRequest();
    xha.open("GET","/propo",true);
    xha.onload = ()=>{
        if(xha.readyState === XMLHttpRequest.DONE){            
            if( xha.status === 200 ){
                let data = xha.response;
                list.innerHTML=data;
            }
        }
    }
    xha.send();

},1000);

