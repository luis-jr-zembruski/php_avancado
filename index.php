<?php

require_once 'vendor/autoload.php';

use Wead\DigitalCep\Search;

$busca = new Search;

print_r($busca->getAddressFromZipCode('01001000'));