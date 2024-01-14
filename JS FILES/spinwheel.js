let container = document.querySelector(".container");
let btn = document.getElementById("spin");

btn.onclick = function () {
  // Check account balance
  let accountBalanceElement = document.getElementById("account-balance");
  let accountBalanceText = accountBalanceElement.textContent;
  let accountBalance = parseFloat(accountBalanceText.replace(/[^\d.-]/g, ""));
  console.log("Account Balance: " + accountBalance);

  if (accountBalance < 50) {
    alert("Sorry! Insufficient Funds");
    return;
  }

  let number = Math.ceil(Math.random() * 1000);
  container.style.transform = "rotate(" + number + "deg)";

  // Delay the winnings alert to allow for rotation animation
  setTimeout(function () {
    let winnings = determineWinnings(number);
    alert("Congratulations! You won Ksh. " + winnings);

    // Send won amount to the database
    if (winnings !== "Oops! Sorry, you lost.") {
      let xhr = new XMLHttpRequest();
      xhr.open("POST", "../PHP/Spin_insert.php", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
          console.log(xhr.responseText);
        }
      };
      xhr.send("winnings=" + encodeURIComponent(winnings));
    }
  }, 3000); // Adjust the delay as needed (in milliseconds)
};

function determineWinnings(rotationDegree) {
  // The rest of your code for determining the winnings
  // ...
}

function determineWinnings(rotationDegree) {
  const winningSections = [
    { start: 0, end: 45, winnings: 500, probability: 0 },
    { start: 46, end: 90, winnings: 100, probability: 10 },
    { start: 91, end: 135, winnings: 50, probability: 20 },
    { start: 136, end: 180, winnings: 10, probability: 40 },
    { start: 181, end: 225, winnings: 5, probability: 10 },
    { start: 226, end: 270, winnings: 1, probability: 20 },
  ];

  let totalProbability = 0;
  winningSections.forEach((section) => {
    totalProbability += section.probability;
  });

  let winningNumber = Math.random() * totalProbability;

  let accumulatedProbability = 0;
  let winningSection = winningSections.find((section) => {
    accumulatedProbability += section.probability;
    return winningNumber < accumulatedProbability;
  });

  if (winningSection) {
    return winningSection.winnings;
  } else {
    return "Oops! Sorry, you lost.";
  }
}
