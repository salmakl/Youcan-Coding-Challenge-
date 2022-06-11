<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\ProductService;

class createProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:product';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Product';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(ProductService $productService)
    {
        try {
            $name = $this->ask('What is the name of the product?');
            $description = $this->ask('What is the description of the product?');
            $price = $this->ask('What is the price of the product?');
            $category = $this->ask('What is the category of the product?');
            $image = $this->ask('What is the image of the product?');

            $productService->create($name, $description,  $price, $image, $category);

            $this->info('Product created successfully!');

            return 0;
        } catch (\Throwable $th) {
            $this->error('Something went wrong! ' . $th->getMessage());

            return 1;
        }
    }
}
