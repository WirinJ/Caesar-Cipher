
<?php

define('ALFABET', range('A', 'Z'));

$nieuwAlfa = ALFABET;
$shift = $argv[1];
$plainText = $argv[2];

for ($i = 0; $i < $shift; $i++) {
	$letter = array_shift($nieuwAlfa);
	array_push($nieuwAlfa, $letter);
}

$out = [];
for ($i = 0; $i < strlen($plainText); $i++) {
	if ($plainText[$i] == ' ') {
		array_push($out, ' ');
	} else {
		$caesarLetter = $nieuwAlfa[array_search(strtoupper($plainText[$i]), ALFABET)];
		if (ctype_upper($plainText[$i])) {
			array_push($out, $caesarLetter);
		} else {
			array_push($out, strtolower($caesarLetter));
		}
	}
}

echo implode('', $out);

?>
