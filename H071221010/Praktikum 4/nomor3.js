let teks = prompt("Masukkan kata yang ingin diperiksa :");
const teksHurufKecil = teks.toLowerCase();
const teksSplit = teksHurufKecil.split("");
let teks2 = teksSplit.reverse().slice();
teks2 = teks2.join("");

if (teksHurufKecil == teks2) {
    alert(`${teks} adalah Palindrom`)
} else {
    alert(`${teks} bukan Palindrom`)
}