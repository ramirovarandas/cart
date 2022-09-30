<?php

namespace Tests\Unit\App\Mail;



use App\Mail\CheckoutOrderMail;
use Tests\TestCase;

class CheckoutOrderMailTest extends TestCase
{

    public function test_mail_content()
    {
        $mail = new CheckoutOrderMail();

        $mail->hasSubject('Order received');
        $mail->assertSeeInHtml('Thank you for your order!');
    }
}
