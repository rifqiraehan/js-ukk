<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;


class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'username' => $this->faker->unique()->userName(),
            'password' => bcrypt('secret'), // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }

    /**
     * Indicate that the user should have a personal team.
     *
     * @return $this
     */
    public function withPersonalTeam()
    {
        if (! Features::hasTeamFeatures()) {
            return $this->state([]);
        }

        return $this->has(
            Team::factory()
                ->state(function (array $attributes, User $user) {
                    return ['name' => $user->name.'\'s Team', 'user_id' => $user->id, 'personal_team' => true];
                }),
            'ownedTeams'
        );
    }

    public function penjual()
    {
        return $this->state(function (array $attributes) {
            $lokasiKantin = ['Kantin Utama', 'Kantin Utara'];

            return[
                'role_id'=> '2',
                'lokasi' => $lokasiKantin[mt_rand(0,count($lokasiKantin)-1)],
            ];
        });
    }

    public function murid()
    {
        return $this->state(function (array $attributes) {
            $kelas = ['X', 'XI', 'XII', 'XIII'];
            $jurusan = ['ANI', 'RPL 1', 'RPL 2', 'SIJA', 'TKJ', 'DPIB', 'TITL'];

            return[
                'role_id'=> '3',
                'kelas' => $kelas[mt_rand(0,count($kelas)-1)],
                'jurusan' => $jurusan[mt_rand(0,count($jurusan)-1)],
            ];
        });
    }
}
