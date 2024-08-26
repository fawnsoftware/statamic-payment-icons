<?php

namespace Arrowtide\StatamicPaymentIcons\Dictionaries;

use Statamic\Dictionaries\BasicDictionary;
use Statamic\Facades\File;
use Statamic\Facades\URL;
use Statamic\Support\Str;
use Stringy\StaticStringy;

class PaymentIcons extends BasicDictionary
{

    protected function getItemLabel(array $item): string
    {
        $style = 'display: flex; align-items: center; gap: 0.6rem; margin-top: 0.4rem; margin-bottom: 0.4rem;';
        $spanStyle = 'border: 2px solid #00000017; display: flex; border-radius: 7px; overflow: hidden;';

        return "<span style=\"{$style}\"><span style=\"{$spanStyle}\">{$item['icon']}</span> {$item['label']}</span>";
    }

    protected function getItems(): array
    {
        $payments = [
            ['label' => 'Afterpay', 'name' => 'Afterpay', 'value' => 'afterpay'],
            ['label' => 'Alipay', 'name' => 'Alipay', 'value' => 'alipay'],
            ['label' => 'Amazon', 'name' => 'Amazon', 'value' => 'amazon'],
            ['label' => 'Apple Pay', 'name' => 'Apple Pay', 'value' => 'apple_pay'],
            ['label' => 'Blik', 'name' => 'Blik', 'value' => 'blik'],
            ['label' => 'Boleto', 'name' => 'Boleto', 'value' => 'boleto'],
            ['label' => 'Cashapp Pay', 'name' => 'Cashapp Pay', 'value' => 'cashapp_pay'],
            ['label' => 'Dankort', 'name' => 'Dankort', 'value' => 'dankort'],
            ['label' => 'Diners Club', 'name' => 'Diners Club', 'value' => 'diners_club'],
            ['label' => 'Discover', 'name' => 'Discover', 'value' => 'discover'],
            ['label' => 'elo', 'name' => 'elo', 'value' => 'elo'],
            ['label' => 'Facebook Pay', 'name' => 'Facebook Pay', 'value' => 'facebook_pay'],
            ['label' => 'Forbrugsforeningen', 'name' => 'Forbrugsforeningen', 'value' => 'forbrugsforeningen'],
            ['label' => 'Google Pay', 'name' => 'Google Pay', 'value' => 'google_pay'],
            ['label' => 'Grab', 'name' => 'Grab', 'value' => 'grab'],
            ['label' => 'ideal', 'name' => 'ideal', 'value' => 'ideal'],
            ['label' => 'JCB', 'name' => 'JCB', 'value' => 'jcb'],
            ['label' => 'Kakao Pay', 'name' => 'Kakao Pay', 'value' => 'kakao_pay'],
            ['label' => 'Klarna', 'name' => 'Klarna', 'value' => 'klarna'],
            ['label' => 'Link Pay', 'name' => 'Link Pay', 'value' => 'link_pay'],
            ['label' => 'Maestro', 'name' => 'Maestro', 'value' => 'maestro'],
            ['label' => 'Mastercard', 'name' => 'Mastercard', 'value' => 'mastercard'],
            ['label' => 'oxxo', 'name' => 'oxxo', 'value' => 'oxxo'],
            ['label' => 'Paypal Logo', 'name' => 'Paypal', 'value' => 'paypal'],
            ['label' => 'Paypal', 'name' => 'Paypal', 'value' => 'paypal_alt'],
            ['label' => 'Paysafe Card', 'name' => 'Paysafe Card', 'value' => 'paysafe_card'],
            ['label' => 'Paysafe', 'name' => 'Paysafe', 'value' => 'paysafe'],
            ['label' => 'Pix', 'name' => 'Pix', 'value' => 'pix'],
            ['label' => 'Samsung Pay', 'name' => 'Samsung Pay', 'value' => 'samsung_pay'],
            ['label' => 'Shop Pay', 'name' => 'Shop Pay', 'value' => 'shop_pay'],
            ['label' => 'Skrill', 'name' => 'Skrill', 'value' => 'skrill'],
            ['label' => 'Stripe', 'name' => 'Stripe', 'value' => 'stripe'],
            ['label' => 'tabby', 'name' => 'tabby', 'value' => 'tabby'],
            ['label' => 'Trustly', 'name' => 'Trustly', 'value' => 'trustly'],
            ['label' => 'Twint', 'name' => 'Twint', 'value' => 'twint'],
            ['label' => 'Union Pay', 'name' => 'Union Pay', 'value' => 'union_pay'],
            ['label' => 'Venmo', 'name' => 'Venmo', 'value' => 'venmo'],
            ['label' => 'Visa', 'name' => 'Visa', 'value' => 'visa'],
            ['label' => 'Wechat Pay', 'name' => 'Wechat Pay', 'value' => 'wechat_pay'],
            ['label' => 'American Express', 'name' => 'American Express', 'value' => 'amex'],
        ];

        $cascade = [
            resource_path('svg/payment-icons'),
            __DIR__.'/../../icons/',
        ];

        $payments = collect($payments)->map(function ($payment) use ($cascade) {
            $fileName = Str::ensureRight($payment['value'], '.svg');
    
            foreach ($cascade as $location) {
                $file = Url::assemble($location, $fileName);
                if (File::exists($file)) {
                    $payment['icon'] = StaticStringy::collapseWhitespace(File::get($file));

                    break;
                }
            }
        
            return $payment;
            
        })->sortBy('name', SORT_NATURAL|SORT_FLAG_CASE)->values()->all();

        return $payments;
    }
}
