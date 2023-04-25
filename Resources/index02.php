<meta charset="utf-8">
<hr>第1題<br>
<?php

    $n=3;
    $ans=0;
    for($i=1; $i<=$n; $i++){
        $ans+=$i*($i+1);
    }
    echo $ans;
?>

<hr>第2題<br>
<?php
    $n=2;
    $ans=0;
    for($i=1; $i<=$n; $i++){
        $ans+=1/((2*$i-1)*(2*$i));
    }
    echo number_format($ans, 3);
?>

<hr>第3題<br>
<?php
    $n=2;
    $ans=0;
    for($i=1; $i<=$n; $i++){
        $ans+=pow(2,$i);
    }
    echo $ans;
?>