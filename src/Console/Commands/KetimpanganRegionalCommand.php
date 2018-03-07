<?php

namespace Bantenprov\KetimpanganRegional\Console\Commands;

use Illuminate\Console\Command;

/**
 * The KetimpanganRegionalCommand class.
 *
 * @package Bantenprov\KetimpanganRegional
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class KetimpanganRegionalCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bantenprov:ketimpangan-regional';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Demo command for Bantenprov\KetimpanganRegional package';

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
        $this->info('Welcome to command for Bantenprov\KetimpanganRegional package');
    }
}
