<?php

include './vendor/autoload.php';

$data = new App\OrdinalNumber();

$value = 1441;

$value = "4    4,4,55,55,1441";

echo ($data->ordinal_convert($value));
