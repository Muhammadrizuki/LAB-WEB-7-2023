function isPalindrome(word) {
    word = word.replace(/\s/g, "").toLowerCase();
    for (let i = 0; i < word.length / 2; i++) {
        if (word[i] !== word[word.length - 1 - i]) {
          return false;
        }
      }  
      return true;
}
let kata = "kasur ini rusak";
if (isPalindrome(kata)) {
  console.log(kata + " adalah palindrom.");
} else {
  console.log(kata + " bukan palindrom.");
}
// penjelasan kode
// polindrom itu kata yang dibaca terbalik juga sama bacaannya ketika dibaca normal.
// word = word.replace(/\s/g, "").toLowerCase(); ini menghapus spasi pada kata yang kita input kemudian
// diubah ke huruf kecil pada kode toLowerCase().
//mengecek apakah indeks dari for tidak sama dengan panjang kata -1 i nya 
