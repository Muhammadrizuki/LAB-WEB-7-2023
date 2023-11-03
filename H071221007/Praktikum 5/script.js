let botSums = 0;
let mySums = 0;
let botASCards = 0;
let myASCards = 0;
let currentBet = 0;
let cards;
let isCanHit = true;

const startGameButton = document.getElementById("btn-start-game");
const takeCardButton = document.getElementById("hit-button");
const holdCardsButton = document.getElementById("stand-button");

const mySumsElement = document.getElementsByClassName("my-sums")[0];
const myCardsElement = document.getElementsByClassName("my-cards")[0];
const myMoney = document.getElementById("my-money");
const inputMoney = document.getElementsByTagName("input")[0];

const botSumsElement = document.getElementsByClassName("bot-sums")[0];
const botCardsElement = document.getElementsByClassName("bot-cards")[0];

const resultDisplay = document.getElementById("result-display");
const resultImage = document.getElementById("result-image");
const resultMessage = document.getElementById("result-message");

window.onload = () => {
  buildUserCards();
  shuffleCards();
  takeCardButton.setAttribute("disabled", true);
  holdCardsButton.setAttribute("disabled", true);
};

function buildUserCards() {
  let cardTypes = ["H", "B", "S", "K"];
  let cardValues = [
    "A", "2", "3", "4", "5", "6", "7", "8", "9", "10", "K", "Q", "J",
  ];
  cards = [];

  for (let i = 0; i < cardTypes.length; i++) {
    for (let j = 0; j < cardValues.length; j++) {
      cards.push(cardValues[j] + "-" + cardTypes[i]);
    }
  }
}

function shuffleCards() {
  for (let i = 0; i < cards.length; i++) {
    let randomNum = Math.floor(Math.random() * cards.length);
    let temp = cards[i];
    cards[i] = cards[randomNum];
    cards[randomNum] = temp;
  }
}

startGameButton.addEventListener("click", function () {
  if (inputMoney.value === "") {
    alert("Masukkan Taruhan Terlebih Dahulu")
    return
  }
  if (startGameButton.textContent === "TRY AGAIN") {
    botSums = 0;
    mySums = 0;
    botASCards = 0;
    myASCards = 0;
    isCanHit = true;

    const allCardsImage = document.querySelectorAll("img");
    for (let i = 0; i < allCardsImage.length; i++) {
      allCardsImage[i].remove();
    }

    let cardImg = document.createElement("img");
    cardImg.src = "asets/cards/BACK.png";
    cardImg.style.height = "80px";
    cardImg.className = "hidden-card";
    botCardsElement.append(cardImg);

    buildUserCards();
    shuffleCards();
  }

  takeCardButton.disabled = false;
  holdCardsButton.disabled = false;
  startGameButton.textContent = "TRY AGAIN";
  startGameButton.setAttribute("disabled", true);

  for (let i = 0; i < 2; i++) {
    let cardImg = document.createElement("img");
    let card = cards.pop();
    cardImg.src = "asets/cards/" + card + ".png";
    cardImg.style.height = "80px";
    mySums += getValueOfCard(card);
    myASCards += checkASCard(card);
    mySumsElement.textContent = mySums;
    myCardsElement.append(cardImg);
  }
});

takeCardButton.addEventListener("click", function () {
  if (!isCanHit) return;

  let message = "";
  let cardImg = document.createElement("img");
  let card = cards.pop();
  cardImg.src = "asets/cards/" + card + ".png";
  cardImg.style.height = "80px";
  mySums += getValueOfCard(card);
  myASCards += checkASCard(card);
  mySumsElement.textContent = mySums;
  myCardsElement.append(cardImg);

  if (reduceASCardValue(mySums, myASCards) > 21) isCanHit = false;

  if (mySums > 21) {
    takeCardButton.disabled = true;
    holdCardsButton.disabled = true;
    startGameButton.disabled = false;
    message = "KALAH";
    myMoney.textContent -= inputMoney.value;
    displayResult(message);
  }
});

holdCardsButton.addEventListener("click", function () {
  setTimeout(() => {
    document.getElementsByClassName("hidden-card")[0].remove();
  }, 1000);

  const addBotCards = () => {
    setTimeout(() => {
      let cardImg = document.createElement("img");
      let card = cards.pop();
      cardImg.src = "asets/cards/" + card + ".png";
      cardImg.style.height = "80px";
      botSums += getValueOfCard(card);
      botASCards += checkASCard(card);
      botCardsElement.append(cardImg);
      botSumsElement.textContent = botSums;

      if (botSums < mySums) {
        addBotCards();
      } else {
        botSums = reduceASCardValue(botSums, botASCards);
        mySums = reduceASCardValue(mySums, myASCards);
        isCanHit = false;

        if (mySums > 21 || mySums % 22 < botSums % 22) {
          message = "KALAH";
          displayResult(message)
          myMoney.textContent -= inputMoney.value;
        } else if (botSums > 21 || mySums % 22 > botSums % 22) {
          message = "MENANG";
          displayResult(message)
          myMoney.textContent = parseInt (myMoney.textContent) + parseInt (inputMoney.value) * 2; // Tambahkan parseInt
        } else if (mySums === botSums) {
          message = "SERI";
          displayResult(message)
        }

        // resultElement.textContent = message;
        // displayResult(message);
        startGameButton.disabled = false;
        takeCardButton.disabled = true;
        holdCardsButton.disabled = true;

      }
    }, 1000);
  };

  addBotCards();
});

function getValueOfCard(card) {
  let cardDetail = card.split("-");
  let value = cardDetail[0];

  if (isNaN(value)) {
    if (value == "A") return 11;
    else return 10;
  }

  return parseInt(value);
}

function checkASCard(card) {
  if (card[0] == "A") return 1;
  else return 0;
}

function reduceASCardValue(sums, asCards) {
  while (sums > 21 && asCards > 0) {
    sums -= 10;
    asCards -= 1;
  }
  return sums;
}

// Fungsi untuk menampilkan hasil selama 1 menit
function displayResult(message) {
  resultImage.style.display = "block";
  resultDisplay.style.display = "block";

  if (message === "MENANG") {
    resultImage.src = "asets/win.jpg";
    resultMessage.textContent = "You Win!";
  } else if (message === "KALAH") {
    resultImage.src = "asets/lose.jpg";
    resultMessage.textContent = "You Lose!";
  } else if (message === "SERI") {
    resultImage.src = "asets/tie.jpg";
    resultMessage.textContent = "It's a Tie!";
  }
  
  setTimeout(() => {
    resultImage.style.display = "none";
    resultMessage.textContent = "";
    resultDisplay.style.display = "none";
    currentBet = 0; // Atur ulang currentBet ke nilai awal
    
  }, 3000);


}
