<?php

namespace App\Http\Controllers;

use App\Models\ContentManagementSystem;
use App\Models\Department;
use App\Models\DepartmentYearSubject;
use App\Models\Rates;
use App\Models\Subject;
use App\Models\UserProfile;
use App\Models\YearLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Mockery\Matcher\Subset;

class CMSController extends Controller
{
    public function index()
    {
        $Subjects = Subject::get();
        $YearLevels = YearLevel::get();
        $Departments = Department::get();
        return view('head_admin.headadmincms', compact('Subjects', 'YearLevels', 'Departments'));
    }

    public function loadContents()
    {
        $CMS = ContentManagementSystem::get();
        $Rates = Rates::with('sessionType', 'yearLevel', 'modality')->get();

        $Topics = DepartmentYearSubject::with('department', 'gradeLevel', 'subject')->get();
        $Subjects = Subject::get();

        //dd($CMS,$Rates,$Topics,$Subjects);
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


        if ($cms && $rates) {
            return response()->json([
                'success' => 'Data fetched Succesfully',
                'cms' => $cms,
                'rates' => $rates,
                'topics' => $Topics,
                'subjects' => $Subjects,
            ]);
        } else {
            return response()->json(['error' => 'Error fetching datas']);
        }
    }
    public function updateContents(Request $request)
    {
        $request->validate([
            'home_img' => 'nullable|image|mimes:jpeg,png,jpg',
            'carousel1_img' => 'nullable|image|mimes:jpeg,png,jpg',
            'carousel2_img' => 'nullable|image|mimes:jpeg,png,jpg',
            'carousel3_img' => 'nullable|image|mimes:jpeg,png,jpg',
            'about_img' => 'nullable|image|mimes:jpeg,png,jpg',
            'tutorial_img' => 'nullable|image|mimes:jpeg,png,jpg',
            'about_text' => 'nullable|string',
            'tutorial_text' => 'nullable|string',
        ]);

        $aboutText = $request->input('about_text');
        $tutorialText = $request->input('tutorial_text');

        if ($aboutText) {
            $CMS = ContentManagementSystem::where('title', 'About')->first();
            if ($CMS) {
                $CMS->content = $aboutText;
                $CMS->save();
            } else {
                return response()->json(['error' => 'Error updating content']);
            }
        }

        if ($tutorialText) {
            $CMS = ContentManagementSystem::where('title', 'Tutorial')->first();
            if ($CMS) {
                $CMS->content = $tutorialText;
                $CMS->save();
            } else {
                return response()->json(['error' => 'Error updating content']);
            }
        }

        $images = [
            'home_img' => 'Tagline',
            'carousel1_img' => 'Carousel 1',
            'carousel2_img' => 'Carousel 2',
            'carousel3_img' => 'Carousel 3',
            'about_img' => 'About',
            'tutorial_img' => 'Tutorial',
        ];

        foreach ($images as $field => $title) {
            if ($request->has($field)) {
                try {
                    $file = $request->file($field);
                    $extension = $file->getClientOriginalExtension();
                    $filename = Str::random(10) . '.' . $extension;
                    $path = 'scribbles_assets/';
                    $file->move($path, $filename);
                    $image = ['image' => $path . $filename];
                    ContentManagementSystem::where('title', $title)->update($image);
                } catch (\Exception $e) {
                    return response()->json(['error' => 'Error updating content']);
                }
            }
        }

        return response()->json(['success' => 'Content updated successfully']);
    }
    public function updateOrgContent(Request $request)
    {
        //dd($request->all());
        /*$request->validate([
            'logo' => 'nullable|image|mimes:jpeg,png,jpg',
            'email' => 'nullable|string',
            'cpnum' => 'nullable|int',
            'tagline' => 'nullable|string',
            'mission' => 'nullable|string',
            'vision' => 'nullable|string',
            'address' => 'nullable|string',
            'mapSrc' => 'nullable|string',
        ]);*/
        

        $email = $request->input('email');
        $cpnum = $request->input('cpnum');
        $tagline = $request->input('tagline');
        $mission = $request->input('mission');
        $vision = $request->input('vision');
        $address = $request->input('address');
        $mapSrc = $request->input('mapSrc');

        $strings = [
            'Email' => $email,
            'Cp_num' => $cpnum,
            'Tagline' => $tagline,
            'Mission' => $mission,
            'Vision' => $vision,
            'Address' => $address,
            'Gmaps' => $mapSrc,
        ];

        foreach ($strings as $title => $field) {
            if ($field) {
                try {
                    ContentManagementSystem::where('title', $title)->update(['content' => $field]);
                } catch (\Exception $e) {
                    return response()->json(['error' => 'Error updating content']);
                }
            }
        }

        if ($request->has('logo')) {

            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension();

            $filename = Str::random(10) . '.' . $extension;

            $path = 'scribbles_assets/';

            $file->move($path, $filename);

            $logo = ['image' => $path . $filename];

            ContentManagementSystem::where('title', 'Logo')->update($logo);
        }
        return response()->json(['success' => 'Content updated successfully']);
    }
    public function updateRates(Request $request)
    {

        try {
            $request->validate([
                'hour_ol_pk' => 'nullable|int',
                'month_ol_pk' => 'nullable|int',
                'hour_f2f_pk' => 'nullable|int',
                'month_f2f_pk' => 'nullable|int',

                'hour_ol_g1' => 'nullable|int',
                'month_ol_g1' => 'nullable|int',
                'hour_f2f_g1' => 'nullable|int',
                'month_f2f_g1' => 'nullable|int',

                'hour_ol_g4' => 'nullable|int',
                'month_ol_g4' => 'nullable|int',
                'hour_f2f_g4' => 'nullable|int',
                'month_f2f_g4' => 'nullable|int',

                'hour_ol_hs' => 'nullable|int',
                'month_ol_hs' => 'nullable|int',
                'hour_f2f_hs' => 'nullable|int',
                'month_f2f_hs' => 'nullable|int',
            ]);

            // Update PK rates
            if ($hour_ol_pk = $request->input('hour_ol_pk')) {
                $rate = Rates::where('year_level_id', 1)
                    ->where('session_type_id', 2)
                    ->where('modality_id', 2)
                    ->first();
                if ($rate) {
                    $rate->update(['rate' => $hour_ol_pk]);
                }
            }
            if ($month_ol_pk = $request->input('month_ol_pk')) {
                $rate = Rates::where('year_level_id', 1)
                    ->where('session_type_id', 1)
                    ->where('modality_id', 2)
                    ->first();
                if ($rate) {
                    $rate->update(['rate' => $month_ol_pk]);
                }
            }
            if ($hour_f2f_pk = $request->input('hour_f2f_pk')) {
                $rate = Rates::where('year_level_id', 1)
                    ->where('session_type_id', 2)
                    ->where('modality_id', 1)
                    ->first();
                if ($rate) {
                    $rate->update(['rate' => $hour_f2f_pk]);
                }
            }
            if ($month_f2f_pk = $request->input('month_f2f_pk')) {
                $rate = Rates::where('year_level_id', 1)
                    ->where('session_type_id', 1)
                    ->where('modality_id', 1)
                    ->first();
                if ($rate) {
                    $rate->update(['rate' => $month_f2f_pk]);
                }
            }

            // Update G1-G3 rates
            if ($hour_ol_g1 = $request->input('hour_ol_g1')) {
                foreach (range(2, 4) as $yearLevelId) {
                    $rate = Rates::where('year_level_id', $yearLevelId)
                        ->where('session_type_id', 2)
                        ->where('modality_id', 2)
                        ->first();
                    if ($rate) {
                        $rate->update(['rate' => $hour_ol_g1]);
                    }
                }
            }
            if ($month_ol_g1 = $request->input('month_ol_g1')) {
                foreach (range(2, 4) as $yearLevelId) {
                    $rate = Rates::where('year_level_id', $yearLevelId)
                        ->where('session_type_id', 1)
                        ->where('modality_id', 2)
                        ->first();
                    if ($rate) {
                        $rate->update(['rate' => $month_ol_g1]);
                    }
                }
            }
            if ($hour_f2f_g1 = $request->input('hour_f2f_g1')) {
                foreach (range(2, 4) as $yearLevelId) {
                    $rate = Rates::where('year_level_id', $yearLevelId)
                        ->where('session_type_id', 2)
                        ->where('modality_id', 1)
                        ->first();
                    if ($rate) {
                        $rate->update(['rate' => $hour_f2f_g1]);
                    }
                }
            }
            if ($month_f2f_g1 = $request->input('month_f2f_g1')) {
                foreach (range(2, 4) as $yearLevelId) {
                    $rate = Rates::where('year_level_id', $yearLevelId)
                        ->where('session_type_id', 1)
                        ->where('modality_id', 1)
                        ->first();
                    if ($rate) {
                        $rate->update(['rate' => $month_f2f_g1]);
                    }
                }
            }

            // Update G4-G6 rates
            if ($hour_ol_g4 = $request->input('hour_ol_g4')) {
                foreach (range(5, 7) as $yearLevelId) {
                    $rate = Rates::where('year_level_id', $yearLevelId)
                        ->where('session_type_id', 2)
                        ->where('modality_id', 2)
                        ->first();
                    if ($rate) {
                        $rate->update(['rate' => $hour_ol_g4]);
                    }
                }
            }
            if ($month_ol_g4 = $request->input('month_ol_g4')) {
                foreach (range(5, 7) as $yearLevelId) {
                    $rate = Rates::where('year_level_id', $yearLevelId)
                        ->where('session_type_id', 1)
                        ->where('modality_id', 2)
                        ->first();
                    if ($rate) {
                        $rate->update(['rate' => $month_ol_g4]);
                    }
                }
            }
            if ($hour_f2f_g4 = $request->input('hour_f2f_g4')) {
                foreach (range(5, 7) as $yearLevelId) {
                    $rate = Rates::where('year_level_id', $yearLevelId)
                        ->where('session_type_id', 2)
                        ->where('modality_id', 1)
                        ->first();
                    if ($rate) {
                        $rate->update(['rate' => $hour_f2f_g4]);
                    }
                }
            }
            if ($month_f2f_g4 = $request->input('month_f2f_g4')) {
                foreach (range(5, 7) as $yearLevelId) {
                    $rate = Rates::where('year_level_id', $yearLevelId)
                        ->where('session_type_id', 1)
                        ->where('modality_id', 1)
                        ->first();
                    if ($rate) {
                        $rate->update(['rate' => $month_f2f_g4]);
                    }
                }
            }

            // Update G7-G10 rates
            if ($hour_ol_hs = $request->input('hour_ol_hs')) {
                foreach (range(8, 11) as $yearLevelId) {
                    $rate = Rates::where('year_level_id', $yearLevelId)
                        ->where('session_type_id', 2)
                        ->where('modality_id', 2)
                        ->first();
                    if ($rate) {
                        $rate->update(['rate' => $hour_ol_hs]);
                    }
                }
            }
            if ($month_ol_hs = $request->input('month_ol_hs')) {
                foreach (range(8, 11) as $yearLevelId) {
                    $rate = Rates::where('year_level_id', $yearLevelId)
                        ->where('session_type_id', 1)
                        ->where('modality_id', 2)
                        ->first();
                    if ($rate) {
                        $rate->update(['rate' => $month_ol_hs]);
                    }
                }
            }
            if ($hour_f2f_hs = $request->input('hour_f2f_hs')) {
                foreach (range(8, 11) as $yearLevelId) {
                    $rate = Rates::where('year_level_id', $yearLevelId)
                        ->where('session_type_id', 2)
                        ->where('modality_id', 1)
                        ->first();
                    if ($rate) {
                        $rate->update(['rate' => $hour_f2f_hs]);
                    }
                }
            }
            if ($month_f2f_hs = $request->input('month_f2f_hs')) {
                foreach (range(8, 11) as $yearLevelId) {
                    $rate = Rates::where('year_level_id', $yearLevelId)
                        ->where('session_type_id', 1)
                        ->where('modality_id', 1)
                        ->first();
                    if ($rate) {
                        $rate->update(['rate' => $month_f2f_hs]);
                    }
                }
            }

            return response()->json(['success' => 'Rates updated successfully']);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => 'Validation failed', 'errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred', 'message' => $e->getMessage()], 500);
        }
    }

    public function addSubject(Request $request)
    {
        try {
            $request->validate([
                'subject' => 'required|string',
                'year_id' => 'required|int',
                'subjectImg' => 'required|image|mimes:jpeg,png,jpg',
                'lesson_title' => 'required|string',
                'topic_1' => 'nullable|string',
                'topic_2' => 'nullable|string',
                'topic_3' => 'nullable|string',
                'topic_4' => 'nullable|string',
            ]);
            $subjectName = $request->input('subject');
            $yearID = $request->input('year_id');
            $lesson = $request->input('lesson_title');
            $topic1 = $request->input('topic_1');
            $topic2 = $request->input('topic_2');
            $topic3 = $request->input('topic_3');
            $topic4 = $request->input('topic_4');

            if ($subjectName && $request->has('subjectImg')) {
                $subject = new Subject();
                $subject->subjects = $subjectName;

                $file = $request->file('subjectImg');
                $extension = $file->getClientOriginalExtension();
                $filename = Str::random(10) . '.' . $extension;
                $path = 'scribbles_assets/';
                $file->move($path, $filename);

                $subject->image = $path . $filename;
                $subject->save();
            }

            $newSubjectId = $subject->id;

            if ($newSubjectId && $yearID) {
                $topics = [];

                if ($topic1) {
                    $topics[] = $topic1;
                }
                if ($topic2) {
                    $topics[] = $topic2;
                }
                if ($topic3) {
                    $topics[] = $topic3;
                }
                if ($topic4) {
                    $topics[] = $topic4;
                }

                $topicsString = implode(',', $topics);

                if ($yearID >= 1 && $yearID <= 7) {
                    $departmentID = 1;
                } elseif ($yearID >= 8 && $yearID <= 11) {
                    $departmentID = 2;
                } else {
                    return response()->json(['error' => 'Invalid Year'], 422);
                }

                if ($newSubjectId && $yearID && $lesson) {

                    $Topics = new DepartmentYearSubject();
                    $Topics->department_id = $departmentID;
                    $Topics->subject_id = $newSubjectId;
                    $Topics->year_id = $yearID;
                    $Topics->lesson_title = $lesson;
                    $Topics->topics = $topicsString;
                    $Topics->save();
                }
                return response()->json(['success' => 'Subject added successfully'], 200);
            } else {
                return response()->json(['error' => 'Failed to add subject'], 422);
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => 'Validation failed', 'errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred', 'message' => $e
                ->getMessage()], 500);
        }
    }
    public function updateSubjectImage(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'subjects.*.id' => 'nullable|integer|exists:subjects,id',
                'subjects.*.img' => 'nullable|image|mimes:jpeg,png,jpg',
            ]);

            $images = $request->allFiles();
            foreach ($validatedData['subjects'] as $index => $subjectData) {
                $subjectId = $subjectData['id'];

                // Check if the image exists
                if (!isset($images["subjects"][$index]['img'])) {
                    continue;
                }

                $image = $images["subjects"][$index]['img'];

                // Check if the image is not null
                if (!$image) {
                    continue;
                }

                $extension = $image->getClientOriginalExtension();
                $filename = Str::random(10) . '.' . $extension;
                $path = 'scribbles_assets/';

                // Try to move the image
                try {
                    $image->move($path, $filename);
                } catch (\Exception $e) {
                    // If the image upload fails, return an error response
                    return response()->json(['error' => 'Failed to upload image', 'message' => $e->getMessage()], 500);
                }

                // Try to update the subject's image
                try {
                    $subject = Subject::find($subjectId);
                    // Delete the existing image
                    if ($subject->image) {
                        unlink(public_path($subject->image));
                    }
                    $subject->image = $path . $filename;
                    $subject->save();
                } catch (\Exception $e) {
                    // If the database query fails, return an error response
                    return response()->json(['error' => 'Failed to update subject', 'message' => $e->getMessage()], 500);
                }
            }

            // Return a success response
            return response()->json(['success' => 'Images updated successfully']);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => 'Validation failed', 'errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred', 'message' => $e->getMessage()], 500);
        }
    }
    public function deleteSubject(Request $request)
    {
        try {
            $request->validate([
                'subID' => 'required|int'
            ]);
            $subjectID = $request->input('subID');
            if ($subjectID) {
                $subject = Subject::find($subjectID);
                if ($subject) {
                    $subject->delete();
                    return response()->json(['success' => 'Subject deleted successfully'], 200);
                } else {
                    return response()->json(['error' => 'Subject not found'], 404);
                }
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => 'Validation failed', 'errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred', 'message' => $e
                ->getMessage()], 500);
        }
    }
    public function fetchTopics(Request $request)
    {
        $topicID = $request->input('topic_id');

        $topics = DepartmentYearSubject::with('gradeLevel', 'subject')->find($topicID);

        if ($topics) {
            $topicsArray = explode(',', $topics->topics);
            return response()->json([
                'success' => 'Topics fetched Succesfully',
                'subject' => $topics->subject->subjects,
                'yearLevel' => $topics->gradeLevel->year,
                'lesson_title' => $topics->lesson_title,
                'topics' => $topicsArray
            ]);
        } else {
            return response()->json(['error' => 'Error fetching topics']);
        }
    }
    public function updateTopics(Request $request)
    {
        try {
            // Define the validation rules
            $rules = [
                'lesson_title' => 'required|string',
                'topicID' => 'required|int',
            ];

            for ($i = 1; $i <= 4; $i++) {
                $rules['topic' . $i] = 'nullable|string';
            }

            $request->validate($rules);

            $lessonTitle = $request->input('lesson_title');
            $topicID = $request->input('topicID');

            // Get the topics from the request
            $topics = [];
            for ($i = 1; $i <= 4; $i++) {
                $topic = $request->input('topic' . $i);
                if ($topic) {
                    $topics[] = $topic;
                }
            }

            // Implode the topics array into a string
            $topicsString = implode(',', $topics);

            if ($lessonTitle && $topicID) {
                // Update the topic field in the database
                $topic = DepartmentYearSubject::find($topicID);
                if (!$topic) {
                    throw new \Exception('Topic not found');
                }

                try {
                    $topic->lesson_title = $lessonTitle;
                    $topic->topics = $topicsString;
                    $topic->save();

                    // Return a success response
                    return response()->json(['success' => 'Topics updated successfully']);
                } catch (\Exception $e) {
                    throw new \Exception('Error updating topic', 0, $e);
                }
            } else {
                return response()->json(['error' => 'Error updating topics']);
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => 'Validation failed', 'errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred', 'message' => $e->getMessage()], 500);
        }
    }
    public function deleteTopics(Request $request)
    {
        try {
            $request->validate([
                'topicID' => 'required|int'
            ]);
            $TopicID = $request->input('topicID');
            if ($TopicID) {
                $Topic = DepartmentYearSubject::find($TopicID);
                if ($Topic) {
                    $Topic->delete();
                    return response()->json(['success' => 'Topic deleted successfully'], 200);
                } else {
                    return response()->json(['error' => 'Topic not found'], 404);
                }
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => 'Validation failed', 'errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred', 'message' => $e
                ->getMessage()], 500);
        }
    }
}
