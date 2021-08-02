<?php

namespace App\Repositories\RegistrationDashboard;

use App\Enums\ApiOutputStatus;
use App\Enums\ApiOutputStatusCode;
use App\Models\Tables\FreePlaceModel;


class FreePlaceRepository
{

    public function manage(){
        $placeModel = new FreePlaceModel();
        $freePlace = $placeModel->getFreePlaceGeneral();

        return response()->json([
            'status' => ApiOutputStatus::SUCCESS,
            'status_code' => ApiOutputStatusCode::SUCCESS,
            'message' => __('success.success'),
            'data' => $freePlace,
        ], 200);
    }
}
