const canvas = document.getElementById("pong");

const context = canvas.getContext("2d");


function  drawRect(x,y,w,h,color){
    context.fillStyle = color;
    context.fillRect(x,y,w,h);
}

function drawCircle(x,y,rad,color){
    
    context.fillStyle =color;
    context.beginPath();
    context.arc(x,y,rad,0,Math.PI,false);
    context.closePath();
    context.fill();
}


function drawText(text,x,y,color){
    context.fillStyle = color;
    context.font="35px fantasy";
    context.fillText(text,x,y);
}

let rectX=0;
function render(){
    drawRect(0,0,600,400,"black");
    drawRect(rectX,100,100,100,"red");
    rectX=rectX+100;
}

// setInterval(render,400);

// Partie pratique
drawCircle(200,200,50,"black");