<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTestimonieRequest;
use App\Models\Testimonie;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
// use Illuminate\Http\Request;

class TestimonieController extends Controller
{

    public function all_testimonie() {
        $testimonies = Testimonie::latest()->get();
        return Inertia::render('Dashboard/Testimonies/All', [
            'testimonies' => $testimonies
        ]);
    }

    public function store_testimonie(StoreTestimonieRequest $request) {
        $validated = $request->validated();
        if ($request->hasfile('photo')) {
            $image = $request->file('photo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('testimonie', $filename, 'public');
            $validated['photo'] = $path;
        }
        Testimonie::create($validated);
        return redirect()->back();
    }

    public function show_testimonie(Testimonie $testimonie){
        return Inertia::render('Dashboard/Testimonies/View', [
            'testimonie' => $testimonie
        ]);
    }

    public function delete_testimonie(Testimonie $testimonie) {
        if (!empty($testimonie->photo) && Storage::disk('public')->exists($testimonie->photo)) {
            Storage::disk('public')->delete($testimonie->photo);
        }
        $testimonie->delete();
        return redirect()->route('all.testimonie');
    }

    public function change_statut(Testimonie $testimonie) {
        $testimonie->statut = $testimonie->statut === 'lu' ? 'non lu' : 'lu';
        $testimonie->save();
        return back();
    }

    public function change_publish(Testimonie $testimonie) {
        $testimonie->publish = $testimonie->publish === 'publier' ? 'non publier' : 'publier';
        $testimonie->save();
        return back();
    }
}
