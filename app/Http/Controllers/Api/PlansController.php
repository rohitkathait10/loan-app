<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use App\Models\Plan;

class PlansController extends Controller
{
    /**
     * Fetch personal plans
     */
    public function fetchPersonalPlan()
    {
        $response = $this->sendPlanResponse('personal');

        // Log the returned response
        Log::info('Personal Plan Response:', [
            'response' => $response->getData(true)
        ]);

        return $response;
    }

    /**
     * Fetch business plans
     */
    public function fetchBusinessPlan()
    {
        Log::info('Business plan fetch request received.');

        $response = $this->sendPlanResponse('business');

        // Log the response
        Log::info('Business Plan Response:', [
            'response' => $response->getData(true)
        ]);

        return $response;
    }

    /**
     * Shared response handler for plans
     */
    private function sendPlanResponse($type)
    {
        // Fetch from DB instead of config
        $plans = Plan::where('plan_type', $type)
                    ->orderBy('months', 'ASC')
                    ->get(['id', 'plan_type', 'months', 'price', 'original_price', 'description']);

        if ($plans->isEmpty()) {
            Log::warning("No plans found for type: $type");

            return response()->json([
                'status' => false,
                'message' => 'No plans found.',
            ], 404);
        }

        Log::info("Plans fetched successfully", [
            'plan_type' => $type,
            'count' => $plans->count()
        ]);

        return response()->json([
            'status' => true,
            'message' => ucfirst($type) . " plans fetched successfully.",
            'data' => [
                'plan_type' => $type,
                'plans' => $plans
            ]
        ], 200);
    }
}
