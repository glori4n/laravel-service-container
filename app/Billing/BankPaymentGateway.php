<?php

namespace App\Billing;

class BankPaymentGateway implements PaymentGatewayContract
{
    private $currency;
    private $discount;

    public function __construct($currency)
    {
        $this->currency = $currency;
    }

    public function charge($amount)
    {
        return [
            'amount' => $amount - $this->discount,
            'confirmation_number' => rand(10000, 1000),
            'currency' => $this->currency,
            'discount' => $this->discount
        ];
    } 

    public function setDiscount($amount)
    {
        $this->discount = $amount;
    }
}