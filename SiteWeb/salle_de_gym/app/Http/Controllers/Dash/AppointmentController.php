<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAppointmentRequest;
use App\Models\Appointment;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
// use Illuminate\Http\Request;

class AppointmentController extends Controller
{    

    public function all_appointment() {
        $appointments = Appointment::latest()->paginate(8);
        return Inertia::render('Dashboard/Appointments/All', [
            'appointments' => $appointments
        ]);
    }

    public function store_appointment(StoreAppointmentRequest $request) {
        $validated = $request->validated();
        if ($request->hasfile('photo')) {
            $image = $request->file('photo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('appointment', $filename, 'public');
            $validated['photo'] = $path;
        }
        Appointment::create($validated);
        return redirect()->back()->with("success", "Votre réservation a été envoyer avec succès !");
    }

    public function show_appointment(Appointment $appointment){
        return Inertia::render('Dashboard/Appointments/View', [
            'appointment' => $appointment
        ]);
    }

    public function delete_appointment(Appointment $appointment) {
        if (!empty($appointment->photo) && Storage::disk('public')->exists($appointment->photo)) {
            Storage::disk('public')->delete($appointment->photo);
        }
        $appointment->delete();
        return redirect()->route('all.appointment')->with("success", "Suppression réussi !");
    }

    public function change_statut(Appointment $appointment) {
        $appointment->statut = $appointment->statut === 'lu' ? 'non lu' : 'lu';
        $appointment->save();
        return back();
    }
}
