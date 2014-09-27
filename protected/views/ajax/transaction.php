<?php

/** @var TbActiveForm $form */
?>

<h2>User id <?=$user->id?></h2>
<p>
    Add amount money you want to add
</p>

<form class="well form-inline" id="inlineForm" action="" method="post">
    <div class="form-group">
        <input class="form-control" placeholder="Amount" name="Transaction[amount]" id="amount" type="number" min="0">
    </div>
    <button type="button" class="btn btn-sm btn-success add" data-value="<?=$user->id?>">
        Add
    </button>
    <button type="button" class="btn btn-sm btn-default subtract" data-value="<?=$user->id?>">
        Remove
    </button>

</form>

<script>
    $(document).ready(function(){
        $('.add').click(function(){

            if($('#inlineForm')[0].checkValidity() == true && $('#amount').val() != "") {
                $.ajax({
                    type:'POST',
                    data:{id:$(this).attr('data-value'), amount:$('#amount').val()},
                    url:'<?=Yii::app()->baseUrl?>/ajax/addmoney',
                    success:function(result){
                        openDialog(result);
                    }
                });
            }
            else {

            }
        });

        var max = <?=$user->balance?>;
        $('.subtract').click(function(){

            var amount = $('#amount').val();

            if (amount > max){
                openDialog("Etqan pox chka hashvi vra!!!");
                return false;
            }
            max -= amount;

            $.ajax({
                type:'POST',
                data:{id:$(this).attr('data-value'), amount:amount},
                url:'<?=Yii::app()->baseUrl?>/ajax/subtractmoney',
                success:function(result){
                    openDialog(result);
                }
            });
        });

    });
</script>