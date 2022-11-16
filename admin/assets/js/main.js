const handBurger = document.querySelector("#handBurger");
const btnCloseHandBurger = document.querySelector("#btnCloseHandBurger");

if(handBurger){
    handBurger.addEventListener("click", function(){
        document.querySelector("aside").classList.add("showAside");
    });
}

if(btnCloseHandBurger){
    btnCloseHandBurger.addEventListener("click", function(){
        document.querySelector("aside").classList.remove("showAside");
    });
}