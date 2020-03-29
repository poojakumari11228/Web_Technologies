var numSquares=6;
var colors=generateRandomColors(numSquares);

var easy=document.getElementById("easy");
var hard=document.getElementById("hard");
var squares=document.getElementsByClassName("square");
var colorPicked=pickColor();
var colorDisplay=document.getElementById("colorDisplay");
var messageDisplay=document.getElementById("message");
var h1=document.querySelector("h1");
var resetButton=document.getElementById("reset");

easy.addEventListener("click",function(){
   //remove selected class from hard add to easy buttom
   hard.classList.remove("selected");
   easy.classList.add("selected");

   //hide 3 lower squares
for(var i=3;i<6;i++){
    //add initial colors to squares
    squares[i].style.display="none"; 
}
numSquares=3;
   //generate new colors
colors=generateRandomColors(numSquares);
//pick new color
colorPicked=pickColor();
//change color display to picked color
colorDisplay.textContent=colorPicked;
//chenge color of squares
for(var i=0;i<squares.length;i++){
    //add initial colors to squares
    squares[i].style.backgroundColor=colors[i]; 
}
h1.style.background="steelblue";
});

hard.addEventListener("click",function(){
  //remove selected class from easy add to hard buttom
 easy.classList.remove("selected");
 hard.classList.add("selected");
   //Show 3 lower hidden squares
   for(var i=3;i<6;i++){
    //add initial colors to squares
    squares[i].style.display="block"; 
}
numSquares=6;
//generate new colors
colors=generateRandomColors(numSquares);
//pick new color
colorPicked=pickColor();
//change color display to picked color
colorDisplay.textContent=colorPicked;
//chenge color of squares
for(var i=0;i<squares.length;i++){
    //add initial colors to squares
    squares[i].style.backgroundColor=colors[i]; 
}
h1.style.background="steelblue";
});

resetButton.addEventListener("click",function(){
    messageDisplay.textContent=""; 
    this.textContent="New Colors";
//generate new colors
colors=generateRandomColors(numSquares);
//pick new color
colorPicked=pickColor();
//change color display to picked color
colorDisplay.textContent=colorPicked;
//chenge color of squares
for(var i=0;i<squares.length;i++){
    //add initial colors to squares
    squares[i].style.backgroundColor=colors[i]; 
}
h1.style.background="steelblue";
});

colorDisplay.textContent=colorPicked;

for(var i=0;i<squares.length;i++){
    //add initial colors to squares
    squares[i].style.backgroundColor=colors[i]; 
}
for(var i=0;i<squares.length;i++){
    //add events to squares
    squares[i].addEventListener("click",function(){
       var clickedColor=this.style.backgroundColor;
       if(clickedColor==colorPicked){  
           resetButton.textContent="Play Again!"
            //compare color clicked square to picked color
            messageDisplay.textContent="Correct!"
           changeColor(clickedColor);
                //change color of h1 to picked color
                h1.style.backgroundColor=colorPicked;
             }
        else{
            messageDisplay.textContent="Try again!"
            this.style.backgroundColor="black";
        }
    }); 
}

function changeColor(color){
    for(var i=0;i<squares.length;i++){
        //change all squares color to the picked color
        squares[i].style.backgroundColor=colorPicked; }  
}

function pickColor(){
    var randomcolor=colors[Math.floor(Math.random()*colors.length)];
    return randomcolor;
}

function generateRandomColors(num){
    var arr=[];
    //rdepeat num times
    for(var i=0;i<num;i++){
   //get random colors and push into arr
        arr.push(randomColor());
    }
    return arr;
}

function randomColor(){
    //make red color from 0-255
    var r=Math.floor(Math.random()*256);
    //make gree color from 0-255
    var g=Math.floor(Math.random()*256);
    //make blue color from 0-255
    var b=Math.floor(Math.random()*256);
    //return color as rgb string
    return "rgb("+r+", "+g+", "+b+")";
}
