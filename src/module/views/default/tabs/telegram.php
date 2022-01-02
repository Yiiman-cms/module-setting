<?php
	/**
	 * Created by YiiMan TM.
	 * Programmer: gholamreza beheshtian
	 * Mobile:09353466620
	 * Company Phone:05138846411
	 * Site:https://yiiman.ir
	 * Date: ۰۳/۰۴/۲۰۲۰
	 * Time: ۰۵:۱۳ بعدازظهر
	 */
	
	use YiiMan\Setting\module\widgets\ImageField;
	use system\widgets\toggle\ToggleWidget; ?>
<div class="tab-pane" id="telegram">
	<div style="margin: -10px -12.5px -10px -10px;padding: 10px;">
		<div class="card" style="margin-top: 20px">
			<h3><?= Yii::t( 'settings' , 'Telegram Settings' ) ?></h3>
			
			<div class="row" style="margin-top: 20px">
				<div class="col-md-12">
					<?= $form->field( $model , 'telegramToken' )
					         ->textInput()
					         ->label( Yii::t( 'settings' , 'telegram token' ) )
					         ->hint(
						         Yii::t(
							         'settings' ,
							         'set telegram bot token that given from {bot} bot in telegram' ,
							         [ 'bot' => '<a href="https://t.me/BotFather" target="_blank">@botFather</a>' ]
						         )
					         );
					?>
				</div>
			</div>
			<div class="row" style="margin-top: 20px">
				<div class="col-md-4">
					<?= $form->field( $model , 'telegramBotUsername' )
					         ->textInput()
					         ->label( Yii::t( 'settings' , 'telegram bot name' ) )
					         ->hint( Yii::t( 'settings' , 'enter bot name with @' ) );
					?>
				</div>
			</div>
		</div>
	</div>
</div>

