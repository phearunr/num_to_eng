<?php
if (!function_exists('NumberInWords')) {
    function NumberInWords(float $_number)
    {
        $_number_after_decimal = round($_number - ($num = floor($_number)), 2) * 100;
        // Check if there is any number after decimal
        $amt_hundred = null;
        $count_length = strlen($num);
        $x = 0;
        $string = array();
        $change_words = array(
            0 => '', 1 => 'One', 2 => 'Two',
            3 => 'Three', 4 => 'Four', 5 => 'Five', 6 => 'Six',
            7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
            10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve',
            13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',
            16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen',
            19 => 'Nineteen', 20 => 'Twenty', 30 => 'Thirty',
            40 => 'Forty', 50 => 'Fifty', 60 => 'Sixty',
            70 => 'Seventy', 80 => 'Eighty', 90 => 'Ninety'
        );
        $here_digits = array('', 'Hundred', 'Thousand');
        while ($x < $count_length) {
            $get_divider = ($x == 2) ? 10 : 100;
            $_number = floor($num % $get_divider);
            $num = floor($num / $get_divider);
            $x += $get_divider == 10 ? 1 : 2;
            if ($_number) {
                $add_plural = (($counter = count($string)) && $_number > 9) ? 's' : null;
                $amt_hundred = ($counter == 1 && $string[0]) ? ' and ' : null;
                $string[] = ($_number < 21) ? $change_words[$_number] . ' ' . $here_digits[$counter] . $add_plural . ' 
            ' . $amt_hundred : $change_words[floor($_number / 10) * 10] . '-' . $change_words[$_number % 10] . '
            ' . $here_digits[$counter] . $add_plural . ' ' . $amt_hundred . "\n";
            } else $string[] = null;
        }

        return implode('', array_reverse($string));
    }
}
