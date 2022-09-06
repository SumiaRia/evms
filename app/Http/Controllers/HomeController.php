<?php

namespace App\Http\Controllers;

use App\Setting;
use App\Speaker;
use App\Schedule;
use App\Venue;
use App\Hotel;
use App\Gallery;
use App\Sponsor;
use App\Faq;
use App\Price;
use App\Price2;
use App\Amenity;
use App\Amenity2;
use App\Service;

class HomeController extends Controller
{
    public function index()
    {
        $settings = Setting::pluck('value', 'key');
        $speakers = Speaker::all();
        $schedules = Schedule::with('speaker')
            ->orderBy('start_time', 'asc')
            ->get()
            ->groupBy('day_number');
        $venues = Venue::all();
        $hotels = Hotel::all();
        $galleries = Gallery::all();
        $sponsors = Sponsor::all();
        $faqs = Faq::all();
        $prices = Price::with('amenities')->get();
        $amenities = Amenity::with('prices')->get();
        $services=Service::all();
        $idents=1;

        return view('home', compact('settings', 'speakers', 'schedules', 'venues', 'hotels', 'galleries', 'sponsors', 'faqs', 'prices', 'amenities','services','idents'));
    }

    public function view(Speaker $speaker)
    {
        $settings = Setting::pluck('value', 'key');
        
        return view('speaker', compact('settings', 'speaker'));
    }
    public function price()
    {
        $settings = Setting::pluck('value', 'key');
        $prices = Price::with('amenities')->get();
        $amenities = Amenity::with('prices')->get();
        return view('price',compact('settings','prices','amenities'));
    }
    public function price2()
    {
        $settings = Setting::pluck('value', 'key');
        $prices2 = Price2::with('amenities2')->get();
        $amenities2 = Amenity2::with('prices2')->get();
        //echo $amenities;
        return view('price2',compact('settings','prices2','amenities2'));
    }
}
