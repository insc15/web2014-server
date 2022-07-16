<?php
    $x = (2 == 3); // equal to (false)
    $x = (2 != 3); // not equal to (true)
    $x = (2 <> 3); // not equal to (alternative)
    $x = (2 === 3); // identical (false)
    $x = (2 !== 3); // not identical (true)
    $x = (2 > 3); // false, greater than (false)
    $x = (2 < 3); // less than (true)
    $x = (2 >= 3); // greater than or equal to (false)
    $x = (2 <= 3); // less than or equal to (true)
    

    $s = "Hello\nWorld";
    echo $s;
    $s = 'It\'s\n'; // "It 's"
    echo $s;
    echo "\nHello<br>World" ;
    echo "\u{00c2A9}"; // o (copyright sign)
    echo "\u{C2A9}";


    $a = "hello";
    $$a = 'world'; //<=> $hello = 'world'
    echo "$a ${$a} <br>"; //<=> echo "$a $hello";

    $num1 = 1;
    $num2 = 2;
    echo $num1 + $num2;
?>