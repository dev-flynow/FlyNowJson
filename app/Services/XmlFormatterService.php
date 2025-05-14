<?php

namespace App\Services;

use App\DTOs\FlightOfferDTO;
use SimpleXMLElement;

class XmlFormatterService
{
    /**
     * Convert an array of FlightOfferDTO objects into XML format.
     *
     * @param FlightOfferDTO[] $offers
     * @return string
     */
    public function format(array $offers): string
    {
        $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><FlightOffers></FlightOffers>');

        foreach ($offers as $offer) {
            $this->addOfferToXml($xml, $offer);
        }

        return $xml->asXML();
    }

    /**
     * Append a single FlightOfferDTO as XML.
     *
     * @param SimpleXMLElement $xml
     * @param FlightOfferDTO $offer
     */
    protected function addOfferToXml(SimpleXMLElement $xml, FlightOfferDTO $offer): void
    {
        $offerElement = $xml->addChild('FlightOffer');

        $offerElement->addChild('Id', $offer->id);
        $offerElement->addChild('Source', $offer->source);
        $offerElement->addChild('Origin', $offer->origin);
        $offerElement->addChild('Destination', $offer->destination);
        $offerElement->addChild('DepartureTime', $offer->departureTime);
        $offerElement->addChild('ArrivalTime', $offer->arrivalTime);
        $offerElement->addChild('Seats', $offer->seats);
        $offerElement->addChild('Price', $offer->price);
        $offerElement->addChild('Airline', $offer->airline);
        $offerElement->addChild('TravelClass', $offer->travelClass);
        $offerElement->addChild('TripType', $offer->tripType);
        $offerElement->addChild('Adults', $offer->adults);
        $offerElement->addChild('Children', $offer->child);
        $offerElement->addChild('Infants', $offer->infants);
    }
}
