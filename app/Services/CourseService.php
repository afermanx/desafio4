<?php
namespace App\Services;

use App\Models\Course;
use Illuminate\Database\Eloquent\Collection;

class CourseService
{

    /**
     * @param array $courses
     * @return array
     */
    public function rank(array $data): Collection
    {
        $courses = $data['courses'];
        foreach ($courses as $course) {
            $courseToUpdate = Course::find($course['id']);
            $courseToUpdate->ranking = $course['ranking'];
            $courseToUpdate->save();
        }
        $courses = Course::orderBy('ranking')->get();
        return $courses;
    }

}
