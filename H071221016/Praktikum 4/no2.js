function caesarCipher(text,s) {
    let result="";
    for (let i = 0; i < text.length; i++)
    {
        let char = text[i];
        let ch = char.charCodeAt();

        if (char >= "a" && char <= "z") {
            ch = ((ch-97 + s)% 26)+ 97;
        } else if (char >= "A" && char <= "Z"){
            ch = ((ch-65 + s)% 26)+ 65;
        }
        result += String.fromCharCode(ch);
    }
    return result;
}
console.log(caesarCipher("abc", 2));

