let divs = document.querySelectorAll(".note");

for(let i =0 ; i<divs.length ; i++){
    
   if(parseFloat(divs[i].textContent)<10){
    divs[i].setAttribute("style", "background-color:rgb(250, 187, 191); ");
}else{
    if(parseFloat(divs[i].textContent )== 10){
        divs[i].setAttribute("style", "background-color:rgb(250, 210, 173);");

    }else{
        divs[i].setAttribute("style", "background-color:rgb(193, 250, 202);");
    
    }
}
}
let moy=document.querySelectorAll(".moy");
for(let i =0 ; i<moy.length ; i++){
    moy[i].setAttribute("style", "background-color:rgb(190, 216, 245);");
}
let names=document.querySelectorAll(".names");
for(let i =0 ; i<names.length ; i++){
    names[i].setAttribute("style", "background-color:rgb(231, 237, 243);");
}