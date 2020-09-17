<?php

use yii\grid\GridView;
use app\models\Credit;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider \yii\data\ActiveDataProvider */
?>
<div>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => false,
        'id' => 'credit-grid',
        'columns' => [
            'start_date',
            'value',
            'month_count',
            'percent',
            [
                'header' => 'Action',
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view-graph}',
                'buttons' => [
                    'view-graph' => function ($url, Credit $model, $key) {
                        $link = Html::a('View payment graph', $url, []);
                        return $link;
                    },
                ]
            ],
        ],
    ]); ?>
</div>
