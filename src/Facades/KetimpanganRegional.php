<?php

namespace Bantenprov\KetimpanganRegional\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * The KetimpanganRegional facade.
 *
 * @package Bantenprov\KetimpanganRegional
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class KetimpanganRegionalFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'ketimpangan-regional';
    }
}
