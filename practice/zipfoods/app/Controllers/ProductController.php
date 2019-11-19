<?php

namespace App\Controllers;

use App\Products;

class ProductController extends Controller
{

    private $products;

    public function __construct($app)
    {
        // call the parent construct from Controller.php (which creates a new instance of the app object)
        // and add a new line to the construct
        parent::__construct($app);
        $this->products = new Products($this->app->path('database/products.json'));
    }

    public function index()
    {
        // or file path products/index
        // we invoke getAll to turn the object $Products into the array $products
        return $this->app->view('products.index', ['products' => $this->products->getAll()]);
    }

    public function show()
    {
        // grabs the id from the URL query string
        $id = $this->app->param('id');
        // if there's no id in the query string, don't just display zipfoods.loc/product
        // instead redirect to products
        if (is_null($id)) {
            return $this->app->redirect('/products');
        }

        // if id exists in url query string, retrieve product by id
        $product = $this->products->getById($id);

        // if the product with the specific id doens't exist, return the error page
        if (is_null($product)) {
            return $this->app->view("products.missing", ['id' => $id]);
        }

        // the view method just grabs a view file and passes variables to it
        return $this->app->view('products.show', ['product' => $product]);
    }
}
