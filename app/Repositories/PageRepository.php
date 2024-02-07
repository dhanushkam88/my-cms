<?php

namespace App\Repositories;

use App\Models\Page;

class PageRepository implements PageRepositoryInterface
{
    /**
     * Get all pages.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all()
    {
        return Page::all();
    }

    /**
     * Find a page by its ID.
     *
     * @param  int  $id
     * @return \App\Models\Page
     */
    public function find($id)
    {
        return Page::findOrFail($id);
    }

    /**
     * Create a new page.
     *
     * @param  array  $data
     * @return \App\Models\Page
     */
    public function create(array $data)
    {
        return Page::create($data);
    }

    /**
     * Update an existing page.
     *
     * @param  array  $data
     * @param  int  $id
     * @return \App\Models\Page
     */
    public function update(array $data, $id)
    {
        $page = Page::findOrFail($id);
        $page->update($data);
        return $page;
    }

    /**
     * Delete a page by its ID.
     *
     * @param  int  $id
     * @return void
     */
    public function delete($id)
    {
        $page = Page::findOrFail($id);
        return $page->delete();
    }

    /**
     * Find a page by its slug.
     *
     * @param  string  $slug
     * @return \App\Models\Page|null
     */
    public function findBySlug($slug)
    {
        return Page::where('slug', $slug)
            ->whereNull('parent_id')
            ->first();
    }

    /**
     * Find a child page by its parent slug and child slug.
     *
     * @param  string  $parentSlug
     * @param  string  $childSlug
     * @return \App\Models\Page|null
     */
    public function findByParentSlug($parentSlug, $childSlug)
    {
        // Retrieve the parent page based on the parent slug
        $parentPage = Page::where('slug', $parentSlug)->first();

        // Retrieve the child page based on the child slug and parent page ID
        return Page::where('slug', $childSlug)
            ->where('parent_id', $parentPage->id)
            ->first();
    }
}
