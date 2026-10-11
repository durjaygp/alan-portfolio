<?php

if (! function_exists('uploads_asset')) {
    /**
     * Resolve an asset URL for uploaded files, static assets, or external media.
     */
    function uploads_asset(?string $path, ?string $fallback = null): ?string
    {
        if (empty($path)) {
            return $fallback ? uploads_asset($fallback) : null;
        }

        // External or Base64 / SVG data URLs
        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://') || str_starts_with($path, 'data:')) {
            return $path;
        }

        $cleanPath = ltrim($path, '/\\');

        // Already prefixed with 'uploads/'
        if (str_starts_with($cleanPath, 'uploads/')) {
            return asset($cleanPath);
        }

        // Already prefixed with 'storage/'
        if (str_starts_with($cleanPath, 'storage/')) {
            return asset($cleanPath);
        }

        // Static theme assets (e.g. alanhumphreys/...)
        if (str_starts_with($cleanPath, 'alanhumphreys/')) {
            return asset($cleanPath);
        }

        // Check if file exists in public/uploads/
        if (file_exists(public_path('uploads/'.$cleanPath))) {
            return asset('uploads/'.$cleanPath);
        }

        // Check if file exists directly in public/
        if (file_exists(public_path($cleanPath))) {
            return asset($cleanPath);
        }

        // Check if file exists in public/storage/
        if (file_exists(public_path('storage/'.$cleanPath))) {
            return asset('storage/'.$cleanPath);
        }

        // Fallback default path inside uploads
        return asset('uploads/'.$cleanPath);
    }
}
