//nomor 1
function nomorSatu(value, pow) {
  let a = value;
if(pow==0){value=1;}else{
  for (let i = 1; i < pow; i++) {
    value *= a;
  }}
  return value;
}

//nomor 2
function nomorDua(a, n) {
  let huruf = [
    "a",
    "b",
    "c",
    "d",
    "e",
    "f",
    "g",
    "h",
    "i",
    "j",
    "k",
    "l",
    "m",
    "n",
    "o",
    "p",
    "q",
    "r",
    "s",
    "t",
    "u",
    "v",
    "w",
    "x",
    "y",
    "z",
  ];
  let angka = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9"];
  let result = "";
  for (let i = 0; i < a.length; i++) {
    if (a[i] == " ") {
      result += a[i];
      continue;
    }
    let value =
      huruf.indexOf(a[i].toLowerCase()) == -1
        ? angka.indexOf(a[i])
        : huruf.indexOf(a[i].toLowerCase());
    if (a[i] == a[i].toUpperCase()) {
      result +=
        huruf.indexOf(a[i].toLowerCase()) == -1
          ? angka[(value + n) % 10]
          : huruf[(value + n) % 26].toUpperCase();
    } else if (a[i] == a[i].toLowerCase()) {
      result += huruf[(value + n) % 26];
    }
  }
  return result;
}

//nomor 3
function nomorTiga(kata) {
  a = kata;
  kata = kata.replace(/\s/g, "").toLowerCase();
  for (let i = 1; i <= kata.length / 2; i++) {
    if (kata[i - 1] !== kata[kata.length - i]) {
      return a + " bukan palindrome";
    }
  }
  return a + " adalah palindrome";
}

//nomor 4
function nomorEmpat(a) {
  for (let i = 0; i < a.length; i++) {
    let cek = 0;
    for (let j = 0; j < a.length; j++) {
      if (a[j] > a[j + 1]) {
        let temp = a[j];
        a[j] = a[j + 1];
        a[j + 1] = temp;
      } else {
        cek++;
      }
    }
    if (cek == a.length) {
      break;
    }
  }
  return a;
}

//nomor 5
function nomorLima(a) {
  let biner = "";
  while (a > 0) {
    if (a % 2 == 1) {
      biner = "1" + biner;
    } else {
      biner = "0" + biner;
    }
    // divide number by 2.
    a = Math.floor(a / 2);
  }
  if (biner == "") {
    biner = 0;
  }
  return biner;
}

//MENU
while (true) {
  let nomor = parseInt(
    prompt(
      "pilih soal yang ingin di uji \n1. perpangkatan\n2.cipher text encrypt\n3.palindrom check\n4.pengurutan angka\n5. decimal to binary\n0.exit"
    )
  );
  let exit = false;
  switch (nomor) {
    case 1:
      let bil = parseInt(prompt("Masukkan Nilai:"));
      let pow = parseInt(prompt("Masukkan Pangkat:"));
      alert(
        " Hasil dari " + bil + " pangkat " + pow + " = " + nomorSatu(bil, pow)
      );
      break;
    case 2:
      let x = prompt("Masukkan text:");
      let shift = parseInt(prompt("Masukkan nilai n:"));
      alert("hasil = " + nomorDua(x, shift));
      break;
    case 3:
      let w = prompt("Masukkan kata:");
      alert(nomorTiga(w));
      break;
    case 4:
      let n = parseInt(prompt("masukkan jumlah angka: "));
      let angka = [];
      for (let i = 0; i < n; i++) {
        angka[i] = parseInt(prompt(`masukkan angka ke-${i + 1}:`));
      }
      alert(nomorEmpat(angka));
      break;
    case 5:
      let a = prompt("masukkan nilai yang ingin diubah:");
      alert(nomorLima(a));
      break;
    default:
      alert("inputan anda salah");
      break;
    case 0:
      exit = true;
  }
  if (exit == true) break;
}
