<?php
namespace RecipeNow\Models\Values;

class RecipeNationality {

    /**
     * @var string
     */
    protected $nationality;

    /**
     * @var array
     */
    protected $allowedNationalities = ['american', 'asian', 'french', 'greek', 'italian', 'mexican', 'none'];

    /**
     * @param $nationality
     */
    function __construct($nationality = null)
    {
        if ($nationality) {
            $this->disallowInvalidNationalities($nationality);
            $this->nationality = $nationality;
        }
    }

    /**
     * @param $nationality
     * @throws \InvalidArgumentException
     */
    public function disallowInvalidNationalities($nationality)
    {
        if (!in_array($nationality, $this->allowedNationalities)) {
            throw new \InvalidArgumentException('Invalid Recipe Nationality');
        }
    }

    public function getAllowedNationalities() {
        return $this->allowednNationalities;
    }

    public function __toString() {
        return $this->nationality;
    }
}