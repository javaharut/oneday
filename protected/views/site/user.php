<?php


$this->widget('booster.widgets.TbGridView', array(
    'type' => 'striped bordered condensed',
    'dataProvider' => $user->search(),
  //  'template' => "{items}",
    'filter' => $user,
    'columns'=>array(
        'id',
        'parent_id',
        'name',
        'lname',
        'phone',
        'passport',
		'email',
		'reg_date',
		'balance',
		'username',
    ),

    //'columns' => $gridColumns,
));

?>
