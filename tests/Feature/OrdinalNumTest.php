<?php

use App\OrdinalNumber;
use Orchestra\Testbench\TestCase;

class OrdinalNumTest extends TestCase
{
    /* @test */

    public function test_int_num()
    {

        $ordinal = new OrdinalNumber();

        $data = json_decode(file_get_contents(__DIR__ . '/../../storage/demoData.json'), true);

        for ($i = 1; $i <= 100; $i++) {

            $this->assertEquals($data[$i], $ordinal->ordinal_convert($i));

            // file_put_contents(__DIR__ . '/../../storage/demoData.json', '"' . "$i" . '"' . ":" . json_encode($data->ordinal_convert($i)) . ",", FILE_APPEND);
        }
    }

    public function testZeroOrdinalNumber()
    {
        $ordinal = new OrdinalNumber();

        $this->assertEquals("Format Not support", $ordinal->ordinal_convert(0));
    }

    public function test_comma_cannotbe_end_or_start()
    {
        $ordinal = new OrdinalNumber();

        $this->assertEquals("Format Not support", $ordinal->ordinal_convert("       0,00,0        1,"));
    }

    public function test_empty_string()
    {
        $ordinal = new OrdinalNumber();

        $this->assertEquals("Format Not support", $ordinal->ordinal_convert(""));
    }

    public function test_null()
    {
        $ordinal = new OrdinalNumber();

        $this->assertEquals("Format Not support", $ordinal->ordinal_convert(00000000));
    }

    public function test_remove_zero_from_front()
    {
        $ordinal = new OrdinalNumber();

        $this->assertEquals("414th", $ordinal->ordinal_convert("0000414"));
    }
}
