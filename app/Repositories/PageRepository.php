<?php

namespace App\Repositories;

use App\Page;

class PageRepository
{
    /**
     * Get all of the sorted pages.
     *
     * @return Collection
     */
    public function pages_list()
    {
        return Page::orderBy('created_at', 'asc')
                    ->orderBy('is_active', 'desc')
                    ->get();
    }

}
