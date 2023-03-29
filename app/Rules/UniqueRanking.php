<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class UniqueRanking implements Rule
{


    /**
     * Create a new rule instance.
     *
     * @param array $courses
     */
    public function __construct(public ?array $courses)
    {

    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {


        $rankings = array_map(fn($course) => $course['ranking'], $this->courses);
        $uniqueRankings = array_unique($rankings);
        return count($rankings) === count($uniqueRankings);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'There are courses with the same ranking';
    }
}
