<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Simple & Clean Dashboard Renderer
     *
     * @param string $partialView
     * @param array  $data          All data you want to pass (you prepare it in controller)
     */
    protected function renderDashboard(string $partialView, array $data = [])
    {
        // AJAX request from openCustom() → return only partial content
        if (request()->header('X-Requested-With') === 'XMLHttpRequest') {
            return view($partialView, $data);
        }

        // Normal browser request (direct URL or refresh) → return full layout
        $data['content_view'] = $partialView;

        return view('layouts.dashboard', $data);
    }
}