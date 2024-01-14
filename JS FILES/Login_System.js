

    document.getElementById("h3").onclick = function(){
        var styling = `
        background-Color: red;
        color:green;
    `;
        document.getElementById("h3").style.cssText = styling;
        document.getElementById("h33").removeAttribute("style");

}

    document.getElementById("h33").onclick = function(){
        var styling = `
        background-Color: red;
        color:green;
    `;
        document.getElementById("h33").style.cssText = styling;
        document.getElementById("h3").removeAttribute("style");


    }
