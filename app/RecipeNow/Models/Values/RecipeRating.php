<?php
namespace RecipeNow\Models\Values;

class RecipeRating {

    /**
     * @var string
     */
    protected $rating;

    /**
     * @var array
     */
    protected $allowedRatings = [1, 2, 3, 4, 5];

    /**
     * @param $rating
     */
    function __construct($rating = null)
    {
        if ($rating) {
            $this->disallowInvalidRatings($rating);
            $this->rating = $rating;
        }
    }

    /**
     * @param $rating
     * @throws \InvalidArgumentException
     */
    public function disallowInvalidRatings($rating)
    {
        if (!in_array($rating, $this->$allowedRatings)) {
            throw new \InvalidArgumentException('Invalid Recipe Rating');
        }
    }

    public function getAllowedRatings() {
        return $this->allowedRatings;
    }

    public function __toString() {
        return $this->rating;
    }
}