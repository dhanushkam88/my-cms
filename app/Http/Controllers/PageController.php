<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PageRepositoryInterface;

class PageController extends Controller
{
    /**
     * The page repository instance.
     *
     * @var PageRepositoryInterface
     */
    protected $pageRepository;

    /**
     * Create a new controller instance.
     *
     * @param  PageRepositoryInterface  $pageRepository
     * @return void
     */
    public function __construct(PageRepositoryInterface $pageRepository)
    {
        $this->pageRepository = $pageRepository;
    }

    /**
     * Display a listing of the pages.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->pageRepository->all();
    }

    /**
     * Store a newly created page in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'parent_id' => 'nullable',
            'title' => 'required|string',
            'content' => 'required|string',
            'slug' => 'required|string'
        ]);

        $page = $this->pageRepository->create($validatedData);

        return response()->json([
            'message' => 'Page created successfully',
            'page' => $page
        ], 201);
    }

    /**
     * Display the specified page.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $page = $this->pageRepository->findBySlug($slug);
        if (!$page) {
            $page['error'] = 'Page not found';
            return view('failed', compact('page'));
        }

        return view('view', compact('page'));
    }

    /**
     * Update the specified page in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        // Implement update logic
    }

    /**
     * Remove the specified page from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = $this->pageRepository->delete($id);
        if(!$page) {
            return response()->json([
                'message' => 'Page not found'
            ], 404);
        }else{
            return response()->json([
                'message' => 'Page deleted successfully'
            ], 200);
        }
    }

    /**
     * Display the specified nested page.
     *
     * @param  string  $parentSlug
     * @param  string  $childSlug
     * @return \Illuminate\Http\Response
     */
    public function showNested($parentSlug, $childSlug)
    {
        $page = $this->pageRepository->findByParentSlug($parentSlug, $childSlug);

        if (!$page) {
            $page['error'] = 'Page not found';
            return view('failed', compact('page'));
        }

        return view('view', compact('page'));
    }
}
