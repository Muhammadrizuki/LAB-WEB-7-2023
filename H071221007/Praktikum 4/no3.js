const readline = require('readline');

const rl = readline.createInterface({
  input: process.stdin,
  output: process.stdout
});

rl.question("Kata : ", function(word){
  let lowerWord = word.toLowerCase();
  let reverse = "";
  for (let i = 1; i < lowerWord.length + 1; i ++){
    let a = lowerWord.length - i;
    reverse += lowerWord[a]
  }
  // console.log(reverse);
  if (reverse == lowerWord) {
    console.log("Palindrom");
  } else {
    console.log("Bukan Palindrom");
  }
  rl.close();
})