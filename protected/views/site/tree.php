<?php
    /* @var  $users  User[] */

    Yii::app()->getclientscript()->registerCssFile(Yii::app()->baseUrl."/css/tree.css");

function drawTree($users) {
    echo "<ul>";
    foreach($users->users as $user) {
        echo "<li><span><i class='glyphicon-minus'></i> $user->username </span>\n";
        if(!empty($user->users))
            drawTree($user);
        echo "</li>\n";
    }
    echo "</ul>\n";
}
?>

<div class="panel panel-default">
    <div class="panel-heading-small2"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseDVR3">
            <h4 class="panel-title">
                Users
            </h4>
        </a>

    </div>
    <div id="collapseDVR3" class="panel-collapse collapse in">
        <div class="tree ">

           <?php drawTree($users); ?>

        </div>
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
                $(this).attr('title', 'Collapse this branch').find(' > i').addClass('glyphicon-minus').removeClass('glyphicon-plus');
            }
            e.stopPropagation();
        });
    });
</script>