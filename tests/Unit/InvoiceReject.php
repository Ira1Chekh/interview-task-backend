<?php

namespace Tests\Unit;

use Tests\TestCase;

class InvoiceReject extends TestCase
{
    public function test_invoice_reject()
    {
        $response = $this->patch('/api/invoice/9bf5ca9c-2f9c-11ee-be56-0242ac120002/reject');

        $response
            ->assertStatus(200)
            ->assertJson([
                'message' => 'invoice rejected',
            ]);
    }

}
