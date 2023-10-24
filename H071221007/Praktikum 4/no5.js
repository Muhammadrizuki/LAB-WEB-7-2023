const readline = require('readline');

const rl = readline.createInterface({
  input: process.stdin,
  output: process.stdout
});

rl.question("Masukkan angka : ", function(angka) {
  const biner = parseInt(angka).toString(2);
  console.log(biner);
  rl.close();
})
   