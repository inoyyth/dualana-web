<?php

namespace App\Http\Controllers;

use App\Application\UseCases\GetExternalPages;
use App\Application\UseCases\GetExternalClient;
use App\Application\UseCases\GetExternalServices;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Exception;

class HomepageController extends Controller
{
    public function __construct(
        private readonly GetExternalPages $useCase,
        private readonly GetExternalClient $useCaseClients,
        private readonly GetExternalServices $useCaseServices
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

        try {
            $banner = $this->useCase->execute(['slug' => 'banner']);
            $profile = $this->useCase->execute(['slug' => 'dualana-profile']);
            $clients = $this->useCaseClients->execute();
            $services = $this->useCaseServices->execute(['_embed' => true]);
        } catch (Exception $e) {
            $error = $e->getMessage();
        }

        return view('homepage', [
            'title' => 'Homepage | Dualana Indonesia',
            'banner' => $banner,
            'profile' => $profile,
            'clients' => $clients,
            'services' => $services,
            'error' => $error
        ]);
    }
}
