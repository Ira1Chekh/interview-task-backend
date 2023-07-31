<?php

namespace Tests\Unit;

use Tests\TestCase;

class InvoiceApprove extends TestCase
{
    public function test_invoice_approve()
    {
        $response = $this->patch('/api/invoice/9bf5ca9c-2f9c-11ee-be56-0242ac120002/approve');

        $response
            ->assertStatus(200)
            ->assertJson([
                'message' => 'invoice approved',
            ]);
    }

}
