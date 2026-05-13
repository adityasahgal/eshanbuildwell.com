<?php

namespace App\Http\Controllers;

use App\Models\BimTrainingContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BimTrainingContentController extends Controller
{
    public function edit()
    {
        $content = BimTrainingContent::first();
        if (!$content) {
            $content = new BimTrainingContent();
        }
        return view('admin.bim-training-content', compact('content'));
    }

    public function update(Request $request)
    {
        $content = BimTrainingContent::first() ?? new BimTrainingContent();

        $data = $request->except(['_token', 'hero_image', 'about_image', 'trainer_image', 'learn_modules', 'revit_desc_list', 'other_tools_list', 'trainer_bullets', 'program_outcomes']);

        // Handle File Uploads
        if ($request->hasFile('hero_image')) {
            $data['hero_image'] = 'storage/' . $request->file('hero_image')->store('bim_training', 'public');
        }
        if ($request->hasFile('about_image')) {
            $data['about_image'] = 'storage/' . $request->file('about_image')->store('bim_training', 'public');
        }
        if ($request->hasFile('trainer_image')) {
            $data['trainer_image'] = 'storage/' . $request->file('trainer_image')->store('bim_training', 'public');
        }

        // Handle JSON arrays
        if ($request->has('learn_modules')) {
            $modules = [];
            foreach ($request->learn_modules as $index => $module) {
                if (!empty($module['title'])) {
                    if (!empty($module['items_str'])) {
                        $module['items'] = array_values(array_filter(array_map('trim', explode("\n", $module['items_str']))));
                    } else {
                        $module['items'] = [];
                    }
                    unset($module['items_str']);

                    if ($request->hasFile("learn_modules.{$index}.image")) {
                        $module['image'] = 'storage/' . $request->file("learn_modules.{$index}.image")->store('bim_training', 'public');
                    } elseif (isset($module['existing_image'])) {
                        $module['image'] = $module['existing_image'];
                    }
                    unset($module['existing_image']);

                    $modules[] = $module;
                }
            }
            $data['learn_modules'] = $modules;
        }

        if ($request->has('revit_desc_str')) {
            $data['revit_desc_list'] = array_values(array_filter(array_map('trim', explode("\n", $request->revit_desc_str))));
        }

        if ($request->has('other_tools_str')) {
            $data['other_tools_list'] = array_values(array_filter(array_map('trim', explode("\n", $request->other_tools_str))));
        }

        if ($request->has('trainer_bullets_str')) {
            $data['trainer_bullets'] = array_values(array_filter(array_map('trim', explode("\n", $request->trainer_bullets_str))));
        }

        if ($request->has('program_outcomes')) {
            $outcomes = [];
            foreach ($request->program_outcomes as $outcome) {
                if (!empty($outcome['text'])) {
                    $outcomes[] = $outcome;
                }
            }
            $data['program_outcomes'] = $outcomes;
        }

        unset($data['revit_desc_str'], $data['other_tools_str'], $data['trainer_bullets_str']);

        $content->fill($data);
        $content->save();

        return redirect()->route('bim-training-content.edit')->with('success', 'BIM Training Content updated successfully.');
    }
}
