<?php
	/**
	 * Created by YiiMan TM.
	 * Programmer: gholamreza beheshtian
	 * Mobile:09353466620
	 * Company Phone:05138846411
	 * Site:https://yiiman.ir
	 * Date: ۰۲/۱۹/۲۰۲۰
	 * Time: ۱۹:۳۵ بعدازظهر
	 */
	
	namespace YiiMan\Setting\widgets;
	
	
	use Exception;
	use Yii;
	use yii\widgets\InputWidget;
	
	class ImageField {
		
		public static function run( $form , $model , $attr,$hint='' ) {
			try{
				$model->addRule( [ $attr ] , 'file' );
			}catch(Exception $e){}
			if ( ! empty(Yii::$app->Options->{$attr} ) ) {
				$model->{$attr} = Yii::$app->Options->{$attr};
				$val= Yii::$app->Options->{$attr};
			}
			echo $form->field( $model , $attr )->fileInput()->hint(
				$hint
			);
			echo MediaViewWidget::widget(
				[
					'model'     => $model ,
					'attribute' => $attr
				]
			) ?>
			<?php
		}
	}
