<?php
namespace App\Controllers;

class AppController extends Controller
{
    /**
     *
     */
    public function index()
    {
        # retrieve the $result array from the session
        $result = $this->app->old('result', null);

        # return view and pass $return array to the view
        return $this->app->view('index', ['result' => $result]);
    }

    public function saveResults()
    {
        $this->app->validate([
            'result' => 'required',
        ]);

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
        # save input fields into the $result array
        $result = [
            'user_pick' => $user,
            'computer_pick' => $computer,
            'winner' => $winner,
        ];

        $this->app->db()->insert('results', $result); # insert $result into 'results' table

        //Redirect back to index page
        $this->app->redirect('/', ['result' => $result]); # persist $result array to the session

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
