<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\ContentManagementSystem;
use App\Models\DepartmentYearSubject;
use App\Models\Rates;
use App\Models\Subject;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function home()
    {
        return view('guest.guesthome');
    }

    public function about()
    {
        return view('guest.about');
    }

    public function subject()
    {
        return view('guest.subject');
    }

    public function program()
    {
        return view('guest.program');
    }

    public function signUpChoice()
    {
        return view('guest.signupchoice');
    }

    public function contact()
    {
        return view('guest.contact');
    }

    public function legal()
    {
        return view('legal.legal');
    }

    public function loadCMS()
    {
        $CMS = ContentManagementSystem::get();
        $Rates = Rates::with('sessionType', 'yearLevel', 'modality')->get();
        $subjects = DepartmentYearSubject::with('department', 'gradeLevel', 'subject')
            ->get()
            ->groupBy('subject_id')
            ->map(function ($subjectTopics) {
                $subject = $subjectTopics->first()->subject;
                $yearLevels = $subjectTopics->pluck('gradeLevel.year')->unique();
                return [
                    'id' => $subject->id,
                    'subject' => $subject->subjects,
                    'image' => $subject->image,
                    'year_levels' => $yearLevels,
                ];
            });

        $cms = [
            'carousel1' => $CMS->where('title', 'Carousel 1')->first()->image,
            'carousel2' => $CMS->where('title', 'Carousel 2')->first()->image,
            'carousel3' => $CMS->where('title', 'Carousel 3')->first()->image,
            'mission' => $CMS->where('title', 'Mission')->first()->content,
            'vision' => $CMS->where('title', 'Vision')->first()->content,
            'logo' => $CMS->where('title', 'Logo')->first()->image,
            'email' => $CMS->where('title', 'Email')->first()->content,
            'address' => $CMS->where('title', 'Address')->first()->content,
            'cp_num' => $CMS->where('title', 'Cp_num')->first()->content,
            'gmaps' => $CMS->where('title', 'Gmaps')->first()->content,
            'about_img' => $CMS->where('title', 'About')->first()->image,
            'about_txt' => $CMS->where('title', 'About')->first()->content,
            'tutorial_txt' => $CMS->where('title', 'Tutorial')->first()->content,
            'tutorial_img' => $CMS->where('title', 'Tutorial')->first()->image,
            'tagline_img' => $CMS->where('title', 'Tagline')->first()->image,
            'tagline_txt' => $CMS->where('title', 'Tagline')->first()->content
        ];
        $rates = [
            'hourly_ol_pk' => $Rates->where('year_level_id', 1)->where('session_type_id', 2)->where('modality_id', 2)->first()->rate,
            'monthly_ol_pk' => $Rates->where('year_level_id', 1)->where('session_type_id', 1)->where('modality_id', 2)->first()->rate,
            'hourly_f2f_pk' => $Rates->where('year_level_id', 1)->where('session_type_id', 2)->where('modality_id', 1)->first()->rate,
            'monthly_f2f_pk' => $Rates->where('year_level_id', 1)->where('session_type_id', 1)->where('modality_id', 1)->first()->rate,

            'hourly_ol_g1' => $Rates->where('year_level_id', 2)->where('session_type_id', 2)->where('modality_id', 2)->first()->rate,
            'monthly_ol_g1' => $Rates->where('year_level_id', 2)->where('session_type_id', 1)->where('modality_id', 2)->first()->rate,
            'hourly_f2f_g1' => $Rates->where('year_level_id', 2)->where('session_type_id', 2)->where('modality_id', 1)->first()->rate,
            'monthly_f2f_g1' => $Rates->where('year_level_id', 2)->where('session_type_id', 1)->where('modality_id', 1)->first()->rate,

            'hourly_ol_g4' => $Rates->where('year_level_id', 5)->where('session_type_id', 2)->where('modality_id', 2)->first()->rate,
            'monthly_ol_g4' => $Rates->where('year_level_id', 5)->where('session_type_id', 1)->where('modality_id', 2)->first()->rate,
            'hourly_f2f_g4' => $Rates->where('year_level_id', 5)->where('session_type_id', 2)->where('modality_id', 1)->first()->rate,
            'monthly_f2f_g4' => $Rates->where('year_level_id', 5)->where('session_type_id', 1)->where('modality_id', 1)->first()->rate,

            'hourly_ol_hs' => $Rates->where('year_level_id', 8)->where('session_type_id', 2)->where('modality_id', 2)->first()->rate,
            'monthly_ol_hs' => $Rates->where('year_level_id', 8)->where('session_type_id', 1)->where('modality_id', 2)->first()->rate,
            'hourly_f2f_hs' => $Rates->where('year_level_id', 8)->where('session_type_id', 2)->where('modality_id', 1)->first()->rate,
            'monthly_f2f_hs' => $Rates->where('year_level_id', 8)->where('session_type_id', 1)->where('modality_id', 1)->first()->rate,
        ];

        if ($cms && $rates && $subjects) {
            return response()->json([
                'success' => 'Data fetched Succesfully',
                'cms' => $cms,
                'rates' => $rates,
                'subjects' => $subjects
            ]);
        } else {
            return response()->json(['error' => 'Error fetching datas']);
        }
    }
    public function loadAdvertisements()
    {
        $today = Carbon::now()->setTimezone(config('app.timezone'))->toDateString();

        $ads = Advertisement::where('advertisement_status_id', 1)
            ->where('start_date', '<=', $today)  // The start date should be earlier or equal to today
            ->where('end_date', '>=', $today)    // The end date should be later or equal to today
            ->orderBy('advertisement_priority_status_id', 'ASC')
            ->get();

        return response()->json($ads);
    }
}
