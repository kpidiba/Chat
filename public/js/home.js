
//affichage du profile de l' utilisateur
document.querySelector(".chat_profile").addEventListener("mouseover",function(){
    document.querySelector(".menu").style.display="flex";
})

document.querySelector("body").addEventListener("click",function(){
    document.querySelector(".menu").style.display="none";
})

//partie pour la recherche
const searchBar = document.querySelector(".bod .wrapper .search-input input");

searchBar.onkeyup = () =>{
    let searchTerm = searchBar.value;
    if(searchTerm != ""){
        searchBar.classList.add("active");
    }else{
        searchBar.classList.remove('active');
    }
    let xhr = new XMLHttpRequest();
    xhr.open("POST","/search",true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            
            if(xhr.status === 200){
                let data = xhr.response;
                usersList.innerHTML=data;
            }
        }
    }
    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhr.send("search="+searchTerm);
}


// faire la liste des amis
usersList = document.querySelector(".users-list");

setInterval(()=>{
    //partie liste des utilisateurs
    let xhr = new XMLHttpRequest();
    xhr.open("GET","/status",true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            
            if(xhr.status === 200){
                let data = xhr.response;
                if(!searchBar.classList.contains("active")){
                    usersList.innerHTML=data;
                }
            }
        }
    }
    xhr.send();

},1000);