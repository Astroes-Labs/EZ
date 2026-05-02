<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Traits\SharedDashboardData;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, SharedDashboardData;

    /**
     * Simple & Clean Dashboard Renderer
     *
     * Shared data is ALWAYS included.
     * You can pass extra data that will be merged on top.
     *
     * @param string $partialView
     * @param array  $extraData   Additional data specific to this view
     */
    protected function renderDashboard(string $partialView, array $extraData = [])
    {
        // Always get shared dashboard data
        $data = $this->getSharedData();

        // Merge extra data (extraData will override if keys conflict)
        $data = array_merge($data, $extraData);

        // AJAX request from openCustom() → return only partial content
        if (request()->header('X-Requested-With') === 'XMLHttpRequest') {
            return view($partialView, $data);
        }

        // Normal browser request → return full layout
        $data['content_view'] = $partialView;

        return view('layouts.dashboard', $data);
    }
}