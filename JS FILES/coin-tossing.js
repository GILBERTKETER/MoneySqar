const coin = document.querySelector("#coin");
const button = document.querySelector("#flip");
const status = document.querySelector("#status");
const heads = document.querySelector("#headsCount");
const tails = document.querySelector("#tailsCount");
const coin_tossing_form = document.querySelector("#coin-toss");

let headsCount = 0;
let tailsCount = 0;

function deferFn(callback, ms) {
  setTimeout(callback, ms);
}

function processResult(result) {
  if (result === "heads") {
    headsCount++;
    heads.innerText = headsCount;
  } else {
    tailsCount++;
    tails.innerText = tailsCount;
  }
  status.innerText = result.toUpperCase();

  var xhr = new XMLHttpRequest();
  xhr.open("POST", "../PHP/coin-tossing_php.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      console.log(xhr.responseText);
    }
  };
  xhr.send("result=" + encodeURIComponent(result));
}

// function processResult(result) {
//    if (result === 'heads') {
//       headsCount++;
//       heads.innerText = headsCount;
//     } else {
//       tailsCount++;
//       tails.innerText = tailsCount;
//     }
//   status.innerText = result.toUpperCase();
//   //////////////////
//   var myVariable = result;

//   var form = document.createElement('form');
//   form.method = 'POST';
//   form.action = '../HTML FILES/coin-tossing.php';

//   var input = document.createElement('input');
//   input.type = 'hidden';
//   input.name = 'myVariable';
//   input.value = myVariable;

//   form.appendChild(input);
//   document.body.appendChild(form);

//   form.submit();

// }

function flipCoin(e) {
  e.preventDefault();
  coin.setAttribute("class", "");
  const random = Math.random();
  const result = random < 0.5 ? "heads" : "tails";
  coin.setAttribute("class", "animate-" + result);

  processResult(result);
}

coin_tossing_form.addEventListener("submit", flipCoin);

// function flipCoin(e) {
//   //console.log("hello");
//   e.preventDefault();
//   coin.setAttribute("class", "");
//   const random = Math.random();
//   const result = random < 0.5 ? "heads" : "tails";
//   deferFn(function () {
//     coin.setAttribute("class", "animate-" + result);
//     deferFn(function () {
//       processResult.bind(null, result);
//       coin_tossing_form.submit();
//     }, 2900);
//   }, 100);
// }

// button.addEventListener("click", flipCoin);
coin_tossing_form.addEventListener("submit", function (e) {
  e.preventDefault();

  const selectedOption = document.querySelector(
    'select[name="selectedOption"]'
  ).value;
  const result = status.innerText.toLowerCase();

  // Send the selected option and result to the server using AJAX
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "../PHP/coin-tossing.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      console.log(xhr.responseText);
    }
  };
  xhr.send(
    `selectedOption=${encodeURIComponent(
      selectedOption
    )}&result=${encodeURIComponent(result)}`
  );
});
