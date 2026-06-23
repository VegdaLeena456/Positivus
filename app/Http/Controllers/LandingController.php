<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactMessageRequest;
use App\Models\ContactMessage;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class LandingController extends Controller
{
    public function index(): View
    {
        // These arrays intentionally mirror the static Figma content. Move them
        // to database-backed records when the marketing team needs editing UI.
        return view('landing', [
            'navItems' => ['About us', 'Services', 'Use Cases', 'Pricing', 'Blog'],
            'partners' => ['Amazon', 'Dribbble', 'HubSpot', 'Notion', 'Netflix', 'Zoom'],
            'services' => [
                ['title' => 'Search engine|optimization', 'tone' => 'light', 'badge' => 'green', 'image' => 'service-seo.svg'],
                ['title' => 'Pay-per-click|advertising', 'tone' => 'green', 'badge' => 'white', 'image' => 'service-ppc.svg'],
                ['title' => 'Social Media|Marketing', 'tone' => 'dark', 'badge' => 'white', 'image' => 'service-social.svg'],
                ['title' => 'Email|Marketing', 'tone' => 'light', 'badge' => 'green', 'image' => 'service-email.svg'],
                ['title' => 'Content|Creation', 'tone' => 'green', 'badge' => 'white', 'image' => 'service-content.svg'],
                ['title' => 'Analytics and|Tracking', 'tone' => 'dark', 'badge' => 'green', 'image' => 'service-analytics.svg'],
            ],
            'processSteps' => [
                ['number' => '01', 'title' => 'Consultation', 'body' => 'During the initial consultation, we will discuss your business goals and objectives, target audience, and current marketing efforts. This will allow us to understand your needs and tailor our services to best fit your requirements.'],
                ['number' => '02', 'title' => 'Research and Strategy Development', 'body' => 'We research your market, competitors, and audience behavior, then develop a customized strategy designed to reach your business goals.'],
                ['number' => '03', 'title' => 'Implementation', 'body' => 'Our team executes the strategy across the selected channels, launching campaigns, content, tracking, and optimization systems.'],
                ['number' => '04', 'title' => 'Monitoring and Optimization', 'body' => 'We continuously monitor performance and make data-driven adjustments to improve results and maximize return on investment.'],
                ['number' => '05', 'title' => 'Reporting and Communication', 'body' => 'We provide regular reports and clear communication so you always understand what is happening, what is working, and what comes next.'],
                ['number' => '06', 'title' => 'Continual Improvement', 'body' => 'We use every result as insight for the next improvement cycle, helping your digital marketing performance grow over time.'],
            ],
            'team' => [
                ['name' => 'John Smith', 'role' => 'CEO and Founder', 'bio' => '10+ years of experience in digital marketing. Expertise in SEO, PPC, and content strategy.'],
                ['name' => 'Jane Doe', 'role' => 'Director of Operations', 'bio' => '7+ years of experience in project management and team leadership. Strong organizational and communication skills.'],
                ['name' => 'Michael Brown', 'role' => 'Senior SEO Specialist', 'bio' => '5+ years of experience in SEO and content optimization.'],
                ['name' => 'Emily Johnson', 'role' => 'PPC Manager', 'bio' => '3+ years of experience in paid search advertising. Skilled in campaign management and performance analysis.'],
                ['name' => 'Brian Williams', 'role' => 'Social Media Specialist', 'bio' => '4+ years of experience in social media marketing. Proficient in creating and scheduling content, analyzing metrics, and building engagement.'],
                ['name' => 'Sarah Kim', 'role' => 'Content Creator', 'bio' => '2+ years of experience in writing and editing. Skilled in creating compelling, SEO-optimized content for various industries.'],
            ],
            'testimonials' => [
                ['quote' => 'We have been working with Positivus for the past year and have seen a significant increase in website traffic and leads as a result of their efforts. The team is professional, responsive, and truly cares about the success of our business. We highly recommend Positivus to any company looking to grow their online presence.', 'author' => 'John Smith', 'role' => 'Marketing Director at XYZ Corp'],
                ['quote' => 'We have been working with Positivus for the past year and have seen a significant increase in website traffic and leads as a result of their efforts. The team is professional, responsive, and truly cares about the success of our business. We highly recommend Positivus to any company looking to grow their online presence.', 'author' => 'John Smith', 'role' => 'Marketing Director at XYZ Corp'],
                ['quote' => 'We have been working with Positivus for the past year and have seen a significant increase in website traffic and leads as a result of their efforts. The team is professional, responsive, and truly cares about the success of our business. We highly recommend Positivus to any company looking to grow their online presence.', 'author' => 'John Smith', 'role' => 'Marketing Director at XYZ Corp'],
            ],
        ]);
    }

    public function store(StoreContactMessageRequest $request): RedirectResponse
    {
        ContactMessage::create($request->validated());

        return back()->with('status', 'Thanks. We will get back to you shortly.');
    }
}
