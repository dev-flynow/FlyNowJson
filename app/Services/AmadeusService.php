<?php

namespace App\Services;

use App\DTOs\FlightOfferDTO;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class AmadeusService
{
    /**
     * Get a valid Amadeus access token, caching it for ~28 minutes.
     */
    protected function getAccessToken(): string
    {
        return Cache::remember('amadeus_access_token', 1700, function () {
            $response = Http::asForm()->post('https://test.api.amadeus.com/v1/security/oauth2/token', [
                'grant_type' => 'client_credentials',
                'client_id' => config('services.amadeus.client_id'),
                'client_secret' => config('services.amadeus.client_secret'),
            ]);

            if (! $response->successful()) {
                throw new \Exception('Failed to retrieve Amadeus access token: ' . $response->body());
            }

            return $response->json('access_token');
        });
    }

    /**
     * Search for flight offers using the Amadeus API.
     */
    public function search(array $params): array
    {
        $queryParams = [
            'adults' => $params['adults'] ?? 1,
            'travelClass' => $params['travelClass'] ?? 'ECONOMY',
            'max' => $params['max'] ?? 5,
        ];
    
        if ($params['tripType'] === 'multi') {
            foreach ($params['multiCitySegments'] as $index => $segment) {
                $queryParams["originDestinations[$index][id]"] = $index;
                $queryParams["originDestinations[$index][originLocationCode]"] = $segment['origin'];
                $queryParams["originDestinations[$index][destinationLocationCode]"] = $segment['destination'];
                $queryParams["originDestinations[$index][departureDateTime][date]"] = $segment['departureDate'];
            }
        } else {
            $queryParams['originLocationCode'] = $params['origin'];
            $queryParams['destinationLocationCode'] = $params['destination'];
            $queryParams['departureDate'] = $params['departureDate'];
            if ($params['tripType'] === 'round') {
                $queryParams['returnDate'] = $params['returnDate'];
            }
        }
    
        $response = Http::withToken($this->getAccessToken())
            ->get('https://test.api.amadeus.com/v2/shopping/flight-offers', $queryParams);
    
        if (! $response->successful()) {
            throw new \Exception('Amadeus API flight search failed: ' . $response->body());
        }
    
        return collect($response->json('data', []))->map(function ($item) use ($params) {
            $segment = $item['itineraries'][0]['segments'][0];
    
            return new FlightOfferDTO(
                $item['id'],
                $item['source'],
                $segment['departure']['iataCode'],
                $segment['arrival']['iataCode'],
                $segment['departure']['at'],
                $segment['arrival']['at'],
                $item['numberOfBookableSeats'],
                (float) $item['price']['total'],
                $segment['carrierCode'],
                $params['travelClass'] ?? 'economy',
                $params['tripType'] ?? 'oneway',
                $params['adults'] ?? 1,
                $params['child'] ?? 0,
                $params['infants'] ?? 0
            );
        })->unique('id')->toArray();
    }
    
}
