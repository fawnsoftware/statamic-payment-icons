<?php

namespace FawnSoftware\StatamicPaymentIcons\Tests;

use FawnSoftware\StatamicPaymentIcons\ServiceProvider;
use Statamic\Testing\AddonTestCase;

abstract class TestCase extends AddonTestCase
{
    protected string $addonServiceProvider = ServiceProvider::class;
}
