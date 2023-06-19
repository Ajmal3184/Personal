function Keycheck(event){
    if(event.which==13){
        setInterval(openPopup,100)
    }
    
   
}
let popup = document.getElementById("popup");

function openPopup(){
    popup.classList.add("open-popup");
}
function closePopup(){
    popup.classList.remove("open-popup");
}
