# CMS 

###e CMS base module for STeSI.erp

--------

Add package: `"stesi/cms": "*"` to composer.json (or version instead of dev-master if package have been released)

Add module in `config/web.php` AND `config/console.php`:

```php
'module' => [
    // other modules
    'cms' => [
        'class' => 'stesi\cms\Module', 
    ],
    // other modules
],
```

123Run migration from console: `yii migrate --migrationPath=vendor/stesi-modules/cms/src/migrations`
