<?php
	$key = $_POST['key'];
	$plaintext = $_POST['plaintext'];

	$keyarr = unpack("C*", $key);
	$plainarr = unpack("C*", $plaintext);
	$len = count($plainarr);
	$len2 = count($keyarr);

	for($i=$len2;$i < $len-$len2;$i++){
		for($j=1;$j < $len2;$j++){
			array_push($keyarr, $keyarr[$j]);
		}
	}

	var_dump($plainarr);
	var_dump($keyarr);

	for($k = 1;$k<$len;$k++){
		$keyarr[$k] ^= $plainarr[$k];
	}

	var_dump($keyarr);
	$key = call_user_func_array('pack', array_merge(array('C*'),$keyarr));
	var_dump($key);
?>