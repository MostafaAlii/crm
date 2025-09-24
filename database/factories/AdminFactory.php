<?php
namespace Database\Factories;
use App\Models\{Admin};
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Enums\Admin\{AdminType,AdminStatus};
class AdminFactory extends Factory {
    protected $model = Admin::class;
    public function definition(): array {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'status' => $this->faker->randomElement([
                AdminStatus::ACTIVE->value,
                AdminStatus::IN_ACTIVE->value,
                AdminStatus::BLOCKED->value,
            ]),
            'type' => $this->faker->randomElement([
                AdminType::COMPANY_ADMIN->value,
                AdminType::BRANCH_ADMIN->value,
            ]),
            'password' => bcrypt('123123'),
            'date' => $this->faker->date(),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ];
    }
}
