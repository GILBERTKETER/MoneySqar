
let menu = document.getElementById("user-contents-2");
let progress = document.getElementById("progress");
let refer = document.getElementById("user-contents-4");
let personal = document.getElementById("user-contents-5");


let cards = document.getElementById("user-cards");
let menu_bar = document.getElementById("menu-bar");
let graph = document.getElementById("graph-area");
let link = document.getElementById("referal-link");
let aside = document.getElementById("aside");
function display2() {
    


menu.addEventListener('click', () => {
    menu_bar.style.display = "block";
});

}

progress.addEventListener('click', () => {
    cards.style.opacity = 1;
})