# PHP Random User Generator

Simple PHP client to api.randomuser.me
--------------------------------------------
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
