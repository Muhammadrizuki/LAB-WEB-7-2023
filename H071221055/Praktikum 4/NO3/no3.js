let text = prompt("Masukkan inputan : ").toLocaleLowerCase();
let reverse = "";

for (let i of text) {
    reverse = i + reverse;
}

if (reverse === text) {
    console.log("Palindrom");
} else {
    console.log("Bukan Palindrom ");
}