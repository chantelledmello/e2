<?php

namespace App\Commands;

class AppCommand extends Command
{
    // public function test()
    // {
    //     dump('It works! You invoked your first command.');
    // }

    public function migrate()
    {
        $this->app->db()->createTable('results', [
            'user_pick' => 'varchar(255)',
            'computer_pick' => 'varchar(255)',
            'winner' => 'int',
        ]);

        dump('Migration successful. Check database for changes.');
    }

    public function seed()
    {

        # Create array of throws
        $dummyArray = ['rock', 'paper', 'scissors'];

        # Use a loop to create 10 game results
        for ($i = 0; $i < 10; $i++) {

            # At each iteration, simulate the game
            $userPick = $dummyArray[array_rand($dummyArray)];
            $computerPick = $dummyArray[array_rand($dummyArray)];

            if ($userPick == $computerPick) {
                $winner = 0;
            } else if ($userPick == "rock" && $computerPick == "scissors" ||
                $userPick == "paper" && $computerPick == "rock" ||
                $userPick == "scissors" && $computerPick == "paper") {
                $winner = 1; // the player
            } else {
                $winner = 2; // the computer
            }

            # Set up a result
            $result = [
                'user_pick' => $userPick,
                'computer_pick' => $computerPick,
                'winner' => $winner,

            ];

            # Insert the review
            $this->app->db()->insert('results', $result);
        }
        dump('Seed successful. Check database for changes.');
    }

    public function fresh()
    {
        $this->migrate();
        $this->seed();
    }
}
