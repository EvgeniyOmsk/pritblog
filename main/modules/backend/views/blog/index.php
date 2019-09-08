<?php
use yii\grid\GridView;
?>
<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Blog list</h3>
        <a href="<?= \yii\helpers\Url::to('update') ?>" class="pull-right btn btn-success">Create</a>
      </div>
      <div class="box-body">
        <div class="col-md-offset-2 col-md-8">
            <?php
            echo GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    'id',
                    'title',
                    'description',
                    [
                        'label' => 'tags',
                        'attribute' => 'tags',
                        'value'=>function ($model, $key, $index, $widget ) {
                            $tagsByModel = \yii\helpers\ArrayHelper::map($model->tags, 'id', 'name');
                            return implode(",", $tagsByModel); //вывод тегов
                        },
                        'filter'=> $tags,
                    ],

                    ['class' => 'yii\grid\ActionColumn', 'template'=>'{update}{delete}',],
                ],
            ]);
            ?>
        </div>
      </div>
    </div>
  </div>
</div>