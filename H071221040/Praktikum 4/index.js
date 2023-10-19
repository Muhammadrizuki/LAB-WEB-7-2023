//NO 1

// let angka = parseInt(prompt('Masukkan angka = '))
// let pangkat = parseInt(prompt('Masukkan pangkat = '))

// let hasil = 1 //variabel untuk menampung hasilnya nanti, jadi apapun hasilnya akan tetap angka itu sendiri karen dikali 1

// for (let index = 0; index < pangkat; index++) {//index dimulai dari nol itu untuk perulangan, index<pangkat untuk batasan perulangan pangkatnya, jadi klo 4 kai berarti empat kali dikalikan, index++ bertambah teruski indexnnya
//     hasil *= angka; //supaya berkali-kali sesuai dengan batasa pangkatnya
// }

// console.log(hasil);

//NO 2

// const kata = prompt("Masukkan Kata : ");
// const n = parseInt(prompt("Masukkan angka : "));
// const hurufAZ = "abcdefghijklmnopqrstuvwxyz";

// let hasil = "";

// for (let i = 0; i < kata.length; i++) {
//     let karakter = kata[i];

//     if (/[a-zA-Z]/.test(karakter)) { // memeriksa apakah karakter mengandung huruf lower atau upper, biar bisa dua-duanya dimasukkan
//         let hurufIndeks = hurufAZ.indexOf(karakter.toLowerCase());
//         if (hurufIndeks > -1) {
//             let geserIndeks = (hurufIndeks + n) % 26;//agar perhitungan ttp di rentang 0 hingga 26, tidak ke 27 dst.
//             if (geserIndeks < 0) {
//                 geserIndeks += 26;//memastikan kalau kita melakukan pergeseran ke kiri, nilainya ditambah 26 sehingga tdk menjadi minus
//             }
//             let hurufGeser = hurufAZ[geserIndeks];//ambil huruf dari hurufAZ yang sudah mi digeser, dimasukkan ke huruf geser

//             if (karakter = karakter.toUpperCase()) {
//                 hurufGeser = hurufGeser.toLowerCase();//untuk mengembalikan dia ke bentuk asalnya, yg tadi lower jadi lower, upper jadi upper
//             }

//             if (karakter = karakter.toLowerCase()) {
//                 hurufGeser = hurufGeser.toUpperCase();//untuk mengembalikan dia ke bentuk asalnya, yg tadi lower jadi lower, upper jadi upper
//             }

//             karakter = hurufGeser;
//         }
//     }

//     hasil += karakter;
// }
// console.log(hasil);

//NO 3
// const numberStr = prompt("Masukkan Text : ")
// const NumArray = numberStr.split('');

// if (NumArray.length == 1) {
//     console.log(`${numberStr} adalah Text palindrome`);
// } else {
//     const reversedNumArray = NumArray.reverse();
//     const reversedNumberStr = reversedNumArray.join('');

//     if (/[a-zA-Z]/.test(reversedNumberStr)) {
//         console.log(`${numberStr} adalah Text palindrome`);
//     } else {
//         console.log(`${numberStr} bukan Text palindrome`)
//     }

    // if (numberStr === reversedNumberStr) {
    //     console.log(`${numberStr} adalah Text palindrome`);
    // } else {
    //     console.log(`${numberStr} bukan Text palindrome`);
    // }
//}

//NO 4
// let numbers = []
// const n = parseInt(prompt("Masukkan nilai n : "))
// for (let i = 0; i < n; i++) {
//     let number = parseInt(prompt(`Masukkan angka ke ${i} :`))
//     numbers.push(number);
// }

// const panjang = numbers.length
// let tukar;

// do {
//     tukar= false;
//     for (let i = 0; i < panjang-1 ; i++) {// untuk mengatur berapa kali dia ditukar
//         if (numbers[i]>numbers[i+1]) {//untuk menukar angka yang lebih kecil dengan yang besar, untuk mengurutkan
//         let balik = numbers[i] //untuk mengatur tukar menukarnya
//         numbers[i] = numbers[i+1]
//         numbers[i+1] = balik
//         tukar = true //ketika true, maka penukaran diulang terus sampai batasannya
//         }
//     }
// } while (tukar); //biar berjalan terus perulangannya, karena tukar bernilai true

// console.log(numbers.join(', '));//ubah array jadi string dengan pemisah koma

//NO 5

let angka = parseInt(prompt("Masukkan Angka : "))

if (angka === 0) {
    console.log(`dalam bentuk binary adalah 0`);
}else {
    let binary = ''
    while (angka>0){
        let sisa = angka%2
        binary = sisa+binary
        angka = Math.floor(angka/2)//untuk bulatka angkanya
    }
    console.log(`dalam bentuk binary adalah ${binary}`);
}