<?php
    /* @var  $users  User[] */

    Yii::app()->getclientscript()->registerCssFile(Yii::app()->baseUrl."/css/tree.css");
    Yii::app()->getclientscript()->registerCssFile(Yii::app()->baseUrl."/css/x/font-awesome.min.css");

function drawTree($users) {
    echo "<ul>";
    foreach($users->users as $user) :?>
        <li><span><i class='glyphicon-minus'></i></span>
            <button type='button' class='btn btn-info btn-sm more'>
                <input type ='hidden' value='<?=$user->id?>' />
                <?=$user->id?>
           </button>
            <button  type='button' class='btn btn-success transaction' data-value="<?=$user->id?>">
                <i class="glyphicon glyphicon-usd"></i>
            </button>
            <a href="<?=Yii::app()->baseUrl?>/site/edituser/<?=$user->id?>">
                <button  type='button' class='btn btn-primary'>
                    <i class="glyphicon glyphicon-pencil"></i>
                </button>
            </a>
            <?php if(empty($user->users)):?>
                <button type="button" class="btn btn-danger remove" data-value="<?=$user->id?>">
                    <i class="glyphicon glyphicon-remove"></i>
                </button>
            <?php endif ?>
        <?php if(Yii::app()->user->role == User::ADMIN):?>
            <button type='button' class='btn btn-info edit'><i class='icon-edit'></i></button>
        <?php endif ?>


       <?php if(!empty($user->users))
            drawTree($user);
        ?>
        </li>
    <?php endforeach ?>
    </ul>
<?php } ?>
<div class="row">
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading-small2"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseDVR3">
                    <h4 class="panel-title">
                        Users
                    </h4>
                </a>

            </div>
            <div id="collapseDVR3" class="panel-collapse collapse in">
                <div class="tree">

                   <?php drawTree($users); ?>

                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 user">

    </div>
</div>

<script>
    $(function () {
        $('.tree li:has(ul)').addClass('parent_li').find(' > span').attr('title', 'Collapse this branch');
        $('.tree li.parent_li > span').on('click', function (e) {
            var children = $(this).parent('li.parent_li').find(' > ul > li');
            if (children.is(":visible")) {
                children.hide('fast');
                $(this).attr('title', 'Expand this branch').find(' > i').addClass('glyphicon-plus').removeClass('glyphicon-minus');
            } else {
                children.show('fast');
                children.each(function(){
                    $(this).removeAttr("style");
                })
                $(this).attr('title', 'Collapse this branch').find(' > i').addClass('glyphicon-minus').removeClass('glyphicon-plus');
            }
            e.stopPropagation();
        });
    });

    $(document).ready(function(){
        $(document).on('click', '.more', function(){
            var cbutton = $(this);
            $(this).addClass('loading');
            $.ajax({
                type:'POST',
                data:{id:$(this).children("input").val()},
                url:'<?=Yii::app()->baseUrl?>/ajax/user',
                success:function(result){
                    $('.user').html(result);
                    cbutton.removeClass("loading");
                }
            });
        });

        $(document).on('click', '.remove', function(){
            $.ajax({
                type:'POST',
                data:{id:$(this).attr('data-value')},
                url:'<?=Yii::app()->baseUrl?>/ajax/deleteuser',
                success:function(result){
                    if(result == "1"){
                        alert("User deleted successfully");
                        location.reload();
                    }
                    else
                        alert("Something is wrong please try again");
                }
            });
        });

    });

    $(document).on('click', '.transaction', function(){
        $.ajax({
            type:'POST',
            data:{id:$(this).attr('data-value')},
            url:'<?=Yii::app()->baseUrl?>/ajax/transaction',
            success:function(result){
                alert(result);
            }
        });
    });

    });

</script>