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