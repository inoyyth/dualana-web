<?php

namespace App\Http\Controllers;

use App\Application\UseCases\GetArchitectureOverview;
use Illuminate\Contracts\View\View;

class ArchitectureDemoController extends Controller
{
    public function __construct(private readonly GetArchitectureOverview $useCase)
    {
    }

    public function index(): View
    {
        $overview = $this->useCase->execute();

        return view('architecture-demo', ['title' => 'NEW Layered Architecture', 'overview' => $overview]);
    }
}
