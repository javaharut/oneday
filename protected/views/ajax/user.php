<?php
/* @var user User */

?>




<h1>User Id <?=$user->id?></h1>

<?php
$this->widget(
    'booster.widgets.TbDetailView',
    array(
        'data' => $user,
    )
);
?>