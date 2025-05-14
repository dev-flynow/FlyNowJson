<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Services\AmadeusService;

class FlightSearch extends Component
{
    public $origin = '';
    public $destination = '';
    public $departureDate = '';
    public $returnDate = null;
    public $adults = 1;
    public $child = 0;
    public $infants = 0;
    public $results = [];
    public $tripType = 'oneway';
    public $travelClass = '';
    public bool $hasSearched = false;
    


    public function search()
    {
        $this->hasSearched = true;
        
        $this->validate([
            'origin'        => 'required|size:3',
            'destination'   => 'required|size:3',
            'departureDate' => 'required|date|after_or_equal:today',
            'returnDate'    => $this->tripType === 'round' ? 'required|after_or_equal:today|date|after_or_equal:departureDate' : 'nullable',
            'adults'        => 'required|integer|min:1',
            'child'         => 'nullable|integer|min:0',
            'infants'       => 'nullable|integer|min:0',
            'tripType'      => 'required|in:oneway,round',
            'travelClass'   => 'required|in:economy,business,first-class,premium-economy',
        ]);

        $params = [
            'origin'        => strtoupper($this->origin),
            'destination'   => strtoupper($this->destination),
            'departureDate' => $this->departureDate,
            'returnDate'    => $this->returnDate,
            'adults'        => $this->adults,
            'child'         => $this->child,
            'infants'       => $this->infants,
            'tripType'      => $this->tripType,
            'travelClass'   => $this->travelClass,
            'max'           => 5,
        ];

       
        $service = new AmadeusService();

        try {
            $dtoResults = $service->search($params);

            $this->results = array_map(function ($dto) {
                $data = $dto->toArray();

                // Format departure and arrival times
                if (!empty($data['departureTime'])) {
                    $data['departureTime'] = Carbon::parse($data['departureTime'])->format('D, d M Y H:i');
                }
                if (!empty($data['arrivalTime'])) {
                    $data['arrivalTime'] = Carbon::parse($data['arrivalTime'])->format('D, d M Y H:i');
                }

                // Calculate duration
                if (!empty($data['departureTime']) && !empty($data['arrivalTime'])) {
                    try {
                        $departure = Carbon::parse($data['departureTime']);
                        $arrival = Carbon::parse($data['arrivalTime']);
                        $data['duration'] = $departure->diff($arrival)->format('%h hrs %i mins');
                    } catch (\Exception $e) {
                        $data['duration'] = 'Unknown';
                    }
                } else {
                    $data['duration'] = 'Unknown';
                }

                return $data;
            }, $dtoResults);

            session()->put('flight_search_results', $this->results);
        } catch (\Exception $e) {
            $this->addError('search', 'Flight search failed: ' . $e->getMessage());
        }
    }
   

    public function render()
    {
        $results = session()->get('flight_search_results', []);
        $grouped = collect($results)->groupBy('airline');
    
        $finalResults = collect();
    
        foreach ($grouped as $airlineFlights) {
            $finalResults = $finalResults->concat($airlineFlights->take(3));
        }
    
        if ($finalResults->count() < 5) {
            $remaining = collect($this->results)->take(5 - $finalResults->count());
            $finalResults = $finalResults->concat($remaining);
        }
    
        $paginatedResults = new LengthAwarePaginator(
            $finalResults->forPage(request()->get('page', 1), 5),
            $finalResults->count(),
            5,
            request()->get('page', 1),
            ['path' => request()->url(), 'query' => request()->query()]
        );
    
        return view('livewire.flight-search', [
            'paginatedResults' => $paginatedResults,
        ]);
    }
}
