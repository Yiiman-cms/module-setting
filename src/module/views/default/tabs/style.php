<?php
	/**
	 * @var \YiiMan\Setting\module\components\Options    $options
	 * @var                       \yii\widgets\ActiveForm $form
	 * @var                       \yii\base\DynamicModel  $model
	 */
	
	use YiiMan\Setting\module\widgets\ImageField;
	use YiiMan\Setting\module\widgets\SwitchField;
	use system\widgets\imageSelect\ImageSelectWidget;
	use system\widgets\toggle\ToggleWidget;

?>
<div class="tab-pane" id="style">
	<div style="margin: -10px -12.5px -10px -10px;padding: 10px;">
		<div class="card" style="margin-top: 20px">
			<h3><?= Yii::t( 'settings' , 'admin panel style Settings' ) ?></h3>
            <div class="col-md-12">
                <?php ImageField::run($form, $model, 'pattern', 'پترن پشت زمینه ی ادمین را اینجا وارد کنید') ?>
            </div>
			<div class="row" style="margin-top: 20px">
				<div class="col-md-12">
					<?php SwitchField::run(
						$form ,
						$model ,
						'bubble' ,
						[
							'label' => Yii::t( 'settings' , 'حباب های پشت زمینه' ) ,
							'hint'  => Yii::t(
								'settings' ,
								'با روشن کردن این بخش، در پشت صفحه حباب های لغزان به صورت گرافیکی نمایان خواهد شد، که جنبه ی زیبایی دارد'
							)
						]
					) ?>
				</div>
			</div>
			
			<div class="row" style="margin-top: 20px">
				<div class="col-md-12">
                    <?php
                    $itemsCount=49;
                    $items=[];
                    for ($i=1;$i<$itemsCount+1;$i++){
                        $items['/assets/images/admin/'.$i.'.jpg']='/assets/images/admin/'.$i.'.jpg';
                    }
                    ?>
                    <?= $form->field( $model , 'bgImage' )->widget(
                        ImageSelectWidget::className() ,
                        [
                            'images' =>$items
                        ]
                    )->label( Yii::t( 'settings' , 'انتخاب تصویر پس زمینه ی پنل' ) )->hint(
                        Yii::t(
                            'settings' ,
                            'انتخاب کنید چه تصویر در پس زمینه ی پنل مدیریت نمایش داده شود'
                        )
                    ) ?>
				</div>
			</div>
		
		</div>
	</div>
</div>
