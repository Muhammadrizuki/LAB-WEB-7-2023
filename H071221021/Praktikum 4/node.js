// Nomor 1
var angka = parseInt(prompt("Masukan Angka : "));
var pangkat = parseInt(prompt("Masukan Pangkat : "));
var hasil = 1;

for (var i = 0; i < pangkat; i++) {
    hasil *= angka;
}

alert(angka + " dan " + pangkat + " Menghasilkan " + hasil);

// Nomor 2
var plaintext = prompt("Masukan Kata : ");
var shift = parseInt(prompt("Akan Bergeser Sebanyak : "));

function caesarCipherEncrypt(text, shift) {
    let result = '';
  
    for (let i = 0; i < text.length; i++) {
      let char = text[i];
  
      // Periksa apakah karakter adalah huruf 
      if (/[a-zA-Z]/.test(char)) {
        let isUpperCase = char === char.toUpperCase();
        let baseCharCode = isUpperCase ? 'A'.charCodeAt(0) : 'a'.charCodeAt(0);
        let charCode = char.charCodeAt(0);
        let encryptedCharCode = ((charCode - baseCharCode + shift) % 26) + baseCharCode;
  
        result += String.fromCharCode(encryptedCharCode);
      } else {
        // Jika bukan huruf, biarkan karakter tersebut tidak berubah
        result += char;
      }
    }
  
    return result;
}

// const plaintext = "Natalia";
// const shift = 2;
const encryptedText = caesarCipherEncrypt(plaintext, shift);
  
alert("Teks Asli: " + plaintext);
alert("Teks Terenkripsi: " + encryptedText);

// Nomor 3
let kata = prompt("Masukkan Kata : ");
let kataTanpaSpasi = kata.replace(/ /g, ''); // Menghapus spasi dari kata

// Mengubah kata menjadi huruf kecil untuk memastikan pengecekan yang tidak peka terhadap huruf besar/kecil.
kataTanpaSpasi = kataTanpaSpasi.toLowerCase();

let katabalik = kataTanpaSpasi.split('').reverse().join('');

if (kataTanpaSpasi === katabalik) {
    alert("Palindrom");
} else {
    alert("Bukan Palindrom");
}

// Nomor 4
let Arrayme = []; //Membuat array kosong myArray yang akan berisi angka-angka.
let n = parseInt(prompt("Masukkan jumlah angka: ")); //untuk memasukkan angka
for (let i = 0; i < n; i++) {
    let num = parseInt(prompt("Masukkan angka ke-" + (i+1) + ": "));
    Arrayme.push(num);
} //Melakukan perulangan sebanyak n kali 
//(sesuai dengan jumlah angka yang dimasukkan) untuk mengisi Arrayme

for (let i = 0; i < Arrayme.length; i++) { // Melakukan perulangan sebanyak panjang array Arrayme.
    for (let j = 0; j < Arrayme.length-i-1; j++) { //Melakukan iterasi dalam array untuk membandingkan pasangan angka berdekatan.
        if (Arrayme[j] > Arrayme[j+1]) {
            let temp = Arrayme[j];
            Arrayme[j] = Arrayme[j+1];
            //Membandingkan dua angka berdekatan. Jika angka ke-j 
            //lebih besar daripada angka ke-j+1, maka keduanya ditukar.
            Arrayme[j+1] = temp; // temp itu variabel untuk tukar angka
        }
    }
}
alert("Angka yang telah diurutkan: " + Arrayme.join(" "));

// Nomor 5
let decimal = parseInt(prompt("Masukkan angka desimal: "));
let binary = ""; // Membuat sebuah string kosong binary yang akan menyimpan angka biner
while (decimal > 0) { //perulangan yang akan berjalan selama decimal masih lebih besar dari 0.
    binary = (decimal % 2) + binary; // Mengambil sisa hasil bagi decimal dengan 2 (0 atau 1) dan menambahkannya ke awal string binary.
    decimal = Math.floor(decimal / 2); //Mengubah nilai decimal dengan hasil pembagian bulat (tanpa desimal) dari decimal dibagi 2
}
alert("Angka binary: " + binary);

// let AngkaDesimal = parseInt(prompt("Masukan Angka : "));
// let angkaBiner = AngkaDesimal.toString(2);

// alert("Angka binary : " + angkaBiner);