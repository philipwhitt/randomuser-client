[![Build Status](https://drone.io/github.com/philipwhitt/randomuser-client/status.png)](https://drone.io/github.com/philipwhitt/randomuser-client/latest)

# PHP Random User Generator

Install
-------
Install via composer
```javascript
{
	"require": {
		"randomuser/generator"  : "1.0.*"
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


Helpful Links
-------------

More examples:
http://www.philipwhitt.com/blog/2014/09/php-random-user-generator/40

Randomuser.me Documentation:
http://randomuser.me/documentation.html
