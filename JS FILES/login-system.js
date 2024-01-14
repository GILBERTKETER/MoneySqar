let signinnow = document.getElementById("signin");
let signupnow = document.getElementById("sign-up");
let signinmenu = document.getElementById("login");
let signupmenu = document.getElementById("main");
let welcomemenu = document.getElementById("home");

let loginnow = document.getElementById("logi");
let logitnow = document.getElementById("logit");

let form = document.getElementById("content");
form.addEventListener('submit', (e) => {
    e.preventDefault();
});

loginnow.addEventListener('click', () => {
    loginnow.style.display = "none";
    signinmenu.style.display = "block";
    signupmenu.style.display = "none";
});

logitnow.addEventListener('click', () => {
    logitnow.style.display = "none";
    signupmenu.style.display = "block";
    signinmenu.style.display = "none";
});



signupnow.addEventListener('click', () => {
    signupmenu.style.display = "block";
    welcomemenu.style.display = "none";
});

signinnow.addEventListener('click', () => {
    
    signinmenu.style.display = "block";
    welcomemenu.style.display = "none";

});


//input verification
let fname = document.getElementById("FirstName");
let lname = document.getElementById("LastName");
let username = document.getElementById("username");
let email = document.getElementById("email");
let pass = document.getElementById("password");
let cpass = document.getElementById("cpassword");

const userDetails = [fname, lname, username, email, pass, cpass];
userDetails.addEventListener('input', () => {
    let i = 0;
    if (userDetails[i].value.length == 0) {
        userDetails[i].style.border = "2px solid red";
    }
    else {
        userDetails[i].style.border = "2px solid green";

    }
});

let form3 = document.getElementById("form4");

form3.addEventListener('submit', (e) => {
    e.preventDefault();
});
 


////