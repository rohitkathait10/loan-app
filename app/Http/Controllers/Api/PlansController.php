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

        return $response;
    }

    /**
     * Fetch business plans
     */
    public function fetchBusinessPlan()
    {

        $response = $this->sendPlanResponse('business');

        return $response;
    }

    /**
     * Shared response handler for plans
     */
    private function sendPlanResponse($type)
    {
        $plans = Plan::where('plan_type', $type)
            ->orderBy('months', 'ASC')
            ->get(['id', 'plan_type', 'months', 'price', 'original_price', 'description']);

        if ($plans->isEmpty()) {

            return response()->json([
                'status' => false,
                'message' => 'No plans found.',
            ], 404);
        }

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
