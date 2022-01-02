<?php

namespace YiiMan\Setting\module;


use Yii;
use yii\helpers\ArrayHelper;

class Module extends \yii\base\Module
{

    public $controllerNamespace = 'YiiMan\Setting\module\controllers';
    public $name = 'setting';
    public $uploadPath = '';
    public $nameSpace = 'YiiMan\Setting\module';
    public $config =
        [
            'namespace'      => 'YiiMan\Setting\module',
            'sourceLanguage' => 'en',
            'message'        =>
                [
                    'app-name',
                    'app-name-2'
                ]
        ];

    public function init()
    {
        $this->initModules();
//		$this->initMigrations();
        $this->registerTranslations();
        $this->initComponents();
    }

    /**
     * TranslationTrait manages methods for all translations used in Krajee extensions
     * @author Kartik Visweswaran <kartikv2@gmail.com>
     * @return void
     * @since  1.8.8
     *         Yii i18n messages configuration for generating translations
     *         source : https://github.com/kartik-v/yii2-krajee-base/blob/master/TranslationTrait.php
     *         Edited by : Yohanes Candrajaya <moo.tensai@gmail.com>
     * @property array $i18n
     */
    public function initI18N()
    {
        $reflector = new \ReflectionClass(get_class($this));
        $dir = dirname($reflector->getFileName());

        if (!empty($this->config['message'])) {
            foreach ($this->config['message'] as $message) {
                Yii::setAlias("@".$message, $dir);
                $config = [
                    'class'            => 'yii\i18n\PhpMessageSource',
                    'basePath'         => "@".$message."/messages",
                    'forceTranslation' => true
                ];
                $globalConfig = ArrayHelper::getValue(Yii::$app->i18n->translations, $message."*", []);
                if (!empty($globalConfig)) {
                    $config = array_merge($config, is_array($globalConfig) ? $globalConfig : (array) $globalConfig);
                }
                Yii::$app->i18n->translations[$message."*"] = $config;
            }
        }

    }

    protected function registerTranslations()
    {
        Yii::$app->i18n->translations[$this->name] = [
            'class'          => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => $this->config['sourceLanguage'],
            'basePath'       => '@system/modules/'.$this->name.'/messages',
            'fileMap'        => [
                'setting' => $this->name.'.php',
            ],
        ];
    }

    public function initComponents()
    {
        $Option =
            [
                'Options' => ['class' => 'YiiMan\Setting\module\components\Options'],
            ];


        //Yii::$app->components['pdf']= $pdf;
        Yii::$app->setComponents([$Option]);
    }

    public function initModules()
    {
        if (!empty($this->config['modules'])) {

            foreach ($this->config['modules'] as $key => $val) {
                $this->modules[$key] = $val;
            }
        }
    }


    public function getFileList($root, $basePath = '')
    {
        $files = [];
        $handle = opendir($root);
        while (($path = readdir($handle)) !== false) {
            if ($path === '.git' || $path === '.svn' || $path === '.' || $path === '..') {
                continue;
            }
            $fullPath = "$root/$path";
            $relativePath = $basePath === '' ? $path : "$basePath/$path";
            if (is_dir($fullPath)) {
                $files = array_merge($files, $this->getFileList($fullPath, $relativePath));
            } else {
                $files[] = $relativePath;
            }
        }
        closedir($handle);
        return $files;
    }



    public function initMigrations()
    {
        $classes = $this->getFileList(realpath(__DIR__.'/../migrations'));
        if (!empty($classes)) {
            foreach ($classes as $key => $val) {
                if ($val['type'] == 'text/x-php') {
                    $val['name'] = str_replace('.php', '', $val['name']);
                    $cname = $this->nameSpace.'\migrations\\'.$val['name'];
                    $class = new $cname();
                    try {
                        $generate = $class->safeUp();
                    } catch (\Exception $e) {
                    }


                }

            }
        }


    }

    /**
     * Translates a message. This is just a wrapper of Yii::t
     * @param         $category
     * @param         $message
     * @param  array  $params
     * @param  null   $language
     * @return string
     * @see Yii::t
     */
    public static function t($category, $message, $params = [], $language = null)
    {

        return Yii::t($category, $message, $params, $language);
    }
}
