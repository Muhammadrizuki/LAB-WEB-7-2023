const readline = require('readline');

const rl = readline.createInterface({
  input: process.stdin,
  output: process.stdout
});

rl.question("Masukkan nilai a : ", function(a) {
  rl.question("Masukkan nilai b : ", function(b) {
    console.log(a ** b);
    rl.close();
  });
});