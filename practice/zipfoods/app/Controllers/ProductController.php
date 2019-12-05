<?php

namespace App\Controllers;

class ProductController extends Controller
{

    private $products;

    public function __construct($app)
    {
        // call the parent construct from Controller.php (which creates a new instance of the app object)
        // and add a new line to the construct
        parent::__construct($app);
        // We used the JSON file and this line of code when we didn't have the database set up (see below for alternative)
        // $this->products = new Products($this->app->path('database/products.json'));

    }

    public function index()
    {

        # Now that we have the database set up, we use this instead:
        $products = $this->app->db()->all('products');

        // or file path products/index
        // we invoke getAll to turn the object $Products into the array $products
        return $this->app->view('products.index', ['products' => $products]);
    }

    public function show()
    {
        // grabs the id from the URL query string
        $id = $this->app->param('id');
        // if there's no id in the query string, don't just display zipfoods.loc/product or an error
        // instead redirect to products
        if (is_null($id)) {
            return $this->app->redirect('/products');
        }

        // if id exists in url query string, retrieve product by id

        // old method via JSON file
        // $product = $this->products->getById($id);

        // new method via querying the database
        $product = $this->app->db()->findById('products', $id);

        // if the product with the specific id doens't exist, return a custom missing page
        if (is_null($product)) {
            return $this->app->view("products.missing", ['id' => $id]);
        }

        // Display confirmation message from saveReview()
        $confirmationName = $this->app->old('confirmationName');

        // Show review information
        $reviews = $this->app->db()->findByColumn('reviews', 'product_id', '=', $id);

        // the view method just grabs a view file and passes variables to it to make it accessible in the view file
        return $this->app->view('products.show', [
            'product' => $product,
            'confirmationName' => $confirmationName,
            'reviews' => $reviews]);

    }

    public function saveReview()
    {

        // Validate data using the built-in validate method
        $this->app->validate([
            'name' => 'required',
            'review' => 'required|minLength:200',
        ]);

        // If validated, grab form values using the built-in method
        $id = $this->app->input('id');
        $name = $this->app->input('name');
        $review = $this->app->input('review');

        // Persist review to the database
        $data = [
            'name' => $name,
            'review' => $review,
            'product_id' => $id,
        ];

        $this->app->db()->insert('reviews', $data);

        // If successful, redirect reviewer back to the product page and print confirmation message (in the view file)
        /* We separated 'name' from 'confirmationName' to avoid the name field being pre-filled if a review was
         * successfully submitted. Check Week 11 Part 3 vid 18:00 for more info
         * https: //www.youtube.com/embed/c0Vs0kZAsp8?rel=0&showinfo=0  */

        $this->app->redirect('/product?id=' . $id, ['confirmationName' => $name]);

    }

    public function newProduct()
    {
        // Retrieve name variable persisted to the session by saveProduct()
        $productName = $this->app->old('productName');

        // Pass name variable to the view page to be displayed
        return $this->app->view('products.new', [
            'productName' => $productName,
        ]);

    }

    public function saveProduct()
    {

        // Validate data using the built-in validate method
        $this->app->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'available' => 'required|digit',
            'weight' => 'required|numeric',
            'perishable' => 'required|digit',
            'description' => 'required|minLength:20',
        ]);

        // If validated, grab form values using the built-in input method
        $name = $this->app->input('name');
        $price = $this->app->input('price');
        $available = $this->app->input('available');
        $weight = $this->app->input('weight');
        $perishable = $this->app->input('perishable');
        $description = $this->app->input('description');

        // Persist new product to the database
        $data = [
            'name' => $name,
            'price' => $price,
            'available' => $available,
            'weight' => $weight,
            'perishable' => $perishable,
            'description' => $description,
        ];

        $this->app->db()->insert('products', $data);

        // Redirect back to new page and persist $name to the session for use in the view file
        $this->app->redirect('/products/new', ['productName' => $name]);
    }

}
