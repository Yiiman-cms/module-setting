<?php
	/**
	 * Created by YiiMan TM.
	 * Programmer: gholamreza beheshtian
	 * Mobile:09353466620
	 * Company Phone:05138846411
	 * Site:https://yiiman.ir
	 * Date: ۰۲/۲۲/۲۰۲۰
	 * Time: ۱۱:۱۶ قبل‌ازظهر
	 */
	
	namespace YiiMan\Setting\widgets;
	
	
	use YiiMan\Setting\widgets\ToggleWidget;
	
	class SwitchField {
		public static function run( $form , $model , $attribute , array $options ) {
			if ( empty( $options['label'] ) ) {
				$options['label'] = null;
			}
			if ( empty( $options['hint'] ) ) {
				$options['hint'] = null;
			}
			echo $form->field( $model , $attribute )
			          ->widget( ToggleWidget::className() )
			          ->label( $options['label'] )
			          ->hint(
				          $options['hint']
			          );
		}
	}
