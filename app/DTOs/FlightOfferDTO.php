<?php

namespace App\DTOs;

class FlightOfferDTO
{
    public $id;
    public $source;
    public $origin;
    public $destination;
    public $departureTime;
    public $arrivalTime;
    public $seats;
    public $price;
    public $airline;
    public $travelClass;
    public $tripType;
    public $adults;
    public $child;
    public $infants;
    public $name; // NEW
    public $logo; // NEW

    public function __construct(
        $id,
        $source,
        $origin,
        $destination,
        $departureTime,
        $arrivalTime,
        $seats,
        $price,
        $airline,
        $travelClass,
        $tripType,
        $adults,
        $child,
        $infants,
        $name = null,   // optional
        $logo = null    // optional
    ) {
        $this->id = $id;
        $this->source = $source;
        $this->origin = $origin;
        $this->destination = $destination;
        $this->departureTime = $departureTime;
        $this->arrivalTime = $arrivalTime;
        $this->seats = $seats;
        $this->price = $price;
        $this->airline = $airline;
        $this->travelClass = $travelClass;
        $this->tripType = $tripType;
        $this->adults = $adults;
        $this->child = $child;
        $this->infants = $infants;
        $this->name = $name;
        $this->logo = $logo;
    }

    public function toArray(): array
    {
        return [
            'id'            => $this->id,
            'source'        => $this->source,
            'origin'        => $this->origin,
            'destination'   => $this->destination,
            'departureTime' => $this->departureTime,
            'arrivalTime'   => $this->arrivalTime,
            'seats'         => $this->seats,
            'price'         => $this->price,
            'airline'       => $this->airline,
            'travelClass'   => $this->travelClass,
            'tripType'      => $this->tripType,
            'adults'        => $this->adults,
            'child'         => $this->child,
            'infants'       => $this->infants,
            'name'          => $this->name,  // NEW
            'logo'          => $this->logo,  // NEW
        ];
    }
}
