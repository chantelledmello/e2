# Project 1
+ By: *Chantelle D'mello*
+ Production URL: [http://p3.chantelledmello.me](http://p3.chantelledmello.me)

## Game planning
* Create three forms with radio buttons, representating each round of the game
* Prompt the user to pick a 'throw' for each form/round
* If the user doesn't pick a throw, display and error message and do not allow the game to progress
* If the user does pick a throw, save the value in a 'Player' array using the GET superglobal
* Next, create a set of arrays and variables necessary to carry out the remaining code:
    * Create a 'Throws' array with all the possible throws, i.e. rock, paper, and scissors
    * Create two variables to store the values of Player A and the Computer's throws
* Loop through the Player array using a for loop
    * On each loop, assign the respective form value from the Player array to a PlayerA variable
    * Simultaneously, assign PlayerB (i.e. the computer) a random throw using the array_rand function and the Throws array
    * Initialise a winner variable and set it to null
    * If playerA and playerB pick the same throw, assign the winner as false
    * If playerA picks rock and playerB picks scissors, or if playerA picks paper and playerB picks rock, or if playerA picks scissors and playerB picks paper, assign the winner as 'you'
    * Else, if there's any other scenario, assign the winner as the Computer
* Store all of these variables - playerA throw, playerB throw, and the winner of each round - into an empty multi-dimensional array, where each array represents a round with the three values stored
* Iterate through this array and count how many times the winner is 'you' or the 'computer' using the substr_count function to count instances of the aforementioned strings
    * Do this using two separate variables countA and countB to store the tally of each instance
* Do a little bit of math to figure out who the overall winner is via a conditional:
    * If countA - countB > 0, then there are more mentions of the word 'you' than 'computer', so the user wins
    * If countA - countB < 0, then the computer wins
    * If countA == countB then the game ties
* Wrap all of this is a session so that these variables can be transfered to a next php file using session_start() at the top of the file
* At the end of the file, store the main variables that you need on your view php file and redirect back to the original page for display
* Create an index-controller.php file that will act as the intermediary between the processing file and the view file
* Check to see if the variables are real (i.e. not empty and set) before continuing onto the next step
* Assign relevant session variables to normal variables and/or Booleans, and unset sessions where necessary. If the variables are empty, do not display anything
* In the view file, require the index-controller.php file
    * Create the requisite for/foreach loops in the view file to display variables from the controller file - round winners, player choices, and the overall winner - onto the final webpage


## Outside resources
N/A

## Notes for instructor
* Just a question - was there an easier way to run the simulation thrice and find out the winner? Would love to know if there was an alternative. 