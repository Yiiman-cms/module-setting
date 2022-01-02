<?php
	
	namespace YiiMan\Setting\module\controllers;

	use YiiMan\Setting\module\models\DynamicModel;
	use Yii;
	use yii\web\Controller;
	use yii\web\UploadedFile;
	use function file_get_contents;
	
	
	/**
	 * SettingsController implements the CRUD actions for Setting model.
	 *
	 * @author Aris Karageorgos <aris@phe.me>
	 */
	class DefaultController extends Controller {
		public $enableCsrfValidation = false;
		

		
		/**
		 * Lists all Settings.
		 * @return mixed
		 */
		public function actionIndex() {

			$options = \Yii::$app->Options;
			$model   = new DynamicModel( [ 'settings' ] );
			
			
			if ( Yii::$app->user->isGuest ) {
				return $this->redirect( [ '/site/login' ] );
			}
			
			
			/* < Load Model > */
			{
				$model->loadSettings(false);
			}
			/* </ Load Model > */
			$post = Yii::$app->request->post();
			if ( ! empty( $post ) ) {
				foreach ( $post as $key => $value ) {
					switch ( $key ) {
						case 'FrontendCustomCss':
//							$file = realpath( __DIR__ . '/../../../../frontend/assets/files/css/custom.css' );
//							file_put_contents( $file , $value );
							break;
						case 'FrontendCustomJs':
//							$file = realpath( __DIR__ . '/../../../../frontend/assets/files/js/custom.js' );
//							file_put_contents( $file , $value );
							break;
						default:
							Yii::$app->Options->set( $key ,$value );
					}
				}
			}

			
			/* < Load Model > */
			{
				$model->loadSettings();
			}
			/* </ Load Model > */
			

			$options->init();

			return $this->render(
				'index' ,
				[
					'options' => $options ,
					'model'   => $model
				]
			);
			
		}
		
		/**
		 * با اعلام نام آیتم موجود در فرم، فایل را گرفته و به صورت بیس 64 ذخیره می کند
		 */
		protected function saveFileBase64( $attribute ) {
			
			/* < Get File From Post And Save In server > */
			{
				$file = UploadedFile::getInstanceByName( $attribute );
				$path = realpath( __DIR__ . '/../files' ) . "/" . $attribute . '.base64';
				$file->saveAs( $path );
				$extention = $file->extension;
			}
			/* </ Get File From Post And Save In server > */
			
			
			/* < Convert To base64 > */
			{
				
				$file = file_get_contents( $path );
				$file = base64_encode( $file );
				$file = 'data:image/' . $extention . ';base64,' . $file;
			}
			/* </ Convert To base64 > */
			
			
			/* < Write To File > */
			{
				
				$myfile = fopen( $path , "w" ) or die( "به پوشه ی فایل ها یا خود فایل های ذخیره شده دسترسی نداریم." );
				fwrite( $myfile , $file );
				fclose( $myfile );
			}
			/* </ Write To File > */
		}
	}
