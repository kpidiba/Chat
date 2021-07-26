var lib_tabs = document.querySelectorAll(".tab_content ul li");
var prop = document.querySelectorAll(".zll.prop");
var all = document.querySelectorAll(".zll");
var unread = document.querySelectorAll(".zll.unread");


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
            setInterval(()=>{
                // alert("unread");
            },1000);
        }

    })
})

// liste les propositions et invitations (envoye ou recu)
listp = document.querySelector(".grid");

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


