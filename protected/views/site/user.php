<?php

/* @var $user User */

/*$this->widget(
    'booster.widgets.TbDetailView',
    array(
        'data' => $user
    )
);*/

$this->widget('booster.widgets.TbGridView', array(
    'type' => 'striped bordered condensed',
    'dataProvider' => $user->search(),
    'template' => "{items}",
    'filter' => $user,
    //'columns' => $gridColumns,
));

?>
