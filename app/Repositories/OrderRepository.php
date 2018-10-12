<?php

namespace App\Repositories;

use App\Order;
use Carbon\Carbon;

class OrderRepository
{
    /**
     * Get all latest orders for last month.
     *
     * @return Collection
     */
    public function orderByLastMonth()
    {
        return Page::where('date', '>', Carbon::now()->subMonth())
                    ->latest()
                    ->get();
    }

}
