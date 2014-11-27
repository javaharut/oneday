<?php
/* @var $transactions Transaction */

?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="language" content="en"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<style>
    .arm {
        font-family: Verdana;
    }
</style>
<?php if(isset($user)):?>

<h4 class="arm"> <?=$user->name . ' ' . $user->lname ?> Օգտատիրոջ գործողությունների պատմությունը</h4>
<h3>Օգտատիրոջ ID-ն - <?=$user->id ?></h3>

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


    <?php /*if(!isset($user)):*/?>
        <br>
        <div class="row">
            <div class="col-md-12">
                <a href="<?=Yii::app()->baseUrl?>/transaction/print/<?=$transaction->user_id?>" class="btn btn-info  pull-right" target="_blank">Print</a>
            </div>
        </div>

  <!--  --><?php /*endif */?>

</div>

</body>