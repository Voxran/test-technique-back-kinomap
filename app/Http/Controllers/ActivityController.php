<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActivityController extends Controller
{
    public function list()
    {

        // Could aggregate activities
        // Pagination is done by Laravel with parameter ?page=X, default 15 objects per page
        return DB::table('activities')->paginate();

    }
}
