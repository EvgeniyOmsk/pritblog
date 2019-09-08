<?php
/**
 * @var array $statusesItems
 * @var \common\models\Blog $model
 */

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use dosamigos\selectize\SelectizeTextInput;

?>
<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"><?= $model->isNewRecord? 'Create' : 'Update' ?> blog</h3>
      </div>
      <div class="box-body">
        <div class="col-md-offset-3 col-md-6">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'title')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'description')->textarea(['rows' => 10]) ?>

            <?= $form->field($model, 'status')->dropDownList($statusesItems) ?>

            <?= $form->field($model, 'tagNames')->widget(SelectizeTextInput::className(), [
                // calls an action that returns a JSON object with matched
                // tags
                'loadUrl' => ['tag/list'],
                'options' => ['class' => 'form-control'],
                'clientOptions' => [
                    'plugins' => ['remove_button'],
                    'valueField' => 'name',
                    'labelField' => 'name',
                    'searchField' => ['name'],
                    'create' => true,
                ],
            ])->hint('Use commas to separate tags') ?>

          <div class="form-group">
              <?= Html::submitButton($model->isNewRecord? 'Create' : 'Update', ['class' => 'btn btn-primary']) ?>
              <?= Html::a( 'Cancel',\yii\helpers\Url::to('index'), ['class' => 'btn btn-default pull-right']) ?>
          </div>

            <?php ActiveForm::end(); ?>
        </div>
      </div>
    </div>
  </div>
</div>