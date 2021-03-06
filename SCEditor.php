<?php
namespace rikcage\sceditor;

use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\InputWidget;

class SCEditor extends InputWidget
{
    public $clientOptions = [];
    
    public function init()
    {
        parent::init();
    }
    
    public function run()
    {
        if ($this->hasModel()) {
            echo Html::activeTextarea($this->model, $this->attribute, $this->options);
        } else {
            echo Html::textarea($this->name, $this->value, $this->options);
        }
        
        $this->registerClientScript();
    }
    
    protected function registerClientScript()
    {
        $js = [];
        
        $view = $this->getView();
        
        $assetBundle = SCEditorAsset::register($view);
        
        $id = $this->options['id'];
        
        // Create the default path for emoticons
        if(!isset($this->clientOptions['emoticonsRoot'])){
            $this->clientOptions['emoticonsRoot'] = $assetBundle->baseUrl."/";
        }
        
        // Register the CSS file defined in clientOptions
        if (isset($this->clientOptions['style'])) {
            $styleFile = "{$this->clientOptions['style']}";
            $assetBundle->css[] = $styleFile;
        }
        
        // Register the language translation file defined in clientOptions
        if (isset($this->clientOptions['locale'])) {
            $languageFile = "languages/{$this->clientOptions['locale']}.js";
            $assetBundle->js[] = $languageFile;
        }
        
        // Create the JavaScript code with the clientOptions parameters
        $options = $this->clientOptions !== false && !empty($this->clientOptions)
                ? Json::encode($this->clientOptions)
                : '{}';
        
        $js[] = "$('#{$id}').sceditor({$options});";
        
        $view->registerJs(implode("\n", $js));
    }
}
