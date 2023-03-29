<?php

namespace App\Http\Controllers;

use App\Http\Requests\RakingCourseRequest;
use App\Http\Resources\CourseRakingResourceCollection;
use App\Services\CourseService;
use Illuminate\Http\JsonResponse;


class CourseController extends Controller
{
    public function __construct(
        public CourseService $courseService,
    ) {
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function rank(RakingCourseRequest $request): JsonResponse
    {

        $courses = $this->courseService->rank($request->validated());
        return response()->json(new CourseRakingResourceCollection($courses));
    }

}
