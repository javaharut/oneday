<?php
$this->breadcrumbs = array(
    'Histories',
);

$this->menu = array(
    array('label' => 'Create History', 'url' => array('create')),
    array('label' => 'Manage History', 'url' => array('admin')),
);
?>

<h1>Histories</h1>

<?php $this->widget('booster.widgets.TbListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
)); ?>
