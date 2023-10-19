let botSums = 0;
let mySums = 0;

let botASCards = 0;
let myASCards = 0;

let cards;
let isCanHit = true;


const startGameButton = document.getElementById("btn-start-game");
const takeCardButton = document.getElementById("btn-take");
const holdCardsButton = document.getElementById("btn-hold");
//untuk mewakili button masing-masing

const mySumsElement = document.getElementsByClassName("my-sums")[0];
const myCardsElement = document.getElementsByClassName("my-cards")[0];
const myMoney = document.getElementById("my-money");
const inputMoney = document.getElementsByTagName("input")[0];
const botSumsElement = document.getElementsByClassName("bot-sums")[0];
const botCardsElement = document.getElementsByClassName("bot-cards")[0];
//untuk mewakili kelas masing-masing

const resultElement = document.getElementById("result"); 

// function redirectToGamePage() {
//   window.location.href = "index.html";
// }

window.onload = function () {//semua kode dalam fungsi hanya akan dijalankan setelah di load
  buildUserCards();  //tumpukan kartu
  shuffleCards();  //untuk mengacak kartu
  takeCardButton.setAttribute("disabled", true); //membuat tombol take card nonaktif
  holdCardsButton.setAttribute("disabled", true); //membuat tombol hol nonaktif
};

function buildUserCards() { 
  let cardTypes = ["H", "B", "S", "K"];//array untuk card hati wajik sekop dan kelor
  let cardValues = [ //array untuk AS - K
    "A",
    "2",
    "3",
    "4",
    "5",
    "6",
    "7",
    "8",
    "9",
    "10",
    "J",
    "Q",
    "K",
  ];
  cards = []; //array kosong untuk menyimpan cardsnya yg sdh digabung nanti

  for (let i = 0; i < cardTypes.length; i++) { 
    for (let j = 0; j < cardValues.length; j++) { //digunakan untuk mengakses indeks dari nilai kartu dalam array cardValues.
      cards.push(cardValues[j] + "-" + cardTypes[i]);// menggabungkan kedua cards
    }
  }
}

function shuffleCards() { 
  for (let i = 0; i < cards.length; i++) {
    let randomNum = Math.floor(Math.random() * cards.length);  //angka acak dikali dengan panjang kartu kemudian nnti dibulatkan pakai math floor
    let temp = cards[i]; //smtra sblm ditukar 
    cards[i] = cards[randomNum]; //Nilai kartu di indeks ke-i digantikan dengan nilai kartu yang terpilih secara acak 
    cards[randomNum] = temp; //krtu yg suda di acak kmudian brubah mnjdi krtu yg i
  }
}

  
startGameButton.addEventListener("click", function () {

  if (isNaN(inputMoney.value)|| inputMoney.value <= 0) {
    alert ("Masukkan uang");
    return;
  }

  if (startGameButton.textContent === "TRY AGAIN") {  //tombol start terganti jadi try again
    //dikasi nol semua dulu nilai awalnya
    botSums = 0; 
    mySums = 0;
    botASCards = 0;
    myASCards = 0;
    isCanHit = true;//klo false ki tdk bisa ki tambah kartu

    botSumsElement.textContent = '';//string kosong untuk bot sums

    const allCardsImage = document.querySelectorAll("img");// all cards image akan berisi semua elemen gambar yang ada pada halaman web
    for (let i = 0; i < allCardsImage.length; i++) {
      allCardsImage[i].remove();//akan menghapus semua elemen gambar
    }

    let cardImg = document.createElement("img");  
    cardImg.src = "/images/cards/kartutertutup.png";
    cardImg.className = "hidden-card";//untuk menyembunyiikan kartu yang tertutup tadi di awal
    botCardsElement.append(cardImg); //biar bisa nambah kartu tapi terhidden ki 

    buildUserCards(); 
    shuffleCards();
  }

  takeCardButton.disabled = false;//biar bisa dipencet
  holdCardsButton.disabled = false;
  startGameButton.textContent = "TRY AGAIN"; //mengganti teks pada tombol "startGameButton" menjadi "TRY AGAIN".
  botSums = 0;
  startGameButton.disabled = true;//biar tdk bisa dipencet


  
  for (let i = 0; i < 2; i++) { // satu untuk bot satunya untuk kita
    let cardImg = document.createElement("img"); //membuat elemen gambar dan menyimpannya ke variabel img
    let card = cards.pop();//menghapus elemen terakhir dari array cards
    cardImg.src = `/images/cards/${card}.png`; //menampilkan gambar kartu yg sesuai
    mySums += getValueOfCard(card); 
    myASCards += checkASCard(card);//cek AS
    mySumsElement.textContent = mySums; //biar munculki nilai sums nya kita
    myCardsElement.append(cardImg); //nambah gambar kartu yg sesuai

  }
});

takeCardButton.addEventListener("click", function () {
  if (!isCanHit) return; 

  let cardImg = document.createElement("img"); 
  let card = cards.pop(); 
  cardImg.src = `/images/cards/${card}.png`;
  mySums += getValueOfCard(card); 
  myASCards += checkASCard(card);
  myCardsElement.append(cardImg);
  mySums = reduceASCardValue(mySums, myASCards);
  mySumsElement.textContent = mySums;


  // console.log("Sebelum: " + myASCards);
  if (mySums > 21) isCanHit = false; //kalau jumlah kartu besar dari 21 nd bsa mki tambah kartu

  // console.log("sesudah: " + myASCards);
  if (mySums > 21) { 
    takeCardButton.disabled = true; 
    holdCardsButton.disabled = true;
    startGameButton.disabled = false; 
    resultElement.textContent = "KALAH"; 
    myMoney.textContent -= inputMoney.value; ///cek baek2!!!!!!!!
  }
});



holdCardsButton.addEventListener("click", function () {
  setTimeout(function () {
    document.getElementsByClassName("hidden-card")[0].remove();
  } , 1000); //jeda terbuka kartu bot apabila di hold

  function addBotCards() {
    setTimeout(function () { 
      let cardImg = document.createElement("img"); 
      let card = cards.pop();
      cardImg.src = `/images/cards/${card}.png`; 
      botSums += getValueOfCard(card);
      botASCards += checkASCard(card); 
      botCardsElement.append(cardImg); 
      botSumsElement.textContent = botSums; 

      
      if (botSums < 21) { 
        addBotCards();
      } else { 
        botSums = reduceASCardValue(botSums, botASCards); 
        mySums = reduceASCardValue(mySums, myASCards);
        isCanHit = false;

        let message = "";
        if (mySums > 21 ) {  
          message = "KALAH";
          myMoney.textContent -= inputMoney.value; 
        } else if (botSums  < 21 || mySums % 22 > botSums % 22) {
          message = "MENANG"; // k
          myMoney.textContent = parseInt(myMoney.textContent) + inputMoney.value * 5 ;
        } else if (mySums === botSums) message = "SERI";

        resultElement.textContent = message;
        startGameButton.disabled = false;
        takeCardButton.disabled = true;
        holdCardsButton.disabled = true;
      }
    }, 1000);
  }

  addBotCards();
});

function getValueOfCard(card) {
  let cardDetail = card.split("-"); //membagi string card menjadi dua bagian dengan memisahkan string berdasarkan tanda "-" menggunakan split("-"). Hasilnya adalah array cardDetail, di mana elemen pertama adalah nilai kartu (seperti "A" atau "7") dan elemen kedua adalah jenis kartu (seperti "Hearts" atau "Diamonds").
  let value = cardDetail[0]; //mengambil nilai kartu (elemen pertama dari array) dan menyimpannya dalam variabel value.

  if (isNaN(value)) { 
    // Kartu AS
    if (value == "A") return 11;
    // Kartu K, Q, J
    else return 10;
  }

  return parseInt(value);
}

// function checkASCard(card) {
//   if (card[0] == "A") return 1;
//   consol;
//   else return 0;
// }
function checkASCard (card) {
  if (card[0]== "A")  { 
    // console.log("diisi");
    return 1;
  } else {
    return 0;
  }
}


function reduceASCardValue(sums, asCards) {
  while (sums > 21 && asCards > 0) {
    sums -= 10;
    myASCards -= 1;
  }
  return sums;
}
