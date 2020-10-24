<?php 


// Rupiah
function rupiah($nilai = 0)
{
	$string = "Rp,".number_format($nilai);
	return $string;
}

function status_pesanan($status)
{
	if($status == 1){
		return 'Sudah Bayar';
	}else{
		return 'Belum Bayar';
	}
}


 ?>