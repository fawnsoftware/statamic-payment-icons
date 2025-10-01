<?php

namespace Fawn\StatamicPaymentIcons;

use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{
    protected $dictionaries = [
        Dictionaries\PaymentIcons::class,
    ];

    public function bootAddon()
    {
        //
    }
}
