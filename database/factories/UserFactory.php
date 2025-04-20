<?php

namespace Database\Factories;

use App\Models\AlumniBiodata;
use App\Models\GraduationYearGroup;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    /**
     * Configure the model factory to create an alumni user.
     */
    public function alumni(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'role' => 'alumni',
            ];
        });
    }

    /**
     * Configure the model factory to create an admin user.
     */
    public function admin(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'role' => 'admin',
            ];
        });
    }

    /**
     * Configure the model factory to create an operator user.
     */
    public function operator(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'role' => 'operator',
            ];
        });
    }

    /**
     * Configure the model factory to create a user with alumni biodata.
     */
    public function withBiodata(): static
    {
        return $this->afterCreating(function ($user) {
            if ($user->role === 'alumni') {
                $fullName = $user->name;
                $socials = generateSocialMediaUrls($fullName);

                AlumniBiodata::factory()->create([
                    'user_id' => $user->id,
                    'full_name' => $fullName,
                    'graduation_year_group_id' => GraduationYearGroup::factory()->create()->id,
                    'nis_nisn' => fake()->unique()->numerify('######'),
                    'birth_date' => fake()->date(),
                    'gender' => fake()->randomElement(['male', 'female']),
                    'address' => fake()->address(),
                    'major' => fake()->word(),
                    'socmed_facebook' => $socials['facebook'],
                    'socmed_twitter' => $socials['twitter'],
                    'socmed_instagram' => $socials['instagram'],
                    'socmed_linkedin' => $socials['linkedin'],
                    'socmed_youtube' => $socials['youtube'],
                    'socmed_tiktok' => $socials['tiktok'],
                    'is_verified' => false,
                ]);
            }
        });
    }
}

