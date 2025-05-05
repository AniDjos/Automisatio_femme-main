@extends('welcome')

@section('name', 'Profile de l\'utilisateur')
@section('content')
<div class="container">
    <h1>Profil de l'utilisateur</h1>
    <div class="card">
        <div class="card-header">
            Informations personnelles
        </div>
        <div class="card-body">
            <p><strong>Nom :</strong> {{ Auth::user()->name }}</p>
            <p><strong>Email :</strong> {{ Auth::user()->email }}</p>
            <p><strong>Date de création :</strong> {{ Auth::user()->created_at->format('d/m/Y') }}</p>
        </div>
    </div>
</div>
@endsection