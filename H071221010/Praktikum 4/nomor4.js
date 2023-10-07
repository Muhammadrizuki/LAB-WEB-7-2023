let n = parseInt(prompt("Masukkan jumlah angka :"));
let angka = [];
for (let i = 0; i < n; i++) {
    let inputAngka = parseInt(prompt(`Masukkan Angka ke-${i+1}`));
    angka.push(inputAngka);
}

for (let i = 0; i < angka.length - 1; i++) {
    for (let j = 0; j < angka.length - i - 1; j++) {
        if (angka[j] > angka[j + 1]) {
            const temp = angka[j];
            angka[j] = angka[j + 1];
            angka[j + 1] = temp;
        }
    }
}

alert(`Angka terurut : ${angka.join(" ")}`);
