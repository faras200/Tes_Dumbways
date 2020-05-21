function hitungKembalian(uangBayar){  
var totalBelanja = 235000;
var uangKembalian =[5000,10000,20000];
var cashback = 0;
var totalKembalian;
var jumUang = [0,0,0];

if (uangBayar >= totalBelanja){
console.log('Total belanja : ' + totalBelanja);
console.log('Uang Bayar  : ' + uangBayar)
 if (totalBelanja >= 200000) {
    cashback= (10 / 100) * totalBelanja;
    console.log ('Anda mendapatkan cashback sebesar Rp.' + cashback)
}else{
    console.log("Cashbak = 0");
}

totalKembalian= (uangBayar - totalBelanja) + cashback;
console.log ('Total kembalian : ' + totalKembalian);

for ( var i=0 ; totalKembalian > 0 ; i++){
   
    if (totalKembalian >= uangKembalian[2]) {

        totalKembalian= totalKembalian - uangKembalian[2];
        jumUang[0] += 1;
        
    }else if (totalKembalian >= uangKembalian[1]) {

        totalKembalian= totalKembalian - uangKembalian[1];
        jumUang[1] += 1;
    }else if (totalKembalian >= uangKembalian[0]) {

        totalKembalian= totalKembalian - uangKembalian[0];
        jumUang[2] += 1;
    }
    else {

        console.log ('tidak ada uang pecahan Rp.' + totalKembalian + '. Uang akan di donaskan')
        totalKembalian = totalKembalian - totalKembalian; 
        
    }
  }  
console.log( jumUang[0] + ' X 20000')
console.log( jumUang[1] + ' X 10000')
console.log( jumUang[2] + ' X 5000')
}
else{
    console.log("Uang Bayar Kurang !!!")
}

}

hitungKembalian(250000);