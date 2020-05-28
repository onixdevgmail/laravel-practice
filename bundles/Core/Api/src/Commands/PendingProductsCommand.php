<?php

namespace Core\Api\Commands;

use Core\Api\Events\PendingProductsEvent;
use Core\Api\Models\Product;
use Illuminate\Console\Command;

class PendingProductsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:pending-products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = ' Notify users how many products in pending status.';

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
     * @return mixed
     */
    public function handle()
    {
        $pending_product_count = Product::where('status', 'pending')->count();
        event(new PendingProductsEvent($pending_product_count));
        return True;
    }
}
