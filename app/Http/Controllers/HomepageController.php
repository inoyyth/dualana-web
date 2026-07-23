<?php

namespace App\Http\Controllers;

use App\Application\UseCases\GetExternalPages;
use App\Application\UseCases\GetExternalClient;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Exception;

class HomepageController extends Controller
{
    public function __construct(
        private readonly GetExternalPages $useCase,
        private readonly GetExternalClient $useCaseClient,
    ) {}

    /**
     * Display a listing of external pages.
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $banner = null;
        $profile = null;
        $clients = null;
        $services = null;
        $error = null;
        $project = null;
        $testimonials = null;
        $scope = null;

        try {
            $banner = $this->useCase->execute(['slug' => 'banner']);
            $profile = $this->useCase->execute(['slug' => 'dualana-profile']);
            $clients = $this->useCaseClient->execute();
            $services = $this->useCase->execute(['slug' => 'services']);
            $projects = $this->useCase->execute(['slug' => 'projects']);
            $testimonials = $this->useCase->execute(['slug' => 'testimonial']);
            $scope = $this->useCase->execute(['slug' => 'scope']);
        } catch (Exception $e) {
            $error = $e->getMessage();
        }

        return view('homepage', [
            'title' => 'Homepage | Dualana Indonesia',
            'banner' => $banner,
            'profile' => $profile,
            'clients' => $clients,
            'services' => $services,
            'projects' => $projects,
            'testimonials' => $testimonials,
            'scope' => $scope,
            'error' => $error
        ]);
    }
}
