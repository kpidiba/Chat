var lib_tabs = document.querySelectorAll(".tab_content ul li");
var prop = document.querySelectorAll(".zll.prop");
var all = document.querySelectorAll(".zll");
var unread = document.querySelectorAll(".zll.unread");

// liste les propositions et invitations (envoye ou recu)
listp = document.querySelector("#listp .grid");
listve = document.querySelector("#un");
listvr = document.querySelector("#deux");


//affichage du profile de l' utilisateur
document.querySelector(".chat_profile").addEventListener("mouseover",function(){
    document.querySelector(".menu").style.display="flex";
})

document.querySelector("body").addEventListener("click",function(){
    document.querySelector(".menu").style.display="none";
})

//permet de switcher entre invitations et propositions
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

            //partie liste des invitations envoyees
            let xhb = new XMLHttpRequest();
            xhb.open("GET","/inve",true);
            xhb.onload = ()=>{
                if(xhb.readyState === XMLHttpRequest.DONE){            
                    if( xhb.status === 200 ){
                        let data = xhb.response;
                        listve.innerHTML=data;
                    }
                }
            }
            xhb.send();

            //partie des invitations recues
            let xhc = new XMLHttpRequest();
            xhc.open("GET","/invr",true);
            xhc.onload = ()=>{
                if(xhc.readyState === XMLHttpRequest.DONE){            
                    if( xhc.status === 200 ){
                        let data = xhc.response;
                        listvr.innerHTML=data;
                    }
                }
            }
            xhc.send();
            
        }

    })
})

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

