<?php
// Sample Input:
// 1
// 1000
//
// bigint difficulty
// 1
// 294867828828426241


function getSumOfMultiple(int $multiple, string $limit): int {
    // bc* operators added for precise float math
    // $limit should be string for accurate ingesion

    $numOfMultiples = bcdiv(bcsub($limit, 1), $multiple);

    // Common Difference
    // d = a(n) - a(n-1)
    // $diff = ($multiple * $numofMultiples) - ($multiple * ($numOfMultiples - 1));
    // $diff = bcsub(
    //     bcmul($multiple, $numOfMultiples),
    //     bcmul($multiple, $numOfMultiples - 1)
    // );

    // Arithmatic Progression

    // 3*(three*(three+1)/2)
    // Simpler Version:
    // $sumOfMultiples = $multiple * (($numOfMultiples * ($numOfMultiples + 1)) / 2);

    $sumOfMultiples = bcmul(
        $multiple,
        bcdiv(
            bcmul(
                $numOfMultiples, 
                bcadd($numOfMultiples, 1)
            ),
            2
        )
    );

    // Not Working :(
    // Sn = n/2 * [2a + (n-1) * d]
    // a = first-term === multiple
    // d = common difference === multiple
    // $first = $diff = $multiple;

    // $alt = bcmul(
    //     bcdiv($numOfMultiples, 2),
    //     bcadd(
    //         bcmul(2, $first),
    //         bcmul(
    //             bcsub($numOfMultiples, 1),
    //             $diff
    //         )
    //     )
    // );
    
    return (int)$sumOfMultiples;
}

$handle = fopen ("php://stdin", "r");
fscanf($handle, "%d", $t); // $t: # of Test Cases
for ($a0 = 0; $a0 < $t; $a0++) {
    fscanf($handle, "%d", $n);

    $threesSum   = getSumOfMultiple(3, $n);
    $fivesSum    = getSumOfMultiple(5, $n);
    $fifteensSum = getSumOfMultiple(15, $n);

    $solution = $threesSum + $fivesSum - $fifteensSum;
    
    ob_start();
    print_r(compact('n', 'threesSum', 'fivesSum', 'fifteensSum', 'solution'));
    $log = ob_get_clean();
    error_log($log);

    echo "${solution}\n";
}

?>
