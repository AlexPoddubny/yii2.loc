<?php
	
	use app\modules\admin\models\Category;
	use app\widgets\MenuWidget;
	use yii\helpers\ArrayHelper;
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

	<div class="form-group field-category-parent_id">
		<label class="control-label" for="category-parent_id">Parent ID</label>
		<select id="category-parent_id" class="form-control" name="Category[parent_id]">
			<option value="0">Single category</option>
			<?=MenuWidget::widget([
				'tpl' => 'select',
				'model' => $model,
			])?>
		</select>
	</div>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
