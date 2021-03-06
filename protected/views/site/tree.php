<?php
    /* @var  $users  User[] */

    Yii::app()->getclientscript()->registerCssFile(Yii::app()->baseUrl."/css/tree.css");
    Yii::app()->getclientscript()->registerCssFile(Yii::app()->baseUrl."/css/x/font-awesome.min.css");

$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'infoDialog',
// additional javascript options for the dialog plugin
    'options'=>array(
        'title'=>'Info',
        'autoOpen'=>false,
        'buttons' => array(
            array('text'=>'OK','click'=> 'js:function(){$(this).dialog("close");}'),
        ),
    ),
));

echo '<div id="dialog_content">Opened dialog</div>';

/*echo "<pre>";
print_r(Yii::app()->user->role);
exit;*/

$this->endWidget('zii.widgets.jui.CJuiDialog');


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
            <button  type='button' class='btn btn-default history' data-value="<?=$user->id?>">
                <i class="glyphicon glyphicon-list"></i>
            </button>
            <a href="<?=Yii::app()->baseUrl?>/site/edituser/<?=$user->id?>">
                <button  type='button' class='btn btn-primary'>
                    <i class="glyphicon glyphicon-pencil"></i>
                </button>
            </a>

            <a href="<?=Yii::app()->baseUrl?>/site/createuser/<?=$user->id?>">
                <button  type='button' class='btn btn-warning'>
                    <i class="glyphicon glyphicon-user"></i>
                </button>
            </a>

            <?php if(empty($user->users)):?>
                <button type="button" class="btn btn-danger remove" data-value="<?=$user->id?>">
                    <i class="glyphicon glyphicon-remove"></i>
                </button>
            <?php endif ?>

       <?php if(!empty($user->users))
            drawTree($user);
        ?>
        </li>
    <?php endforeach ?>
    </ul>
<?php } ?>

<div class="clearfix"></div>
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
                    <li><span><i class='glyphicon-minus'></i></span>
                        <button type='button' class='btn btn-info btn-sm more'>
                            <input type ='hidden' value='<?=$users->id?>' />
                            <?=$users->id?>
                        </button>
                        <button  type='button' class='btn btn-success transaction' data-value="<?=$users->id?>">
                            <i class="glyphicon glyphicon-usd"></i>
                        </button>
                        <button  type='button' class='btn btn-default history' data-value="<?=$users->id?>">
                            <i class="glyphicon glyphicon-list"></i>
                        </button>
                        <a href="<?=Yii::app()->baseUrl?>/site/edituser/<?=$users->id?>">
                            <button  type='button' class='btn btn-primary'>
                                <i class="glyphicon glyphicon-pencil"></i>
                            </button>
                        </a>

                        <a href="<?=Yii::app()->baseUrl?>/site/createuser/<?=$users->id?>">
                            <button  type='button' class='btn btn-warning'>
                                <i class="glyphicon glyphicon-user"></i>
                            </button>
                        </a>


                        <?php if(empty($users->users)):?>
                            <button type="button" class="btn btn-danger remove" data-value="<?=$users->id?>">
                                <i class="glyphicon glyphicon-remove"></i>
                            </button>
                            </li>
                        <?php endif ?>
                   <?php drawTree($users); ?>
                        </ul>
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


            var password = prompt("Մուտքագրել գաղտնաբառը");

            if(password != "odclub159")
            return false;



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

        $(document).on('click', '.transaction', function(){
            $.ajax({
                type:'POST',
                data:{id:$(this).attr('data-value')},
                url:'<?=Yii::app()->baseUrl?>/ajax/transaction',
                success:function(result){
                    //alert(result);
                    $('.user').html(result);
                }
            });
        });

        $(document).on('click', '.history', function(){
            $.ajax({
                type:'POST',
                data:{id:$(this).attr('data-value')},
                url:'<?=Yii::app()->baseUrl?>/ajax/history',
                success:function(result){
                    $('.user').html(result);
                }
            });
        });

    });

     var openDialog = function(text){
                    $("#dialog_content").html(text);
                    $("#infoDialog").dialog("open");
                    return false;
     }



</script>