function cetakGambar(bilangan) { 
	if (bilangan % 2 != 0) { 
		var cetak = []; 
		for (var i = 1; i <= bilangan; i++) { 
			var cetak2 = []; 
			if ( i % 2 === 0 ) { 
				for (var j = 0; j < bilangan; j++) { 
						
					if (j === 0 || j === bilangan - 1) { 
						cetak2.push("*"); 
						} 

					else { 
						cetak2.push("="); 
						} 
					}

			} else { 
				for (var j = 0; j < bilangan; j++) { 
					cetak2.push("*"); 
					}	 
			} 

				cetak.push(cetak2); 
		} 

			cetak.forEach(a=>{ console.log(a.join(" ")) }) 
		
		}else { 
			console.log("Harus Bilangan Ganjil"); 
		}
			
	}

cetakGambar(7);