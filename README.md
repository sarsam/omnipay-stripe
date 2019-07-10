# Omnipay: Stripe

**Stripe driver for the Omnipay PHP payment processing library**

[Omnipay](https://github.com/sarsam/omnipay-stripe) is a framework agnostic, multi-gateway payment
processing library for PHP. This package implements Stripe support for Omnipay.

## Installation

Omnipay is installed via [Composer](http://getcomposer.org/). To install, simply require `omnipay-stripe` with Composer:

```
composer require sarsam/omnipay-stripe
```

## Basic Usage

The following gateways are provided by this package:

* [Stripe](https://stripe.com/)

For general usage instructions, please see the main [Omnipay](https://github.com/thephpleague/omnipay)
repository.

## Information

In this package now  implemented only SetupIntents, PaymentIntents, PaymentMethods, Customers and Refunds. 

[Stripe API Documetnation](https://stripe.com/docs/api).
Other requests  is in the process...

## Support

If you are having general issues with Omnipay, we suggest posting on
[Stack Overflow](http://stackoverflow.com/). Be sure to add the
[omnipay tag](http://stackoverflow.com/questions/tagged/omnipay) so it can be easily found.

If you want to keep up to date with release announcements, discuss ideas for the project,
or ask more detailed questions, there is also a [mailing list](https://groups.google.com/forum/#!forum/omnipay) which
you can subscribe to.

If you believe you have found a bug, please report it using the [GitHub issue tracker](https://github.com/sarsam/omnipay-stripe/issues),
or better yet, fork the library and submit a pull request.
