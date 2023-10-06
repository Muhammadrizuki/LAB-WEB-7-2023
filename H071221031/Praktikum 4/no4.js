// let list = prompt("Masukkan angka dengan pemisah spasi").split(" ").map((str) => parseInt(str))
let n = parseInt(prompt("Panjang array"))
let list = []
for (let i = 1; i <= n; i++) {
    let a = parseInt(prompt("Masukkan Angka " + i))
    list.push(a)
}

for (let i in list){
    for (let j = 0; j < list.length - i - 1; j++) {
        if (list[j] > list[j + 1]) {
            let temporary = list[j]
            list[j] = list[j + 1]
            list[j + 1] = temporary
        }
    }
}

alert(list)