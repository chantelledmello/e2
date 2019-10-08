# Project 1
+ By: *Chantelle D'mello*
+ Production URL: [http://p2.chantelledmello.me](http://p2.chantelledmello.me)

## Game planning
* Create an array with three values - rock, paper, and scissors
* Create two players - Player A and Player B
* Use the rand function to assign Player A and B a 'throw'
* Compare throws using the equality operator and the && and || operators to set parameters for each winning scenario
* Initialise an empty winner variable and store the winning result in it
* Re-run the entire program three times via a for loop
    * Create an empty two-dimensional array to store the values of Player A and B's throw and the winner of each of the three rounds as an array (within the main array)
    * Write each round into the associative sub-array, mapping each value to a descriptive key
* Using a foreach loop, loop through the associative sub-array to find out who the overall winner is
    * Initialise two variables outside the loop to keep track of how many times 'Player A' and 'Player B' are assigned to the 'winner' key
    * Also initialise an empty overallWinner variable to store the final winner value
    * Use the substr_count function to search the values mapped to the 'winner' key for the strings 'Player A' and 'PlayerB'
    * Set up parameters using the ||, &&, and <, >, or = operators to determine who the overall winner is (i.e. if Playyer A wins two out of the three rounds, they are the winner, etc.)
* In the view file, print out results to the page using echoes

## Outside resources
N/A

## Notes for instructor
* Just a question - was there an easier way to run the simulation thrice and find out the winner? Would love to know if there was an alternative. 