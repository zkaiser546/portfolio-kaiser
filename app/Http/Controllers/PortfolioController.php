<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class PortfolioController extends Controller
{
    /**
     * Serve the portfolio content as JSON for the Vue SPA.
     */
    public function show(): JsonResponse
    {
        // All portfolio content lives in config/portfolio.php
        // JSON_UNESCAPED_UNICODE keeps curly quotes / dashes as real UTF-8.
        return response()
            ->json(config('portfolio'), 200, [
                'Content-Type' => 'application/json; charset=UTF-8',
            ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }
}
