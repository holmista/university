<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreComplaintRequest;
use App\Models\Complaint;
use App\Notifications\ComplaintCreateNotification;
use App\Notifications\ComplaintReceiveNotification;

class ComplaintController extends Controller
{
    public function store(StoreComplaintRequest $request)
    {
        $data = $request->validated();
        $complaint = Complaint::create($data);
        $complainer = $complaint->complainer;
        $complainee = $complaint->complainee;

        $complainer->notify(new ComplaintCreateNotification($complaint));
        $complainee->notify(new ComplaintReceiveNotification($complaint));

        return $this->successResponse($complaint, 201);
    }

    public function show(Complaint $complaint)
    {
        return response()->view('complaints.show', compact('complaint'));
    }
}
