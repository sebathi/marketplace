<?php
namespace mp\components;

class Application extends \yii\web\Application
{

    /**
     * Constructor.
     * @param array $config name-value pairs that will be used to initialize the object properties.
     * Note that the configuration must contain both [[id]] and [[basePath]].
     * @throws InvalidConfigException if either [[id]] or [[basePath]] configuration is missing.
     */
    public function __construct($config = [])
    {
        $arr =  \yii\helpers\ArrayHelper::merge(
            $config,
            $this->loadDynamicConfiguration($config)
        );
        return parent::__construct(
           $arr
        );
    }

    /**
     * return array
     */
    private function loadDynamicConfiguration($config)
    {
        $bp = $config['basePath'];

        $dynamicConf = [];
        //load dynamic modules
        if (file_exists($bp . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'modules.php')) {
            $dynamicConf['modules'] = require_once($bp . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'modules.php');
        }
        return $dynamicConf;
    }
}