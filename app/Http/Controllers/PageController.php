<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;

class PageController extends Controller
{
    public function home(): Response
    {
        return Inertia::render('Home');
    }

    public function startHere(): Response
    {
        return Inertia::render('StartHere');
    }

    public function connect(): Response
    {
        return Inertia::render('Connect');
    }

    public function whoWeAre(): Response
    {
        return Inertia::render('WhoWeAre');
    }

    public function ministries(): Response
    {
        return Inertia::render('Ministries/Index');
    }

    public function kidsMinistry(): Response
    {
        return Inertia::render('Ministries/Kids');
    }

    public function youthMinistry(): Response
    {
        return Inertia::render('Ministries/Youth');
    }

    public function adultGroups(): Response
    {
        return Inertia::render('Ministries/AdultGroups');
    }

    public function privacy(): Response
    {
        return Inertia::render('Legal/PrivacyPolicy', [
            'embedId' => (string) (config('legal.privacy_embed_id') ?? ''),
        ]);
    }

    public function terms(): Response
    {
        return Inertia::render('Legal/Terms', [
            'embedId' => (string) (config('legal.terms_embed_id') ?? ''),
        ]);
    }
}
