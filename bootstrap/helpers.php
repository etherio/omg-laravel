<?php

function price($value) {
    $value = (string)$value;
	$value = strrev($value);
	$value = str_split($value, 3);
	return strrev(join(',', $value));
}
