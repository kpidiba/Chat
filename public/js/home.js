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
var prop = document.querySelectorAll(".zll.prop");
var all = document.querySelectorAll(".zll");
var unread = document.querySelectorAll(".zll.unread");

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
                item.style.display = "initial";
            })
        }else if(litabvalue == "unread"){
            unread.forEach(item=>{
                item.style.display = "initial";
            })
        }

    })
})


// faire la liste
listp = document.querySelector("#listp");
listv = document.querySelector("#listv");
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

    //partie liste des proposition
    let xha = new XMLHttpRequest();
    xha.open("GET","/propo",true);
    xha.onload = ()=>{
        if(xha.readyState === XMLHttpRequest.DONE){            
            if( xha.status === 200 ){
                let data = xha.response;
                listp.innerHTML=data;
            }
        }
    }
    xha.send();

    //partie liste des invitations
    let xhb = new XMLHttpRequest();
    xhb.open("GET","/inv",true);
    xhb.onload = ()=>{
        if(xhb.readyState === XMLHttpRequest.DONE){            
            if( xhb.status === 200 ){
                let data = xhb.response;
                listv.innerHTML=data;
            }
        }
    }
    xhb.send();

},1000);

