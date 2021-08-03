const canvas = document.getElementById("pong");

const context = canvas.getContext("2d");

// dessin du filet
const net = {
    x : canvas.width/2 -1,
    y :0,
    width :2,
    height: 10,
    color: "WHITE"
}

const user = {
    x :0,
    y :canvas.height/2 - 100/2,
    width:10,
    height:100,
    color:"white",
    score:0
}


const com = {
    x :canvas.width -10,
    y :canvas.height/2 - 100/2,
    width:10,
    height:100,
    color:"white",
    score:0
}

//creation de la balle
const ball = {
    x:canvas.width/2,
    y:canvas.height/2,
    radius:12,
    speed:5,
    velocityX:5,
    velocityY:5,
    color:"White"
}

//dessiner un rectangle
function  drawRect(x,y,w,h,color){
    context.fillStyle = color;
    context.fillRect(x,y,w,h);
}

// drawRect(0,0,canvas.width,canvas.height,"black");

// partie pour le controle de raquette
canvas.addEventListener("mousemove",mousePaddle);

function mousePaddle(evt){
    let rect = canvas.getBoundingClientRect();

    user.y = evt.clientY -rect.top -user.height/2;
    if(user.y<0){
        user.y=0
    }else if(user.y>canvas.height){
        user.y = canvas.height;
    }
}

// detection de collision
function collision(ball,player){
    ball.top = ball.y-ball.radius;
    ball.bottom = ball.y + ball.radius;
    ball.left = ball.x - ball.radius;
    ball.right = ball.x + ball.radius;

    player.top = player.y;
    player.bottom = player.y + player.height;
    player.left = player.x;
    player.right = player.x + player.width;

    return ball.right > player.left && ball.bottom > player.top && ball.top < player.bottom && ball.left < player.right; 
}

// dessin du filet
function drawNet(){
    for(let i=0;i <= canvas.height;i+=15){
        drawRect(net.x,net.y+i,net.width,net.height,net.color);
    }
}
//dessiner un cercle
function drawCircle(x,y,rad,color){
    context.fillStyle =color;
    context.beginPath();
    context.arc(x,y,rad,0,Math.PI*2,false);
    context.closePath();
    context.fill();
}

// fonction de mis a jour du score et autre
function update(){

    // IA to controll to controll paddle com
    let computerLevel = 0.1;
    com.y += (ball.y-(com.y+com.height/2)) * computerLevel;
    if(com.y<0){
        com.y=0
    }

    ball.x += ball.velocityX;
    ball.y += ball.velocityY;

    if( ball.y + ball.radius >canvas.height || ball.y -ball.radius<0){
        ball.velocityY = - ball.velocityY;
    }
    let player = (ball.x < canvas.width/2)? user : com;


    if ( collision(ball,player)){
        
        let collpoint = ball.y -(player.y+player.height/2);
        
        // la direction quand la balle  est touche
        let direction = (ball.x<canvas.width/2)?1:-1;
        
        collpoint = collpoint/(player.height/2);
        let angleRad = collpoint* Math.PI/4;
        
        ball.velocityX = direction*(ball.speed * Math.cos(angleRad));
        ball.velocityY = ball.speed * Math.sin(angleRad);
        ball.speed +=0.1;
    }

}

//pour ecrire du texte
function drawText(text,x,y,color){
    context.fillStyle = color;
    context.font="35px fantasy";
    context.fillText(text,x,y);
}

function render(){   
    
    drawRect(0,0,canvas.width,canvas.height,"black");
    // dessiner le filer
    drawNet();

    // affichage du score
    drawText(user.score,canvas.width/4,canvas.height/5,"White");
    drawText(user.score,3*canvas.width/4,canvas.height/5,"White");

        // dessin des utilisateur
    drawRect(user.x,user.y,user.width,user.height,user.color);
    drawRect(com.x,com.y,com.width,com.height,com.color);

    drawCircle(ball.x,ball.y,ball.radius,ball.color);
}


// initialisation du jeu
function game(){
    render();
    update();
}

// boucle
const frameParSeconde = 50;
setInterval(game,1000/frameParSeconde);