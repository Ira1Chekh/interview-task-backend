<?php

namespace App\Http\Controllers;

use App\Domain\Enums\StatusEnum;
use App\Modules\Approval\Api\ApprovalFacadeInterface;
use App\Modules\Approval\Api\Dto\ApprovalDto;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\UuidInterface;

class InvoiceController extends Controller
{
    public function __construct(public ApprovalFacadeInterface $approvalFacade){
    }
    public function show(UuidInterface $id): JsonResponse
    {
        $invoice = DB::table('invoices')
            ->join('invoice_product_lines', 'invoices.id', '=', 'invoice_product_lines.invoice_id')
            ->where('invoices.id', $id)
            ->first();

        return response()->json(['invoice' => $invoice]);
    }

    public function approve(UuidInterface $id): JsonResponse
    {
        $this->approvalFacade->approve(new ApprovalDto($id, StatusEnum::APPROVED, 'invoices'));

        return response()->json(['message' => 'invoice approved']);
    }

    public function reject(UuidInterface $id): JsonResponse
    {
        $this->approvalFacade->reject(new ApprovalDto($id, StatusEnum::REJECTED, 'invoices'));

        return response()->json(['message' => 'invoice rejected']);
    }
}
