<?php
	/**
	 * Created by YiiMan.
	 * Programmer: gholamreza beheshtian
	 * Mobile:09353466620
	 * Site:http://yiiman.ir
	 * Date: ۱۷/۰۴/۲۰۲۰
	 * Time: ۰۳:۴۹ قبل‌ازظهر
	 */
	
	namespace YiiMan\Setting\assets;
	
	
	use yii\web\AssetBundle;
	
	class ImageSelectAsset extends AssetBundle {
		public $sourcePath = __DIR__.'/files';
		public $js =
			[
				'jquery.imgcheckbox.js'
			];
		
		public $depends = [
			'yii\web\YiiAsset' ,
			'yii\bootstrap\BootstrapAsset' ,
		];
	}
