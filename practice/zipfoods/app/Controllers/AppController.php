<?php
namespace App\Controllers;

class AppController extends Controller
{
    /**
     *
     */
    public function index()
    {
        $welcomes = ['Welcome', 'Aloha!', 'Welkom', 'Bienvenidos', 'Bienvenu', 'Welkomma'];
        return $this->app->view('index', ['welcome' => $welcomes[array_rand($welcomes)]]);
    }

    public function about()
    {
        return $this->app->view('about');
    }

    // Note that this is the manual way of connecting to a database.
    // In reality, the e2 Framework abstracts a lot of this and does it for us
    public function practiceDB()
    {
        # Set up all the variables we need to make a connection
        # not hardcoded because these values are going to change in the .env file on the production server
        $host = $this->app->env('DB_HOST');
        $database = $this->app->env('DB_NAME');
        $username = $this->app->env('DB_USERNAME');
        $password = $this->app->env('DB_PASSWORD');
        $charset = $this->app->env('DB_CHARSET', 'utf8mb4');

        # DSN (Data Source Name) string
        # contains the information required to connect to the database
        $dsn = "mysql:host=$host;dbname=$database;charset=$charset";

        # Driver-specific connection options
        $options = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            # Create a PDO instance representing a connection to a database
            $pdo = new \PDO($dsn, $username, $password, $options);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int) $e->getCode());
        }

        // Test Examples to demonstrate that the connection has been set up and is successful

        // // EXAMPLE 1: READ DATA
        // $sql = "SELECT * FROM products";

        // # Execute the statement, getting the result set as a PDOStatement object
        // # https://www.php.net/manual/en/pdo.query.php
        // $statement = $pdo->query($sql);

        // # https://www.php.net/manual/en/pdostatement.fetchall.php
        // dump($statement->fetchAll());

        // EXAMPLE 2: WRITE DATA
        // $sql = "INSERT INTO products (name, description, price, available, weight, perishable)
        //     values (
        //         'Driscoll’s Strawberries',
        //         'Driscoll’s Strawberries are consistently the best, sweetest, juiciest strawberries available. This size is the best selling, as it is both convenient for completing a cherished family recipes and for preparing a quick snack straight from the fridge.',
        //         4.99,
        //         0,
        //         1,
        //         1)";
        // $pdo->query($sql);

        // OR by extracting form field results

        // $name = $this->app->input('name');
        // $review = $this->app->input('review');

        // $sql = "INSERT INTO products (name, review) VALUES (" . $name . "," . $review . ")";
        // $pdo->query($sql);

        //EXAMPLE 3: PREPARED STATEMENTS

        # Note that the six ?'s in this statement will correlate to the six values in our $data array
        // $sqlTemplate = "INSERT INTO products (name, description, price, available, weight, perishable) values (?, ?, ?, ?, ?, ?)";

        // $values = [
        //     'Driscoll’s Strawberries',
        //     'Driscoll’s Strawberries are consistently the best, sweetest, juiciest strawberries available. This size is the best selling, as it is both convenient for completing a cherished family recipes and for preparing a quick snack straight from the fridge.',
        //     4.99,
        //     0,
        //     1,
        //     1,
        // ];

        // # Prepare & Execute
        // $statement = $pdo->prepare($sqlTemplate);
        // $statement->execute($values);
    }

    public function practiceDB2()
    {
        // dump($this->app->db()->all('products'));
        // dump($this->app->db()->findById('products', 5));

        # Exact match
        // dump($this->app->db()->findByColumn('products', 'name', '=', 'Honey Nut Cheerios'));

        // # Fuzzy matching
        // dump($this->app->db()->findByColumn('products', 'name', 'LIKE', '%Cheerios%'));
        // dump($this->app->db()->findByColumn('products', 'available', '>', 5));

        # Inserting a whole row

        // $data = [
        //     'name' => 'Driscoll’s Strawberries',
        //     'description' => 'Driscoll’s Strawberries are consistently the best, sweetest, juiciest strawberries available. This size is the best selling, as it is both convenient for completing a cherished family recipes and for preparing a quick snack straight from the fridge.',
        //     'price' => 4.99,
        //     'available' => 0,
        //     'weight' => 1,
        //     'perishable' => true,
        // ];

        // $this->app->db()->insert('products', $data);
    }
}
