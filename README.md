Yii2 CSV Export
===============
simple csv export

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist proximity/yii2-csv-export "*"
```

or add

```
"proximity/yii2-csv-export": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?= \proximity\csvexport\CsvExport::widget([
	'data'=>[]
]); ?>
```

## Collaborators
- @reymad