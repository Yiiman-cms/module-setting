<?php
	/**
	 * Created by YiiMan TM.
	 * Programmer: gholamreza beheshtian
	 * Mobile:09353466620
	 * Company Phone:05138846411
	 * Site:https://yiiman.ir
	 * Date: 03/25/2020
	 * Time: 01:04 AM
	 */
	
	?>
<div class="tab-pane" id="sms">
	<div style="margin: -10px -12.5px -10px -10px;padding: 10px;">
		<div class="card" style="margin-top: 20px">
			<h3><?= Yii::t( 'settings' , 'SMS Settings') ?></h3>
			
			 <div class="row">
				 <div class="col-md-6">
					 <?php
						 $attr = 'smsAPI';
						 $model->addRule( [ $attr ] , 'required' );
						 $model->addRule( [ $attr ] , 'trim' );
						 $model->addRule( [ $attr ] , 'string' , [ 'max' => 50 ] );
						 echo $form->field( $model , $attr )->textInput()->hint(
							 Yii::t( 'settings' , 'Enter Sms Token From Kaveh Negar')
						 );
					 ?>
				 </div>
			 </div>
			 <div class="row">
				 <div class="col-md-6">
					 <?php
						 $attr = 'SMSLine';
						 $model->addRule( [ $attr ] , 'required' );
						 $model->addRule( [ $attr ] , 'trim' );
						 $model->addRule( [ $attr ] , 'string' , [ 'max' => 50 ] );
						 echo $form->field( $model , $attr )->textInput()->hint(
							 Yii::t( 'settings' , 'Enter Sms Number From Kaveh Negar')
						 );
					 ?>
				 </div>
			 </div>
			
		</div>
	</div>
</div>
