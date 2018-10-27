<?php

namespace App\Http\Controllers;

use App\LogEntry;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $numberOfTripsByStudentChartData = [
            'labels' => [],
            'datasets' => [
                [
                    'backgroundColor' => 'rgba(255, 99, 132, 0.5)',
                    'borderColor' => 'rgba(255, 99, 132, 0.6)',
                    'borderWidth' => 1,
                    'data' => []
                ],
            ]
        ];

        $options = [
            'legend' => [
                'display' => false,
            ],
            'scales' => [
                'xAxes' => [
                    [
                        'ticks' => [
                            'autoSkip' => false,
                        ]
                    ]
                ],
            ],
        ];

        $students = $request->user()->students->sortByDesc(function ($student) {
            return $student->logEntries->count();
        })->each(function ($student) use (&$numberOfTripsByStudentChartData) {
            $numberOfTripsByStudentChartData['labels'][] = $student->name;
            $numberOfTripsByStudentChartData['datasets'][0]['data'][] = $student->logEntries->count();
        });

        return view('home')->with([
            'numberOfTripsByStudentChartData' => $numberOfTripsByStudentChartData,
            'options' => $options,
        ]);
    }
}
