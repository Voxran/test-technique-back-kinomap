<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function list()
    {

        // Could aggregate users
        // Pagination is done by Laravel with parameter ?page=X, default 15 objects per page
        return DB::table('users')->paginate();

    }

    public function user_activity(?int $userId, ?int $activityId){

        if(empty($userId) || empty($activityId)){
            return new JsonResponse(['Empty request'], 400);

            // If only empty $activityId, can return all activities for this user
        }

        $activityData = DB::table('activity_data')
            ->select('*')
            ->where('user_id', '=', intval($userId))
            ->where('activity_id', '=', intval($activityId))
            ->get();

        // No activity for this user, or no user
        if(empty($activityData->all())){
            return new JsonResponse(['No data found'], 400);
        }

        // Get average speed
        $avgSpeedForActivity = DB::table('activity_data')
            ->where('user_id', '=', intval($userId))
            ->where('activity_id', '=', intval($activityId))
            ->avg('speed');

        // Aggregate 1 user with X points for this activity
        $data = array(
            'user_id' => $userId, 
            'activity_id' => $activityId,
            'average_speed' => round($avgSpeedForActivity, 2),
            'points' => array()
        );

        foreach($activityData as $point){
            $data['points'][] = array(
                'time' => $point->point_in_time,
                'speed' => $point->speed
            );
        }

        return new JsonResponse($data, 200);

    }
}
