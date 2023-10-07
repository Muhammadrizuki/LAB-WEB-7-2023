let angka = parseFloat(prompt("Silahkan masukkan angka : "));
let pangkat = parseFloat(prompt("Silahkan masukkan pangkat : "));

if (isNaN(angka) || isNaN(pangkat)) {
    alert("Masukan tidak valid. Mohon masukkan angka yang valid.");
} else {
    const hasil = angka**pangkat;
    alert(`${angka} pangkat ${pangkat} = ${hasil}`);
}