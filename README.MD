#### [Добавление нового package](https://tomasvotruba.com/blog/2017/12/25/composer-local-packages-for-dummies/):

1. Создать новый package:
```
/packages
+   /file-system
+       /src
```

2. Создать новый класс в package директории:
```
/packages
    /file-system
        /src
+           FileSystem.php
```

При этом первая часть нэймспэйса должна быть **Jeeves**, вторая - название пакета в формате **CamelCaps**
:
```php
namespace Jeeves\FileSystem;

final class FileSystem
{
    public function readFile(string $filePath): void
    {
        // ...
    }
}
```

3. Добавить изменения в `composer.json`:
```json
{
  "autoload": {
    "psr-4": {
      "Jeeves\\FileSystem\\": "packages/file-system/src/"
    }
  },
  "autoload-dev": {
    "psr-4": {
      "Jeeves\\FileSystem\\Tests\\": "packages/file-system/tests/"
    }
  }
}
```
4. Выполнить
```
composer dump-autoload
   ```
5. Добавить префикс для контроллеров в `packages/file-system/config/routes.yaml`:
```yaml
file-system:
  resource: '../src/Controller/'
  type: annotation
  prefix: /file-system
  name_prefix: file-system_
```

6. Добавить путь для шаблонов twig в `packages/file-system/config/packages/twig.yaml`:
```yaml
  twig:  
    paths:
      'packages/file-system/templates': 'file-system'
```

7. Done!