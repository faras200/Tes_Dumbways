function angka(n){
    var m = n;
    var z = m.length - 1;
    var cetak = [];
    for(var n = z; n >= 0; n--){

        cetak.push(m[n]);

    }
    console.log("input  => " + m.join(" "));
    console.log("output => " + cetak.join(" "));
}

angka([19,22,3,28,26,17,18,4,28,0]);
