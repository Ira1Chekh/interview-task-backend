<?php

namespace App\Modules\Approval\Api\Listeners;

use App\Modules\Approval\Api\Events\EntityApproved;
use App\Modules\Approval\Api\Events\EntityRejected;
use Illuminate\Support\Facades\DB;

class ApprovalListener
{
    public function handle(EntityApproved|EntityRejected $entityApproved): void
    {
        $dto = $entityApproved->approvalDto;
        DB::update("update ".$dto->entity." set status = ".$dto->status->value.
            " where id = ".$dto->id);
    }
}
