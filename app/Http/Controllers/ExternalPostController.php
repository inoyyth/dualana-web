<?php

namespace App\Http\Controllers;

use App\Application\UseCases\GetExternalPosts;
use App\Application\UseCases\GetExternalPostById;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Exception;

class ExternalPostController extends Controller
{
    public function __construct(
        private readonly GetExternalPosts $useCase
    ) {
    }

    /**
     * Display a listing of external posts.
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $posts = [];
        $error = null;

        try {
            $posts = $this->useCase->execute($request->query());
        } catch (Exception $e) {
            $error = $e->getMessage();
        }

        return view('posts-demo', [
            'title' => 'REST API External Posts Demo',
            'posts' => $posts,
            'error' => $error
        ]);
    }

    /**
     * Display details of a specific external post.
     *
     * @param int $id
     * @param GetExternalPostById $detailsUseCase
     * @return View
     */
    public function show(int $id, GetExternalPostById $detailsUseCase): View
    {
        $post = [];
        $error = null;

        try {
            $post = $detailsUseCase->execute($id);
        } catch (Exception $e) {
            $error = $e->getMessage();
        }

        return view('posts-detail', [
            'title' => $post['title'] ?? 'Post Detail',
            'post' => $post,
            'error' => $error
        ]);
    }
}
