# PHP Random User Generator

Install
-------
Install via composer
```javascript
{
	"require": {
		"php"                   : ">=5.3",
		"randomuser/generator"  : "dev-master"
	}
}
```

Simple PHP client to randomuser.me
----------------------------------
Example:
```php
<?php

$gen = new \RandomUser\Generator();
$user = $gen->getUser();

print($user->getName());
```

See test/RandomUserTest.php for working examples

Unit Tests
----------
Run tests using:

	$ phpunit test
