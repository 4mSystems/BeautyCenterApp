<?php

declare(strict_types=1);

namespace App\Charts;

use App\Reservation;
use App\User;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use ConsoleTVs\Charts\Registrar as Charts;

class SalonChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $users = Reservation::selectRaw('COUNT(*) as count, YEAR(created_at) year, MONTHNAME(created_at) month')
            ->groupBy('year', 'month')
            ->orderBy('created_at', 'ASC')
            ->get();
        $count_array = [];
        $month_array = [];
        foreach ($users as $user) {
            $count_array[] = $user->count;
            $month_array[] = $user->month;
        }
        return Chartisan::build()
            ->labels($month_array)
            ->dataset('Counts', $count_array);
    }
}
