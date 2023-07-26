const login = document.querySelector(".login-modal");
const signup = document.querySelector(".signup-modal");
const form = document.querySelector("#form");
const switchs = document.querySelectorAll(".switch");

let current = 1;

function tab2(){
    form.style.marginLeft = "-100%";
    login.style.background = "none";
    signup.style.background = "linear-gradient(45deg,#00d5fc,#046af6)";
    switchs[current - 1].classList.add("active");
}

function tab1(){
    form.style.marginLeft = "0";
    signup.style.background = "none";
    login.style.background = "linear-gradient(45deg,#00d5fc,#046af6)";
    switchs[current - 1].classList.remove("active");
}