<?php

namespace App\Console\Commands;

use App\Services\CategoryService;
use Illuminate\Console\Command;

class createCategory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:category';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Category';

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
    public function handle(CategoryService $categoryService)
    {
        try {
            $name = $this->ask('What is the name of the category?');
            $parent_category = $this->ask('What is the parent category of the category?') ?? null;

            $categoryService->create($name, $parent_category);

            $this->info('Product created successfully!');

            return 0;
        } catch (\Throwable $th) {
            $this->error('Something went wrong! ' . $th->getMessage());
            return 1;
        }
    }
}
