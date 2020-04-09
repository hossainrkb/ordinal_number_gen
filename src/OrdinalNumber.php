<?php
namespace App;

class OrdinalNumber
{
    public function ordinal_convert($value)
    {
        if (is_integer($value)) {

            $ordinal_number = "";

            $convert_array = str_split($value);

            $last_value = $convert_array[count($convert_array) - 1];

            switch ($last_value) {

                case 1:
                    $ordinal_number = $value . "<sup>st</sup>";
                    break;

                case 2:
                    $ordinal_number = $value . "<sup>nd</sup>";
                    break;

                case 3:
                    $ordinal_number = $value . "<sup>rd</sup>";
                    break;

                default:
                    $ordinal_number = $value . "<sup>th</sup>";
                    break;
            }

            return $ordinal_number;

        } else {

            return "Number type is not support";

        }
    }
}
