# How to use this SDK?

```
need:
  PHP => 8.0
```

### You only need to use the following code to complete simple access!

*Put sdk.php under the same level directory of this file*

```php
<?php

require 'sdk.php';
//$chatID is telegram User Chat ID
if (!AntiSougouSGKBot::Captcha($chatID)){
  exit();
  //If it returns a null value (0), the user is a member of the Sogou social engineering information database supergroup
}
```
