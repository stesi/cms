# CMS

CMS base module for STeSI.erp

--------

Add package: `"stesi/cms": "dev-master"` to composer.json (or version instead of dev-master if package have been released)

Add module in `config/web.php` AND `config/console.php`:

```php
'module' => [
    // other modules
    'cms' => [
        'class' => 'stesi\modules\cms\Module',
    ],
    // other modules
],
```

Run migration from console: `yii cms/migrate`
