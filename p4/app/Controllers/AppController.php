<?php
namespace App\Controllers;

class AppController extends Controller
{
    /**
     *
     */
    public function index()
    {
        return $this->app->view('index');
    }

    public function saveResults()
    {
        // Grab player input
        $user = $this->app->input('result');

        // Create array with all possible throws
        $throws = ['rock', 'paper', 'scissors'];
        $computer = $throws[array_rand($throws)];

        // Compare and find the winner of each round
        if ($user == $computer) {
            $winner = 0;
        } else if ($user == "rock" && $computer == "scissors" ||
            $user == "paper" && $computer == "rock" ||
            $user == "scissors" && $computer == "paper") {
            $winner = 1; // the player
        } else {
            $winner = 2; // the computer
        }

        // Persist results to the database
        $data = [
            'user_pick' => $user,
            'computer_pick' => $computer,
            'winner' => $winner,
        ];

        $this->app->db()->insert('results', $data);

        //Redirect back to view
        $this->app->redirect('/');

    }

    public function showAllResults()
    {
        // Grab all results from the database
        $results = $this->app->db()->all('results');
        // dump($results);

        // Pass results to the view file
        return $this->app->view('results', ['results' => $results]);

    }

    public function showResult()
    {
        // grabs the id from the URL query string
        $id = $this->app->param('id');

        // if there's no id in the query string, redirect to results
        if (is_null($id)) {
            return $this->app->redirect('/results');
        }

        // if id exists in url query string, retrieve result by id
        $result = $this->app->db()->findById('results', $id);

        // dump($result);
        // the view method just grabs a view file and passes variables to it to make it accessible in the view file
        return $this->app->view('result', ['result' => $result]);

    }
}
