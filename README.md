# Statamic Payment Icons

Payment Icons for Statamic leverages the brand new [dictionary fieldtype](https://statamic.dev/fieldtypes/dictionary)  feature to provide you a consistent set of payment icons for your websites, apps, or whatever else you're doing with Statamic!

## Features 

- ✅ 40+ payment icons
- ✅ Dictionary support
- ✅ Override icons
- ✅ Hard edge corners so you can style them how you like!

## How to Install

``` bash
composer require arrowtide/statamic-payment-icons
```

## How to Use

Once you've installed this addon, you are now ready to use this dictionary within the dictionary fieldtype.


### Templating

Your blueprint field will look something like this:
```yaml
-
  handle: payment_methods
  field:
    dictionary: payment_icons
    type: dictionary
    display: 'Payment Methods'
    localizable: false
```


Once you have selected your payment methods and saved, you'll get something like:
```yaml
payment_methods:
  - klarna
  - amex
```

Now you're ready to template it up!

```antlers
{{ payment_methods }}

  <!-- To display the icon -->
  {{ svg :src="icon" }}

  <!-- Make the icon bigger? -->
  {{ svg :src="icon" class="w-12 h-auto" }}

  <!-- Rounded corners with a border? -->
  {{ svg :src="icon" class="border rounded border-black/10" }}

  <!-- To get the name of the payment method -->
  {{ name }}

  <!-- To get the ID (value) -->
  {{ value }}

{{ /payment_methods }}
```

### Overriding Icons

In the rare occasion you might need to override a payment icon on a specific project, this plugin will look inside of `resources/svg/payment-icons` to try and find a file with the same name as the `value` field in the dictionary.

**If you find an icon is incorrect, could be improved, or if you find another variant may be more suitable please make an issue.**

## Icon requests

Please make an issue and submit the following information. 

- Name of the payment method
- Payment method variant if applicable (Pay in 3, Pay in 6 etc)
- Link to the payment website
- The logo as an `svg`. If you can't find an `svg` please provide a `jpg` or `png`
