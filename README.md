Yii2 maintenance mode
=====================
Yii2 维护模式

Installation
------------

Download the latest release from here [releases](https://github.com/KillMeAgain/yii2-maintenance/releases), then extract it to your project.
In your application config, add the path alias for this extension.
```php
return [
    ...
    'aliases' => [
        '@bigm/log' => 'path/to/your/extracted',
        // for example: '@bigm/log' => '@app/vendor/yiisoft/yii2-log',
        ...
    ]
    ...
    'as maintenance' => [
        'class' => 'bigm\mainten\behaviors\Mainten',
        ...
    ],
    ...
];
```

Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?= 

```