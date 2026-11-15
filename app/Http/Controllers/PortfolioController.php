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
        return response()->json(config('portfolio'));
    }
}
