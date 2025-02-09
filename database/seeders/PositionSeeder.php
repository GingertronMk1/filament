<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $directions = ['Left', 'Right'];

        $reverse = false;

        foreach ($directions as $key => $direction) {
            $positions = [
                'Wing' => "Standing on the far {$direction} side of the field, the {$direction} Wing waits for the ball and uses their speed to score",
                'Link' => "Standing one in from the {$direction} Wing, the {$direction} Link often goes into the 9 position and delivers the ball either to a mid or a wing in set plays",
                'Mid' => "Standing in the middle of the field, the {$direction} Mid's job is to cart the ball in and get a quick rollball. With the other Mid they are used in 2- and 3-person drives frequently"
            ];

            if ($reverse) {
                $positions = array_reverse($positions);
            }

            $n = 1;
            foreach ($positions as $positionName => $description) {
                Position::create([
                    'name' => "{$direction} {$positionName}",
                    'description' => $description,
                    'number' => ($key * count($positions)) + $n,
                ]);
                $n++;
            }

            $reverse = !$reverse;
        }
    }
}
