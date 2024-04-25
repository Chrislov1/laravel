
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Ajouter une nouvelle course') }}</div>

                <div class="card-body">
                    <form action="{{ route('courses.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="point_depart">Point de départ :</label>
                            <input type="text" class="form-control" name="point_depart" id="point_depart" required>
                        </div>
                        <div class="form-group">
                            <label for="point_arrivee">Point d'arrivée :</label>
                            <input type="text" class="form-control" name="point_arrivee" id="point_arrivee" required>
                        </div>
                        <div class="form-group">
                            <label for="date_heure">Date prévue :</label>
                            <input type="datetime-local" class="form-control" name="date_heure" id="date_heure" required>
                        </div>
                        <div class="form-group">
                            <label for="chauffeur_affecte">Chauffeur affecté:</label>
                            <select class="form-control" id="chauffeur_affecte" name="chauffeur_affecte">
                                <option value="">Sélectionnez un chauffeur</option>
                                @foreach($chauffeurs as $chauffeur)
                                    <option value="{{ $chauffeur->chauffeur_id }}">{{ $chauffeur->name }} {{ $chauffeur->prenoms }}</option>
                                @endforeach
                            </select>
                            </div>
                        <button type="submit" class="btn btn-primary">Ajouter Course</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


