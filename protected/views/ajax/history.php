<?php
/* @var $transactions Transaction */

?>

<?php if(isset($user)):?>

<h4>Transaction History for <?=$user->name . ' ' . $user->lname ?></h4>
<h3>ID - <?=$user->id ?></h3>

<?php endif ?>
<div id="yw2" class="grid-view">
    <table class="items table table-bordered">
        <thead>
        <tr>
            <th id="yw2_c0">#</th>
            <th id="yw2_c1">Amount</th>
            <th id="yw2_c2">Date</th>
            <th id="yw2_c2">Type</th>
        </tr>
        </thead>
        <tbody>
        <?php $i =1; foreach($transactions as $transaction):
                $type = "even";
                if($i % 2 == 1)
                    $type = "odd";
            ?>
            <tr class="<?=$type?>">
                <td style="width: 60px"><?=$i?></td>
                <td><?=$transaction->amount?></td>
                <td><?=$transaction->date?></td>
                <td><?=$transaction->ctype?></td>
            </tr>
        <?php $i++; endforeach; ?>
        </tbody>
    </table>


    <?php if(!isset($user)):?>
        <br>
        <div class="row">
            <div class="col-md-12">
                <a href="<?=Yii::app()->baseUrl?>/transaction/print/<?=$transaction->user_id?>" class="btn btn-info  pull-right" target="_blank">Print</a>
            </div>
        </div>

    <?php endif ?>

</div>