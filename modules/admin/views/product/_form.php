<?php
	
	use app\widgets\MenuWidget;
	use mihaildev\ckeditor\CKEditor;
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

	<div class="form-group field-product-category_id">
		<label class="control-label" for="product-category_id">Category</label>
		<select id="product-category_id" class="form-control"
		        name="Product[category_id]">
			<?=MenuWidget::widget([
				'tpl' => 'select_product',
				'model' => $model,
			])?>
		</select>
	</div>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->widget(CKEditor::className(),[
	    'editorOptions' => [
		    'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
		    'inline' => false, //по умолчанию false
	    ],
    ]); ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'img')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hit')->checkbox([ '0', '1', ]) ?>

    <?= $form->field($model, 'new')->checkbox([ '0', '1', ]) ?>

    <?= $form->field($model, 'sale')->checkbox([ '0', '1', ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>