<?php

namespace App\Console\Commands;

use App\Services\CategoryService;
use Illuminate\Console\Command;

class deleteCategory extends Command
{
    private $categoryService;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:category {--id=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete category by id';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(CategoryService $categoryService)
    {
        parent::__construct();
        $this->categoryService = $categoryService;
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
            $this->categoryService->delete($id);
            $this->info('Category deleted successfully.');

            return 0;
        } catch (\Throwable $th) {
            $this->error('Something went wrong! ' . $th->getMessage());

            return 1;
        }
    }
}
