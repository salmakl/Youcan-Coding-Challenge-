<?php

namespace App\Console\Commands;

use App\Services\ProductService;
use Illuminate\Console\Command;

class deleteProduct extends Command
{
    private $productService;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:product {--id=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete product by id';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(ProductService $productService)
    {
        parent::__construct();
        $this->productService = $productService;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            $id = $this->option('id');
            $this->productService->delete($id);
            $this->info('Product deleted successfully.');

            return 0;
        } catch (\Throwable $th) {
            $this->error('Something went wrong! ' . $th->getMessage());

            return 1;
        }
    }
}
