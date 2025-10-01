<?php

namespace Fawn\StatamicPaymentIcons\Tests;

use Fawn\StatamicPaymentIcons\ServiceProvider;
use Statamic\Testing\AddonTestCase;

abstract class TestCase extends AddonTestCase
{
    protected string $addonServiceProvider = ServiceProvider::class;
}
