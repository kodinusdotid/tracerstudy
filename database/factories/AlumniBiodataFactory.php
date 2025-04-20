<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\AlumniBiodata;
use App\Models\GraduationYearGroup;

class AlumniBiodataFactory extends Factory
{
    protected $model = AlumniBiodata::class;

    public function definition()
    {
        $graduationYearGroup = GraduationYearGroup::factory()->create();
        $fullName = $this->faker->name();
        $socials = generateSocialMediaUrls($fullName);

        return [
            'user_id' => User::factory()->create()->id,
            'graduation_year_group_id' => $graduationYearGroup->id,
            'nis_nisn' => $this->faker->unique()->numerify('######'),
            'full_name' => $fullName,
            'birth_date' => $this->faker->date(),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'phone_number' => $this->faker->optional()->phoneNumber(),
            'major' => $this->faker->word(),
            'address' => $this->faker->address(),
            'socmed_facebook' => $socials['facebook'],
            'socmed_twitter' => $socials['twitter'],
            'socmed_instagram' => $socials['instagram'],
            'socmed_linkedin' => $socials['linkedin'],
            'socmed_youtube' => $socials['youtube'],
            'socmed_tiktok' => $socials['tiktok'],
            'is_verified' => $this->faker->boolean(chanceOfGettingTrue: 2),
        ];
    }
}
