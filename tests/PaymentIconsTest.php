<?php

namespace Arrowtide\StatamicPaymentIcons\Tests;

use Arrowtide\StatamicPaymentIcons\Dictionaries\PaymentIcons;

class PaymentIconsTest extends TestCase
{
    public function test_payment_icons_items()
    {
        $paymentIcons = new PaymentIcons();
        $reflection = new \ReflectionClass($paymentIcons);
        $method = $reflection->getMethod('getItems');
        $method->setAccessible(true);
        $payments = $method->invoke($paymentIcons);

        foreach ($payments as $index => $payment) {
            $this->assertArrayHasKey('name', $payments[$index]);
            $this->assertArrayHasKey('label', $payments[$index]);
            $this->assertArrayHasKey('value', $payments[$index]);
            $this->assertArrayHasKey('icon', $payments[$index]);

            // Ensure there are no single quotes
            $this->assertStringNotContainsString("'", $payment['icon'], "Icon for {$payment['label']} contains a single quote.");

            // Ensure the <title> tag exists
            $this->assertStringContainsString('<title>', $payment['icon'], "Icon for {$payment['label']} does not contain a <title> element.");

            // Ensure the <svg> tag is at the start of the file
            $this->assertStringStartsWith('<svg', $payment['icon'], "Icon for {$payment['label']} does not start with <svg>.");

            // Ensure the </svg> tag is at the end of the file
            $this->assertStringEndsWith('</svg>', $payment['icon'], "Icon for {$payment['label']} does not end with </svg>.");

            // Ensure svg element has width="32px"
            $this->assertMatchesRegularExpression('/<svg[^>]*width=["\']38["\'][^>]*>/i', $payment['icon'], "Icon for {$payment['label']} does not have the width=\"38\" attribute.");

            // Ensure svg element has height="24px"
            $this->assertMatchesRegularExpression('/<svg[^>]*height=["\']24["\'][^>]*>/i', $payment['icon'], "Icon for {$payment['label']} does not have the width=\"38\" attribute.");

            // Ensure svg element has viewBox="
            $this->assertMatchesRegularExpression('/<svg[^>]*viewBox=["\']0 0 38 24["\'][^>]*>/i', $payment['icon'], "Icon for {$payment['label']} does not have the viewBox=\"0 0 38 24\" attribute");
        }
    }

    public function test_no_duplicate_ids()
    {
        $paymentIcons = new PaymentIcons();
    
        // Use reflection to access the protected getItems method
        $reflection = new \ReflectionClass($paymentIcons);
        $method = $reflection->getMethod('getItems');
        $method->setAccessible(true);
    
        $items = $method->invoke($paymentIcons);
        $ids = array_column($items, 'id');
        $uniqueIds = array_unique($ids);
    
        $this->assertEquals(count($ids), count($uniqueIds), 'There are duplicate IDs in the items.');
    }
}
