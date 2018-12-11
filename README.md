SCEditor Extension for Yii 2.0 Framework
========================================
SCEditor, a lightweight WYSIWYG BBCode & HTML editor extension for Yii 2.0 Framework

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

To install, either run

```
$ php composer.phar require rikcage/yii2-sceditor "*"
```

or add

```
"rikcage/yii2-sceditor": "*"
```

to the ```require``` section of your `composer.json` file.

Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
use rikcage\sceditor\SCEditor;

<?= $form->field($model, 'text')->widget(SCEditor::className(), [
        'options' => ['rows' => 6],
        'clientOptions' => [
            'format' => 'bbcode',
        ]
    ]) ?>
```

or

```php
use rikcage\sceditor\SCEditor;

<?= $form->field($model, 'text')->widget(SCEditor::className(), [
        'options' => ['rows' => 6],
        'clientOptions' => [
            'format' => 'xhtml',
        ]
    ]) ?>
```

Further Information
-----

Please, check the [SCEditor plugin site](http://www.sceditor.com/documentation/options/) documentation for further information about its configuration options.
