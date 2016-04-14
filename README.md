# devboxr/response-helper

A simple response helper that I use for my Laravel/Lumen 5+. Its very simple goal is to have unified responses across a specific project. I may implement a "Problem Details" inspired approach http://datatracker.ietf.org/doc/draft-nottingham-http-problem/.

### Installation

Composer install: `composer install devboxr/response-helper`

### Use

```php
<?php

use Devboxr\ResponseHelper;

/**
 * There are more examples and the ResponseHelper is extended all the time.
 */

// will return a status 200
ResponseHelper::success();

// will return a status 404
ResponseHelper::notFound();

 // will return a status 500
ResponseHelper::serverError();
ResponseHelper::serverError(500, ['error' => 'Could not contact external provider.']);
```
