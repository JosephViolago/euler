<?php

// Least efficient
// 997 operations
function multiples_foreach()
{
    $solution = $operations = 0;

    for($i = 3; $i < 1000; $i++)
    {
        if(($i % 5 == 0) || ($i % 3 == 0))
        {
            $solution += $i;
        }
        $operations++;
    }

    return [$solution, $operations];
}

// Removes duplicates after merge
// floor(999/3) + floor(999/5) = 532 operations
function multiples_range()
{
    $fives  = range(5,999,5);
    $threes = range(3,999,3);

    $multiples = array_unique(array_merge($fives, $threes));

    $solution = array_sum($multiples);
    $operations = count($fives) + count($threes);

    return [$solution, $operations];
}


// Prevents duplicates from ever occuring
// floor(999/3) + floor(999/5) - floor(999/15) = 466 operations
function multiples_loops()
{
    $multiples = array_merge(
        range(3,999,3),
        array_diff(range(5,999,5), range(15,999,15))
    );

    $solution = array_sum($multiples);
    $operations = count($multiples);

    return [$solution, $operations];
}


$trials = [];
$attempts = [multiples_foreach(), multiples_range(), multiples_loops()];
foreach ($attempts as $attempt)
{
    $start = array_sum(explode(" ", microtime()));

    list($solution, $operations) = $attempt;

    $end = array_sum(explode(" ", microtime()));
    $milliseconds = ($end - $start) * 1000;

    $trials[] = compact('solution', 'operations', 'milliseconds');
}

print_r($trials);

?>
