@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Liste des courses</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Point de départ</th>
                <th scope="col">Point d'arrivée</th>
                <th scope="col">Date et heure</th>
                <th scope="col">Chauffeur affecté</th>
                <th scope="col">Statut de la course</th>
                <th scope="col">Actions</th> <!-- Ajout de la colonne Actions -->
            </tr>
        </thead>
        <tbody>
            @foreach ($courses as $course)
            <tr>
                <td>{{ $course->course_id }}</td>
                <td>{{ $course->point_depart }}</td>
                <td>{{ $course->point_arrivee }}</td>
                <td>{{ $course->date_heure }}</td>
                <td>
                    @if ($course->chauffeur_affecte)
                    {{ $course->chauffeur_affecte->nom }}
                    @else
                    Aucun chauffeur affecté
                    @endif
                </td>
                <td>{{ $course->statut }}</td>
                <td> <!-- Colonne pour les actions -->
                    @if ($course->statut === 'en cours')
                    <form action="{{ route('courses.terminer', ['id' => $course->course_id]) }}" method="post" style="display: inline;">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-success btn-sm">Mettre à jour</button>
                    </form>
                    @endif
                    <form action="{{ route('courses.supprimer', ['id' => $course->course_id ]) }}" method="post" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette course?');">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Lien pour ajouter une nouvelle course -->
    <a href="{{ route('courses.create') }}" class="btn btn-primary">Ajouter une nouvelle course</a>
</div>
@endsection
