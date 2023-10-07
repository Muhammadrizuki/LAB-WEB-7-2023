let teks = prompt("Masukkan kata yang ingin dienkripsi : ");
let n = parseInt(prompt("Masukkan jumlah pergeseran : "));

let hasilEnkripsi = [];
for (let i=0; i<teks.length; i++){
    if(Number.isNaN(n)){
        alert("Nilai n harus berupa angka")
        break
    }
    let charcode = teks[i].charCodeAt(0);
    if(charcode < 65){
        prompt("Masukkan string: ")
        break
    }
    else if(charcode > 122){
        prompt("Masukkan string: ")
        break
    }
    else if(charcode > 90 && charcode < 97){
        prompt("Masukkan string: ")
        break
    }
    let code = charcode += n
    if(code > 122){
        code -= 26
    }
    else if(code > 90 && code < 97){
        code -= 26
    }
    let charString = String.fromCharCode(code)
    hasilEnkripsi.push(charString)
}

hasilEnkripsi = hasilEnkripsi.join("");
alert(`Kata setelah di enkripsi : ${hasilEnkripsi}`);