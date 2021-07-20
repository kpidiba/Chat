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
