<?php

namespace App\Widgets;

use App\Models\Airline;
use App\Models\Pirep;
use App\Models\User;
use App\Contracts\Widget;
use App\Models\Enums\PirepState;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class TopPilotsByAirline extends Widget
{
    public $title = 'Top Pilots by Airline';

    public $description = 'Shows the pilots with the most accepted flights for a specific airline.';

    protected $config = [
    'airline_id' => null,  // null = all airlines
    'limit' => 5,          // number of pilots to show
    ];

    public function run()
    {
        $now = Carbon::now()->locale(app()->getLocale());
        $airline_id = $this->config['airline_id'];
        $limit     = $this->config['limit'];

        $month = $now->startOfMonth()->isoFormat('MMMM');

        $cargo_search_text = '%cargo%';
        
        $cargo_airline_result = DB::table('airlines')
            ->selectRaw('id')
            ->where('name', 'like', $cargo_search_text)
            ->first();

        $cargo_airline = $cargo_airline_result->id;

        // Base query: count ACCEPTED PIREPs grouped by pilot
        $query = Pirep::where('state', PirepState::ACCEPTED)
            // Filter by current month
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year);

        // Filter by airline if provided
        if ($airline_id==$cargo_airline) {
            $query->where('airline_id', $airline_id);
        }
        elseif (isset($airline_id)) {
            // airline_id <> than cargo, will consider all other as passenger flights
            $query->where('airline_id', '<>', $cargo_airline);
        }

        $topPilots = $query
            ->selectRaw('user_id, COUNT(*) as flights')
            ->with('user')
            ->groupBy('user_id')
            ->orderByDesc('flights')   // best → worst
            ->limit($limit)
            ->get();

        $airline = $airline_id ? Airline::find($airline_id) : null;

        return view('widgets.top_pilots_by_airline', [
            'pilots' => $topPilots,
            'airline' => $airline,
            'month' => $month,
            'cargo_airline' => $cargo_airline,
        ]);
    }
}