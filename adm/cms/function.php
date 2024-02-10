<?php

function jsonEncodeDecode($type, $array){
	
	if ($type == 'encode'){
		return json_encode($array) ;
	}else{
		return json_decode($array, true) ;
	}
	
}