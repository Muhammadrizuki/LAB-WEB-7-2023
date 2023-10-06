const readline = require('readline');

const rl = readline.createInterface({
  input: process.stdin,
  output: process.stdout
});

rl.question("Kata : ", function (word) {
  rl.question("Geser : ", function(geser) {
    let huruf = word.split("")
    let geser2 = parseInt(geser)
    let abjad = "abcdefghijklmnopqrstuvwxyz";
    let new_word = "";
  
    for (let i of huruf) {
      if (i === " ") {
        new_word += " ";
      } else {
        new_word += abjad[((abjad.indexOf(i) + geser2) % abjad.length)]
      }
    }
    console.log(new_word);
    rl.close();
  })
})