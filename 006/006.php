<?php

class sumSquareDiff
{
    public $num_set;

    function __construct($num_qty)
    {
        $this->num_set = array_keys(array_fill(1, $num_qty, ''));
    }

    public function sumSquare()
    {
        $retval = array_map(function($v){return $v * $v;}, $this->num_set);
        $retval = array_sum($retval);

        return $retval;
    }

    public function squareSum()
    {
        $retval = array_sum($this->num_set);
        $retval *= $retval;

        return $retval;
    }

    public function run()
    {
        $sum_square = $this->sumSquare();
        $square_sum = $this->squareSum();
        $difference = $square_sum - $sum_square;
        print_r(compact('sum_square', 'square_sum', 'difference'));
    }
}

(new sumSquareDiff(100))->run();
