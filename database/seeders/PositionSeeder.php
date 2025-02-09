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
        $positions = [
            'Wing' => 'Standing on the far %POSITION% side of the field, the %POSITION% Wing waits for the ball and uses their speed to score',
            'Link' => 'Standing one in from the %POSITION% Wing, the %POSITION% Link often goes into the 9 position and delivers the ball either to a mid or a wing in set plays',
            'Mid' => 'Standing in the middle of the field, the %POSITION% Mid\'s job is to cart the ball in and get a quick rollball. With the other Mid they are used in 2- and 3-person drives frequently'
        ];

        $reverse = false;

        foreach ($directions as $key => $direction) {
            $directionPositions = $positions;
            if ($reverse) {
                $directionPositions = array_reverse($directionPositions);
            }

            $n = 1;
            foreach ($directionPositions as $positionName => $description) {
                Position::create([
                    'name' => "{$direction} {$positionName}",
                    'description' => str_replace('%POSITION%', $direction, $description),
                    'number' => ($key * count($directionPositions)) + $n,
                ]);
                $n++;
            }

            $reverse = !$reverse;
        }
    }
}
