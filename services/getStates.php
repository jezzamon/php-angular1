<?php
require '../classes/CountryRepository.php';

header('Content-type: application/json');

//prefix json to prevent (hypothetical) Javascript/JSON hacking
echo ")]}'\n";

if (isset($_GET['countryCode']) && is_string($_GET['countryCode'])) {
	$states = CountryRepository::getStates($_GET['countryCode']);

	echo json_encode($states);
}
