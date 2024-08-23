<?php

namespace Arrowtide\StatamicPaymentIcons\Tests;

use Arrowtide\StatamicPaymentIcons\ServiceProvider;
use Statamic\Testing\AddonTestCase;

abstract class TestCase extends AddonTestCase
{
    protected string $addonServiceProvider = ServiceProvider::class;
}
