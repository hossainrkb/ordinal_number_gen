<?php
namespace App;

class OrdinalNumber
{
    public function ordinal_convert($value)
    {
        if (is_integer($value)) {

            if (intval($value) == 0) {

                return "Format Not support";

            } else {

                $convert_array = str_split($value);

                $final_array = $this->remove_zero_from_front($convert_array);

                return $this->set_position($final_array);

            }

        } else {
            $remove_wp = preg_replace("/(\s)/", '', $value);

            if (is_string($remove_wp)) {

                if (preg_match('/^[\"]*(\d|\s)*((?<=\d)+(,?(?=\d))(\d|\s))*+[\"]*$/', trim($remove_wp))) {

                    $remove_comma = $this->remove_comma($remove_wp);

                    $convert_array = str_split($remove_comma);

                    $final_array = $this->remove_zero_from_front($convert_array);

                    if (count($final_array) > 0) {return $this->set_position($final_array);

                    } else {

                        return "Format Not support";
                    }

                } else {

                    return "Format Not support";
                }

            } else {

                return "Format Not support";
            }

        }
    }

    protected function remove_zero_from_front($array)
    {
        $i = 0;

        $newArr = [];

        while ($i < count($array)) {

            if ($array[$i] == 0) {

                $i++;

                continue;

            } else {

                $newArr = array_slice($array, $i);

                break;
            }

        }

        return $newArr;

    }
    public function remove_comma($string)
    {
        return preg_replace("/(,)/", '', $string);
    }

    public function set_position($final_array)
    {
        $final_value = implode("", $final_array);

        $last_value = $final_array[count($final_array) - 1];

        $ordinal_number = "";

        switch ($last_value) {

            case 1:

                $ordinal_number = $final_value . "st";
                break;

            case 2:
                $ordinal_number = $final_value . "nd";
                break;

            case 3:
                $ordinal_number = $final_value . "rd";
                break;

            default:
                $ordinal_number = $final_value . "th";
                break;
        }

        return $ordinal_number;

    }
}
