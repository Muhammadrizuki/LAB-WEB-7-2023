function caesarCipher(text,s) {
    let result="";
    for (let i = 0; i < text.length; i++)
    {
        // indeks
        let char = text[i];
        let ch = char.charCodeAt();
// penegecekan apbila teks yang kita masukkan hurf kecil semua
        if (char >= "a" && char <= "z") {
            // ketika memenuhi kondisi maka akan dijalankan perintah dibawah
            ch = ((ch-97 + s)% 26)+ 97;
        } else if (char >= "A" && char <= "Z"){
            ch = ((ch-65 + s)% 26)+ 65;
        }
        // mengkonversi hasilnya ke bentuk string
        result += String.fromCharCode(ch);
    }
    return result;
}
console.log(caesarCipher("abc", 2));

