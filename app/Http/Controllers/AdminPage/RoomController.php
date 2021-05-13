<?php

namespace App\Http\Controllers\AdminPage;

use App\Http\Controllers\Controller;
use App\Repositories\DirectorPage\AssistantRoomRepository;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function assistantRoom(AssistantRoomRepository $repository){
        return $repository->manage('1');
    }

    public function floorAssistantRoom(AssistantRoomRepository $repository){
        return $repository->manage('2');
    }
}
