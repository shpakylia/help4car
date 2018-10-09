<?php

namespace App\Repositories;

use App\Page;

class PageRepository
{
    /**
     * Get all of the tasks for a given user.
     *
     * @return Collection
     */
    public function pages_list()
    {
        return Page::orderBy('created_at', 'asc')
                    ->orderBy('is_active', 'desc')
                    ->get();
    }
    public static function active_pages()
    {
        return Page::where('is_active', '1')
                    ->orderBy('order', 'asc')
                    ->get();
    }
    public static function isExist($alias)
    {
        return Page::where('alias', $alias)
                    ->get();
    }
}
