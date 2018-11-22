<?php
	$key = $_POST['key'];
	$plaintext = $_POST['plaintext'];

	$keyarr = unpack("C*", $key); //convert string jadi ascii
	$plainarr = unpack("C*", $plaintext); //convert string jadi ascii
	$len = count($plainarr); //hitung panjang array
	$len2 = count($keyarr); //hitung panjang array

	for($i=$len2;$i < $len-$len2;$i++){ //proses padding key
		for($j=1;$j < $len2;$j++){
			array_push($keyarr, $keyarr[$j]);
		}
	}

	var_dump($plainarr); //debugging mode, cek jenis variabel dan outputnya
	var_dump($keyarr);

	for($k = 1;$k<$len;$k++){ //proses xor
		$keyarr[$k] ^= $plainarr[$k];
	}

	var_dump($keyarr); //debugging mode, cek jenis variabel dan outputnya
	$key = call_user_func_array('pack', array_merge(array('C*'),$keyarr)); //convert ASCII ke string
	var_dump($key);
?>
