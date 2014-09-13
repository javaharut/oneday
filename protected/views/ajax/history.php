<?php
/* @var $transactions Transaction */

?>


<div id="yw2" class="grid-view">
    <table class="items table table-bordered">
        <thead>
        <tr>
            <th id="yw2_c0">#</th><th id="yw2_c1">Amount</th><th id="yw2_c2">Date</th></tr>
        </thead>
        <tbody>
        <?php $i =1; foreach($transactions as $transaction):
                $type = "even";
                if($i % 2 == 1)
                    $type = "odd";
            ?>
            <tr class="<?=$type?>">
                <td style="width: 60px"><?=$i?></td><td><?=$transaction->amount?></td><td><?=$transaction->date?></td></tr>
        <?php $i++; endforeach; ?>
        </tbody>
    </table>
</div>