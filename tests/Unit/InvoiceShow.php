<?php

namespace Tests\Unit;

use Tests\TestCase;

class InvoiceShow extends TestCase
{
    public function test_invoice_show()
    {
        $response = $this->get('/api/invoice/unvalid-uuid');

        $response->assertStatus(404);
    }
}
