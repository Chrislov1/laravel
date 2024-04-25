<?php

    namespace App\Http\Controllers;
    use App\Models\chauffeur;
    use Illuminate\Http\Request;
    use App\Models\Course;
    use App\Models\course as ModelsCourse;

    class indexController extends Controller
    {
        public function create()
        {
            $chauffeurs = Chauffeur::where('disponible','oui')->get();
            return view('create', compact('chauffeurs'));
        }

        public function index()
        {
            $courses =Course::all();
            return view('index', compact('courses'));

        }

        public function store(Request $request)
        {
           // dd($request->all());
            $request->validate([
                'point_depart' => 'required',
                'point_arrivee' => 'required',
                'date_heure' => 'required|date',
                'chauffeur_affecte' => 'nullable|exists:chauffeurs,chauffeur_id',
            ]);
            $course = new Course([
                'point_depart' => $request->input('point_depart'),
                'point_arrivee' => $request->input('point_arrivee'),
                'date_heure' => $request->input('date_heure'),
                'chauffeur_id' => $request->input('chauffeur_affecte'),
                //'statut' => 'en_attente',
            ]);

            $course->save();

            return redirect()->route('courses.index')->with('success', 'Course ajoutée avec succès!');
        }


    public function terminerCourse(Request $request)
{
    // dd($request->input('id'));
    $course = $request->input('id');

    $course = Course::findOrFail($course);

    $course->statut = 'terminer';
    $course->save();

    return redirect()->route('courses.index')->with('success', 'Statut de la course mis à jour avec succès');
}


    public function supprimerCourse(Request $request)
    {

        $course = Course::findOrFail($request->input('id'));


        $course->delete();

        return redirect()->route('courses.index')->with('success', 'Course supprimée avec succès');
    }
}




