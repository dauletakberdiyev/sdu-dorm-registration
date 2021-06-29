<?php

namespace App\Http\Controllers\AdminPage\DirectorPage;

use App\Http\Controllers\Controller;
use App\Http\Requests\AssistantRequest;
use App\Http\Requests\RelatedStudentRequest;
use App\Repositories\DirectorPage\CreateAssistantRepository;
use App\Repositories\DirectorPage\RelatedStudentRepository;
use App\Repositories\DirectorPage\StudentAssistantRepository;
use Illuminate\Http\Request;

class FloorAssistantController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(StudentAssistantRepository $repository)
    {
        return $repository->manage('k');
    }

    public function create(AssistantRequest $request, CreateAssistantRepository $repository)
    {
        return $repository->create($request, 'k');
    }

    public function relatedAssistants(RelatedStudentRequest $request, RelatedStudentRepository $repository){
        return $repository->manage($request, 1);
    }
}
