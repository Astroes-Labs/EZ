<?php
function flattenBlade($filePath, $basePath = null) {
    //$basePath = $basePath ?? resource_path('views');
    $content = file_get_contents($filePath);

    // Match @include('...') and replace
    $pattern = "/@include\(['\"]([^)]+)['\"]\)/";
    return preg_replace_callback($pattern, function($matches) use ($basePath) {
        $includePath = str_replace('.', '/', $matches[1]) . '.blade.php';
        $fullPath = $basePath . '/' . $includePath;
        if (!file_exists($fullPath)) return "<!-- Missing include: {$matches[1]} -->";
        return flattenBlade($fullPath, $basePath);
    }, $content);
}

// Usage

$dashboardFile = 'C:/xampp/htdocs/furher/furher/Laravel Projects/MNP26/resources/views/livewire/dashboard/home.blade.php';
$flattenedFile = 'C:/xampp/htdocs/furher/furher/Laravel Projects/MNP26/resources/views/livewire/dashboard_flat.blade.php';

$flattened = flattenBlade($dashboardFile);
file_put_contents($flattenedFile, $flattened);