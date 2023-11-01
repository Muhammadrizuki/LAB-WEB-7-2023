let jumlahPlayer = 0;
let player1 = "";
let player2 = "";
let pasang = 0;
let carddeck = [
  { kode: 1, kartu: "AS hati", value: 11, image: "images/cards/hati/A.png" },
  { kode: 2, kartu: "AS skop", value: 11, image: "images/cards/sekop/A.png" },
  { kode: 3, kartu: "AS ciduk", value: 11, image: "images/cards/ciduk/A.png" },
  { kode: 4, kartu: "AS kelor", value: 11, image: "images/cards/kelor/A.png" },
  { kode: 5, kartu: "King hati", value: 10, image: "images/cards/hati/A.png" },
  { kode: 6, kartu: "King skop", value: 10, image: "images/cards/sekop/K.png" },
  {
    kode: 7,
    kartu: "King ciduk",
    value: 10,
    image: "images/cards/ciduk/K.png",
  },
  {
    kode: 8,
    kartu: "King kelor",
    value: 10,
    image: "images/cards/kelor/K.png",
  },
  { kode: 9, kartu: "Queen hati", value: 10, image: "images/cards/hati/Q.png" },
  {
    kode: 10,
    kartu: "Queen skop",
    value: 10,
    image: "images/cards/sekop/Q.png",
  },
  {
    kode: 11,
    kartu: "Queen ciduk",
    value: 10,
    image: "images/cards/ciduk/Q.png",
  },
  {
    kode: 12,
    kartu: "Queen kelor",
    value: 10,
    image: "images/cards/kelor/Q.png",
  },
  { kode: 13, kartu: "Jack hati", value: 10, image: "images/cards/hati/J.png" },
  {
    kode: 14,
    kartu: "Jack skop",
    value: 10,
    image: "images/cards/sekop/J.png",
  },
  {
    kode: 15,
    kartu: "Jack ciduk",
    value: 10,
    image: "images/cards/ciduk/J.png",
  },
  {
    kode: 16,
    kartu: "Jack kelor",
    value: 10,
    image: "images/cards/kelor/J.png",
  },
  { kode: 17, kartu: "10 hati", value: 10, image: "images/cards/hati/10.png" },
  { kode: 18, kartu: "10 skop", value: 10, image: "images/cards/sekop/10.png" },
  {
    kode: 19,
    kartu: "10 ciduk",
    value: 10,
    image: "images/cards/ciduk/10.png",
  },
  {
    kode: 20,
    kartu: "10 kelor",
    value: 10,
    image: "images/cards/kelor/10.png",
  },
  { kode: 21, kartu: "9 hati", value: 9, image: "images/cards/hati/9.png" },
  { kode: 22, kartu: "9 skop", value: 9, image: "images/cards/sekop/9.png" },
  { kode: 23, kartu: "9 ciduk", value: 9, image: "images/cards/ciduk/9.png" },
  { kode: 24, kartu: "9 kelor", value: 9, image: "images/cards/kelor/9.png" },
  { kode: 25, kartu: "8 hati", value: 8, image: "images/cards/hati/8.png" },
  { kode: 26, kartu: "8 skop", value: 8, image: "images/cards/sekop/8.png" },
  { kode: 27, kartu: "8 ciduk", value: 8, image: "images/cards/ciduk/8.png" },
  { kode: 28, kartu: "8 kelor", value: 8, image: "images/cards/kelor/8.png" },
  { kode: 29, kartu: "7 hati", value: 7, image: "images/cards/hati/7.png" },
  { kode: 30, kartu: "7 skop", value: 7, image: "images/cards/sekop/7.png" },
  { kode: 31, kartu: "7 ciduk", value: 7, image: "images/cards/ciduk/7.png" },
  { kode: 32, kartu: "7 kelor", value: 7, image: "images/cards/kelor/7.png" },
  { kode: 33, kartu: "6 hati", value: 6, image: "images/cards/hati/6.png" },
  { kode: 34, kartu: "6 skop", value: 6, image: "images/cards/sekop/6.png" },
  { kode: 35, kartu: "6 ciduk", value: 6, image: "images/cards/ciduk/6.png" },
  { kode: 36, kartu: "6 kelor", value: 6, image: "images/cards/kelor/6.png" },
  { kode: 37, kartu: "5 hati", value: 5, image: "images/cards/hati/5.png" },
  { kode: 38, kartu: "5 skop", value: 5, image: "images/cards/sekop/5.png" },
  { kode: 39, kartu: "5 ciduk", value: 5, image: "images/cards/ciduk/5.png" },
  { kode: 40, kartu: "5 kelor", value: 5, image: "images/cards/kelor/5.png" },
  { kode: 41, kartu: "4 hati", value: 4, image: "images/cards/hati/4.png" },
  { kode: 42, kartu: "4 skop", value: 4, image: "images/cards/sekop/4.png" },
  { kode: 43, kartu: "4 ciduk", value: 4, image: "images/cards/ciduk/4.png" },
  { kode: 44, kartu: "4 kelor", value: 4, image: "images/cards/kelor/4.png" },
  { kode: 45, kartu: "3 hati", value: 3, image: "images/cards/hati/3.png" },
  { kode: 46, kartu: "3 skop", value: 3, image: "images/cards/sekop/3.png" },
  { kode: 47, kartu: "3 ciduk", value: 3, image: "images/cards/ciduk/3.png" },
  { kode: 48, kartu: "3 kelor", value: 3, image: "images/cards/kelor/3.png" },
  { kode: 49, kartu: "2 hati", value: 2, image: "images/cards/hati/2.png" },
  { kode: 50, kartu: "2 skop", value: 2, image: "images/cards/sekop/2.png" },
  { kode: 51, kartu: "2 ciduk", value: 2, image: "images/cards/ciduk/2.png" },
  { kode: 52, kartu: "2 kelor", value: 2, image: "images/cards/kelor/2.png" },
];
let newCardDeck = [];
let card1 = [];
let card2 = [];
let cardB = [];
let sumJ1 = 0;
let sumJ2 = 0;
let sumJB = 0;
let sumP1 = document.getElementById("sumP1");
let sumP2 = document.getElementById("sumP2");
let sumB = document.getElementById("Sbandar");
let uang1 = 5000;
let uang2 = 5000;
let jtaruhan1 = 0;
let jtaruhan2 = 0;

let taruhan1 = document.getElementById("taruhan1");
let taruhan2 = document.getElementById("taruhan2");
let uangg1 = document.getElementById("uang1");
let uangg2 = document.getElementById("uang2");
let blackJack1 = false;
let blackJack2 = false;

let sisaK = document.getElementById("sisaKartu");

let kartuP1 = document.getElementById("kartuP1");
let kartuP2 = document.getElementById("kartuP2");
let kartuB = document.getElementById("kartuB");

const image = document.createElement("img");

image.width = "85";

function play() {
  document.getElementById("main-menu").hidden = true;
  document.getElementById("player").hidden = false;
}

function sumPlayer(sum) {
  document.getElementById("player").hidden = true;
  document.getElementById("nickname").hidden = false;

  jumlahPlayer = sum;
}

function mulai() {
  document.getElementById("nickname").hidden = true;
  document.getElementById("bandar").hidden = false;
  document.getElementById("conKartu").hidden = false;
  document.getElementById("conPlayer").hidden = false;
  document.getElementById("player1Taruhan").hidden = false;
  document.getElementById("start").hidden = true;
  if (uang1 == 0) {
    document.getElementById("reset1").hidden = false;
  } else if (uang2 == 0) {
    document.getElementById("reset2").hidden = false;
  } else {
    document.getElementById("reset1").hidden = true;
    document.getElementById("reset2").hidden = true;
  }

  card1 = [];
  card2 = [];
  cardB = [];
  sumJB = 0;
  sumB.innerText = "jumlah kartu bandar: " + sumJB;
  sumJ1 = 0;
  sumP1.innerText = "jumlah kartu " + player1 + sumJ1;
  sumJ2 = 0;
  sumP2.innerText = "jumlah kartu " + player2 + sumJ2;
  jtaruhan1 = 0;
  taruhan1.innerText = jtaruhan1;
  jtaruhan2 = 0;
  taruhan2.innerText = jtaruhan2;
  let child1 = kartuP1.lastElementChild;
  while (child1) {
    kartuP1.removeChild(child1);
    child1 = kartuP1.lastElementChild;
  }
  let child2 = kartuP2.lastElementChild;
  while (child2) {
    kartuP2.removeChild(child2);
    child2 = kartuP2.lastElementChild;
  }
  let childB = kartuB.lastElementChild;
  while (childB) {
    kartuB.removeChild(childB);
    childB = kartuB.lastElementChild;
  }
  if (newCardDeck === undefined) {
    newCardDeck = carddeck;

    newCardDeck.sort(function () {
      return Math.random() - 0.5;
    });
  } else if (newCardDeck.length <= 10) {
    newCardDeck.length = 0;
    if (newCardDeck.length == 0) {
      carddeck.forEach((element) => {
        newCardDeck.unshift(element);
      });
      newCardDeck.sort(function () {
        return Math.random() - 0.5;
      });
    }
  }
  if (jumlahPlayer == 1) {
    document.getElementById("playerr2").hidden = true;
  } else {
    document.getElementById("playerr2").hidden = false;
    document.getElementById("player2Taruhan").hidden = false;
  }
}

function sumPasang(p) {
  if (p == 1) {
    if (jtaruhan1 == 0) {
      alert("pasang taruhan dulu!");
    } else {
      pasang++;
      document.getElementById("player1Taruhan").hidden = true;
      uang1 -= jtaruhan1;
      uangg1.innerText = uang1;
    }
  }
  if (p == 2) {
    if (jtaruhan2 == 0) {
      alert("pasang taruhan dulu!");
    } else {
      pasang++;
      document.getElementById("player2Taruhan").hidden = true;
      uang2 -= jtaruhan2;
      uangg2.innerText = uang2;
    }
  }

  if (pasang == jumlahPlayer) {
    newCard();
  }
}

document.getElementById("1001").onclick = function () {
  if (jtaruhan1 >= uang1) alert("Uang anda tidak cukup");
  else jtaruhan1 += 100;
  taruhan1.innerText = jtaruhan1;
  console.log(jtaruhan1);
};
document.getElementById("5001").onclick = function () {
  if (jtaruhan1 >= uang1) alert("Uang anda tidak cukup");
  else jtaruhan1 += 500;
  taruhan1.innerText = jtaruhan1;
};
document.getElementById("10001").onclick = function () {
  if (jtaruhan1 >= uang1) alert("Uang anda tidak cukup");
  else jtaruhan1 += 1000;
  taruhan1.innerText = jtaruhan1;
};
document.getElementById("allIn1").onclick = function () {
  jtaruhan1 = uang1;
  taruhan1.innerText = jtaruhan1;
};

document.getElementById("resetTaruhan1").onclick = function () {
  jtaruhan1 = 0;
  taruhan1.innerText = jtaruhan1;
};

document.getElementById("1002").onclick = function () {
  if (jtaruhan2 >= uang2) alert("Uang anda tidak cukup");
  else jtaruhan2 += 100;
  taruhan2.innerText = jtaruhan2;
};
document.getElementById("5002").onclick = function () {
  if (jtaruhan2 >= uang2) alert("Uang anda tidak cukup");
  else jtaruhan2 += 500;
  taruhan2.innerText = jtaruhan2;
};
document.getElementById("10002").onclick = function () {
  if (jtaruhan2 >= uang2) alert("Uang anda tidak cukup");
  else jtaruhan2 += 1000;
  taruhan2.innerText = jtaruhan2;
};
document.getElementById("allIn2").onclick = function () {
  jtaruhan2 = uang2;
  taruhan2.innerText = jtaruhan2;
};

document.getElementById("resetTaruhan2").onclick = function () {
  jtaruhan2 = 0;
  taruhan2.innerText = jtaruhan2;
};

function newCard() {
  document.getElementById("action1").hidden = false;
  if (jumlahPlayer == 1) {
    for (let i = 0; i < 2; i++) {
      let cardd1 = getRandomCard(sumJ1);
      sumJ1 += cardd1["value"];
      card1.push(cardd1);
      let carddB = getRandomCard(sumJB);
      sumJB += carddB["value"];
      cardB.push(carddB);
    }
    card1.forEach((element) => {
      image.src = element["image"];
      kartuP1.appendChild(image.cloneNode());
    });
    image.src = cardB[0].image;
    kartuB.appendChild(image.cloneNode());
    image.src = "images/cards/Pomegranate.png";
    image.id = "gambar2B";
    kartuB.appendChild(image.cloneNode());
    image.id = "";
  } else if (jumlahPlayer == 2) {
    for (let i = 0; i < 2; i++) {
      let cardd1 = getRandomCard(sumJ1);
      sumJ1 += cardd1["value"];
      card1.push(cardd1);
      let cardd2 = getRandomCard(sumJ2);
      sumJ2 += cardd2["value"];
      card2.push(cardd2);
      let carddB = getRandomCard(sumJB);
      sumJB += carddB["value"];
      cardB.push(carddB);
    }

    card1.forEach((element) => {
      image.src = element["image"];
      kartuP1.appendChild(image.cloneNode());
    });
    card2.forEach((element) => {
      image.src = element["image"];
      kartuP2.appendChild(image.cloneNode());
    });
    image.src = cardB[0].image;
    kartuB.appendChild(image.cloneNode());
    image.id = "gambar2B";
    image.src = "images/cards/Pomegranate.png";
    kartuB.appendChild(image.cloneNode());
    image.id = "";
  }
  if (sumJ1 == 21) {
    sumP1.textContent = "BlackJack!!!";
    blackJack1 = true;
    uang1 += jtaruhan1 * 6;
    document.getElementById("action1").hidden = true;
    stand(1);
  } else {
    sumP1.textContent = "Jumlah Kartu " + player1 + sumJ1;
  }
  if (sumJ2 == 21) {
    sumP2.textContent = "BlackJack!!!";
    blackJack2 = true;
    uang2 += jtaruhan2 * 6;
  } else {
    sumP2.textContent = "Jumlah Kartu " + player2 + sumJ2;
  }
  sumB.textContent = "Jumlah Kartu Bandar: " + cardB[0].value;
  sisaK.textContent = "Sisa kartu: " + newCardDeck.length;
}

function getRandomCard(sum) {
  let kartuBaru = newCardDeck[0];
  newCardDeck.shift();
  if (kartuBaru["value"] == 11) {
    if (sum >= 11) kartuBaru["value"] = 1;
    else kartuBaru["value"] == 11;
    return kartuBaru;
  } else {
    return kartuBaru;
  }
}

function tambah(pemain) {
  if (pemain == 1) {
    if (sumJ1 < 21) {
      let cardd1 = getRandomCard(sumJ1);
      sumJ1 += cardd1["value"];
      card1.push(cardd1);
      image.src = card1[card1.length - 1].image;
      kartuP1.appendChild(image.cloneNode());
      if (jumlahPlayer == 2) {
        if (sumJ1 > 21) {
          sumP1.textContent = sumJ1 + " ya kalah";
          document.getElementById("action1").hidden = true;
          stand(1);
        } else if (sumJ1 == 21) {
          sumP1.textContent = "21 nice";
          document.getElementById("action1").hidden = true;
          stand(1);
        } else {
          sumP1.textContent = "Jumlah Kartu " + player1 + sumJ1;
        }
      } else if (jumlahPlayer == 1) {
        if (sumJ1 > 21) {
          sumP1.textContent = sumJ1 + " ya kalah";
          document.getElementById("action1").hidden = true;
          stand(1);
        } else if (sumJ1 == 21) {
          sumP1.textContent = "21 nice";
          document.getElementById("action1").hidden = true;
          stand(1);
        } else {
          sumP1.textContent = "Jumlah Kartu " + player1 + sumJ1;
        }
      }
    }
  }
  if (pemain == 2) {
    let cardd2 = getRandomCard(sumJ2);
    sumJ2 += cardd2["value"];
    card2.push(cardd2);
    image.src = card2[card2.length - 1].image;
    kartuP2.appendChild(image.cloneNode());
    if (sumJ2 > 21) {
      sumP2.textContent = sumJ2 + " ya kalah";
      document.getElementById("action2").hidden = true;
      stand(2);
    } else if (sumJ2 == 21) {
      sumP2.textContent = "21 nice";
      document.getElementById("action2").hidden = true;
      stand(2);
    } else {
      sumP2.textContent = "Jumlah Kartu " + player1 + sumJ2;
    }
  }
  sisaK.textContent = "Sisa kartu: " + newCardDeck.length;
}

function stand(pemain) {
  if (jumlahPlayer == 1) {
    document.getElementById("action1").hidden = true;
    document.getElementById("gambar2B").src = cardB[1].image;
    for (; sumJB < 17; ) {
      let carddB = getRandomCard(sumJB);
      sumJB += carddB["value"];
      cardB.push(carddB);
      image.src = carddB["image"];
      kartuB.appendChild(image.cloneNode());
    }
    if (sumJB > 21 && blackJack1 == false && sumJ1 <= 21) {
      sumP1.textContent = "You Won";
      uang1 += jtaruhan1 * 2;
      uangg1.innerText = uang1;
      console.log(uang1);
    } else if (sumJB < sumJ1 && sumJ1 < 22 && blackJack1 == false) {
      sumP1.textContent = "You Won";
      uang1 += jtaruhan1 * 2;
      uangg1.innerText = uang1;
      console.log(uang1);
    } else if (sumJB == sumJ1 && blackJack1 == false) {
      sumP1.textContent = "Draw";
      uang1 += jtaruhan1;
      uangg1.innerText = uang1;
    } else if (sumJB > sumJ1 && blackJack1 == false) {
      sumP1.textContent = "You Lose";
    }
    pasang = 0;
  }
  if (jumlahPlayer == 2) {
    if (pemain == 1 && sumJ2 != 21) {
      document.getElementById("action1").hidden = true;
      document.getElementById("action2").hidden = false;
    } else {
      pasang = 0;
      document.getElementById("start").hidden = false;
      document.getElementById("action1").hidden = true;
      document.getElementById("action2").hidden = true;
      document.getElementById("gambar2B").src = cardB[1].image;
      for (; sumJB < 17; ) {
        let carddB = getRandomCard(sumJB);
        sumJB += carddB["value"];
        cardB.push(carddB);
        image.src = carddB["image"];
        kartuB.appendChild(image.cloneNode());
      }
      if (sumJB > 21 && blackJack1 == false && sumJ1 <= 21) {
        sumP1.textContent = "You Won";
        uang1 += jtaruhan1 * 2;
        uangg1.innerText = uang1;
        console.log(uang1);
      } else if (sumJB < sumJ1 && sumJ1 < 22 && blackJack1 == false) {
        sumP1.textContent = "You Won";
        uang1 += jtaruhan1 * 2;
        uangg1.innerText = uang1;
        console.log(uang1);
      } else if (sumJB == sumJ1 && blackJack1 == false && sumJB <= 21) {
        sumP1.textContent = "Draw";
        uang1 += jtaruhan1;
        uangg1.innerText = uang1;
      } else if (sumJB > sumJ1 && blackJack1 == false && sumJB <= 21) {
        sumP1.textContent = "You Lose";
      }
      if (sumJB > 21 && blackJack2 == false && sumJ2 <= 21) {
        sumP2.textContent = "You Won";
        uang2 += jtaruhan2 * 2;
        uangg2.innerText = uang2;
        console.log(uang2);
      } else if (sumJB < sumJ2 && sumJ2 < 22 && blackJack2 == false) {
        sumP2.textContent = "You Won";
        uang2 += jtaruhan2 * 2;
        uangg2.innerText = uang2;
        console.log(uang2);
      } else if (sumJB == sumJ2 && blackJack2 == false && sumJB <= 21) {
        sumP2.textContent = "Draw";
        uang2 += jtaruhan2;
        uangg2.innerText = uang2;
      } else if (sumJB > sumJ2 && blackJack2 == false && sumJB <= 21) {
        sumP2.textContent = "You Lose";
      }
      sumB.textContent = "Jumlah Kartu Bandar: " + sumJB;
      sisaK.textContent = "Sisa kartu: " + newCardDeck.length;
    }
  }
}

function reset(p) {
  if (p == 1) {
    uang1 = 5000;
    uangg1.innerText = uang1;
    document.getElementById("reset1").hidden = true;
  }
  if (p == 2) {
    uang2 = 5000;
    uangg2.innerText = uang2;
    document.getElementById("reset2").hidden = true;
  }
}
