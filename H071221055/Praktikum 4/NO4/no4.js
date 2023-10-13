// let list = prompt("Masukkan inputan :").split(" ").map((str) => parseInt(str))
// for (let i of list){
//     for (let j = 0; j < list.length; j++) {
//         if (list[j] > list[j + 1]) {
//             let temp = list[j]
//             list[j] = list[j + 1]
//             list[j + 1] = temp
//         }
//     }
// }
// console.log(list)


let num = parseInt(prompt("Masukkan n : "))
list = []
for (let i = 0; i < num; i++) {
    let numbers = parseInt(prompt("Masukkan angka : "))
    list.push(numbers)
}
for (let i of list){
    for (let j = 0; j < list.length; j++) {
        if (list[j] > list[j + 1]) {
            let temp = list[j]
            list[j] = list[j + 1]
            list[j + 1] = temp
        }
    }
}
console.log(list)