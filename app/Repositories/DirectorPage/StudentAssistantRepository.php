<?php

namespace App\Repositories\DirectorPage;

use App\Enums\ApiOutputStatus;
use App\Enums\ApiOutputStatusCode;
use App\Models\User;

class StudentAssistantRepository
{
    public function manage($assistantType)
    {
        $assistants = User::with('assistantInfo', 'speciality', 'room')
            ->where('status', $assistantType)
            ->paginate(5);

        return response()->json([
            'status' => ApiOutputStatus::SUCCESS,
            'status_code' => ApiOutputStatusCode::SUCCESS,
            'message' => __('success.success'),
            'data' => $assistants
        ], 200);
    }
}
