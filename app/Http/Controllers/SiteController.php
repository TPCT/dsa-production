<?php

namespace App\Http\Controllers;

use App\Models\Candidate\Candidate;
use App\Models\City;
use App\Models\Cluster\Cluster;
use App\Models\ContactUs;
use App\Models\Dropdown\Dropdown;
use App\Models\News\News;
use App\Models\Page\Page;
use App\Models\Party\Party;
use App\Models\Slider\Slider;
use App\Settings\Site;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class SiteController extends Controller
{
    public function index(Request $request){
        $header = Dropdown::whereSlug('homepage-header')->first()?->blocks->first();
        $welcome_section = Dropdown::whereSlug('homepage-welcome-section')->first()?->blocks->first();
        $second_section = Dropdown::whereSlug('homepage-second-section')->first()?->blocks->first();
        $news = News::whereCategory(News::NewsPiece)->get();
        $characters_slider = Slider::whereSlug('characters')->first();
        $blogs = News::whereCategory(News::BlogsPiece)->get();

        return $this->view('Site.homepage', [
            'header' => $header,
            'welcome_section' => $welcome_section,
            'second_section' => $second_section,
            'news' => $news,
            'characters_slider' => $characters_slider,
            'blogs' => $blogs
        ]);
    }

    public function aboutUs(Request $request){
        $header = Dropdown::whereSlug('about-us-header')->first()?->blocks->first();
        $journey = Dropdown::whereSlug('about-us-journey')->first()?->blocks->first();
        $mission = Dropdown::whereSlug('about-us-mission')->first()?->blocks->first();
        $vision = Dropdown::whereSlug('about-us-vision')->first()?->blocks->first();

        return $this->view('Site.about-us', [
            'header' => $header,
            'journey' => $journey,
            'mission' => $mission,
            'vision' => $vision
        ]);
    }

    public function contactUs(Request $request){
        $header = Dropdown::whereSlug('contact-us-header')->first()?->blocks->first();
        $contact_us_form = Dropdown::whereSlug('contact-us-form')->first()?->blocks->first();
        $contact_us_footer = Dropdown::whereSlug('contact-us-footer')->first()?->blocks->first();

        return $this->view('Site.contact-us', [
            'header' => $header,
            'contact_us_form' => $contact_us_form,
            'contact_us_footer' => $contact_us_footer
        ]);
    }

    public function show(): bool|\Illuminate\Http\JsonResponse|string
    {
        $segments = \request()->segments();
        $prefix = implode(
            '/',
            array_slice($segments, \request()->route()->hasParameter('section') ? 2 : 1, -1)
        );

        $prefix = $prefix ?: null;
        $slug = last($segments);


        $page = Page::active()
            ->directAccess()
            ->whereSlug($slug)
            ->wherePrefix($prefix)
            ->whereDoesntHave('sections')
            ->first();

        if (!$page){
            $prefix = implode('/', array_slice($segments, 2, -1));
            $prefix = $prefix ?: null;

            $page = Page::active()
                        ->directAccess()
                        ->whereSlug($slug)
                        ->wherePrefix($prefix)
                        ->first();
        }

        if (!$page)
            throw new NotFoundHttpException();

        $view = strtolower(explode(' ', $page->view)[0]);
        return $this->view('Pages.' . $view, compact('page'));
    }
}
