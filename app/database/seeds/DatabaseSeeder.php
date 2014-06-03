<?php
use RecipeNow\Models\Entities\Recipe;
use RecipeNow\Models\Entities\Ingredient;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        $this->call('RecipesTableSeeder');
        $this->call('IngredientsTableSeeder');
    }
}

class RecipesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('recipes')->delete();
        Recipe::create(array(
            'id' => 1,
            'user_id' => 1,
            'recipe_title' => 'Cinnamon Rolls',
            'recipe_description' => 'Sweet, but not too sweet cinnamon rolls',
            'recipe_instructions' => 'Warm milk and add yeast and 1/4 white sugar. Let sit. Mix all dry ingredients together then add liquid, egg and 2 Tblsp butter. Mix well and let raise one hour. Punch down and using a rolling pin, roll into about an 15", or smaller, diameter circle. Spread softened 1/2 cup butter onto dough. Sprinkle on brown sugar and cinnamon. Can add pecans and softened raisins if desired. Roll into a log and slice about 1" thick slices. Place in baking dish and let raise 1 hour. Bake 350 F for 13-15 minutes. Once cooled, spread with frosting.',
            'recipe_type' => 'None',
            'recipe_category' => 'Breads / Grains',
            'recipe_nationality' => 'None',
            'recipe_rating' => 5
        ));
    }
}

class IngredientsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('ingredients')->delete();
        $ingredients = [
            ['recipe_id' => 1, 'ingredient_title' => 'Milk', 'measurement_amount' => 1, 'measurement_type' => 'Cups'],
            ['recipe_id' => 1, 'ingredient_title' => 'Yeast', 'measurement_amount' => 1, 'measurement_type' => 'Teaspoons'],
            ['recipe_id' => 1, 'ingredient_title' => 'White Sugar', 'measurement_amount' => 0.33, 'measurement_type' => 'Cups'],
            ['recipe_id' => 1, 'ingredient_title' => 'Butter', 'measurement_amount' => 2, 'measurement_type' => 'Tablespoon'],
            ['recipe_id' => 1, 'ingredient_title' => 'Egg', 'measurement_amount' => 1, 'measurement_type' => 'Item'],
            ['recipe_id' => 1, 'ingredient_title' => 'Flour', 'measurement_amount' => 3, 'measurement_type' => 'Cups'],
            ['recipe_id' => 1, 'ingredient_title' => 'Salt', 'measurement_amount' => 1, 'measurement_type' => 'Teaspoons'],
            ['recipe_id' => 1, 'ingredient_title' => 'Brown Sugar', 'measurement_amount' => 1, 'measurement_type' => 'Cups'],
            ['recipe_id' => 1, 'ingredient_title' => 'Cinnamon', 'measurement_amount' => 2, 'measurement_type' => 'Teaspoons'],
        ];
        Recipe::find(1)->ingredients()->insert($ingredients);
    }
}