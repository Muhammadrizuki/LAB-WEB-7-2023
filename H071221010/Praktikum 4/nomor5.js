let angka = parseInt(prompt("Masukkan Angka : "))
let binary = "";

while (angka > 0) {
    angka = Math.floor(angka/2);
    binary += (angka % 2);
}

alert(`Angka binary adalah : ${binary}`);