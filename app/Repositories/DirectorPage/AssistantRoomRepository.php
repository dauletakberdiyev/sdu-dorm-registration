<?php

namespace App\Repositories\DirectorPage;

use App\Enums\ApiOutputStatus;
use App\Enums\ApiOutputStatusCode;
use App\Models\Tables\RoomModel;

class AssistantRoomRepository
{
    public function manage($roomType)
    {
        $rooms = RoomModel::select(
            'id as title',
            'free_place'
            )
            ->where('room_type', $roomType)
            ->whereNotIn('free_place', [0])
            ->get()->toArray();

        return response()->json([
            'status' => ApiOutputStatus::SUCCESS,
            'status_code' => ApiOutputStatusCode::SUCCESS,
            'message' => __('success.success'),
            'data' => $rooms
        ], 200);
    }
}
