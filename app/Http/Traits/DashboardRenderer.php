<?php
// app/Http/Traits/DashboardRenderer.php

namespace App\Http\Traits;

trait DashboardRenderer
{
    protected function renderDashboard(string $partialView, array $data = [])
    {
        $data = array_merge($data, $this->getSharedData() ?? []);

        if (request()->header('X-Requested-With') === 'XMLHttpRequest') {
            return view($partialView, $data);
        }

        $data['content_view'] = $partialView;
        return view('layouts.dashboard', $data);
    }
}