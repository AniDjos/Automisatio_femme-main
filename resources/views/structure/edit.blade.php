@extends('welcome')
@section('name', 'Modifier une Structure')
@section('content')
<div class="form-container">
    <h1 class="form-title">Modifier une Structure</h1>
    <form action="{{ route('structures.update', $structure->structure_id) }}" method="POST" class="elegant-form">
        @csrf
        @method('PUT') <!-- Méthode HTTP PUT pour la mise à jour -->

        <div class="form-group">
            <label for="structure">Nom de la Structure</label>
            <div class="input-wrapper">
                <i class="fas fa-building input-icon"></i>
                <input type="text" id="structure" name="structure" class="form-control" value="{{ $structure->structure }}" placeholder="Entrez le nom de la structure" required>
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-submit">
                <i class="fas fa-save"></i> Mettre à jour
            </button>
            <a href="{{ route('structures.index') }}" class="btn btn-secondary">Annuler</a>
        </div>
    </form>
</div>

<style>
/* Base Styles */
:root {
    --primary-color: #7367F0;
    --primary-hover: #5D50E6;
    --secondary-color: #82868B;
    --danger-color: #EA5455;
    --light-color: #F8F8F8;
    --dark-color: #4B4B4B;
    --border-color: #EBE9F1;
    --card-shadow: 0 4px 24px 0 rgba(34, 41, 47, 0.1);
    --transition: all 0.3s ease;
}

.form-container {
    max-width: 600px;
    margin: 5rem auto;
    padding: 2.5rem;
    background: white;
    border-radius: 12px;
    box-shadow: var(--card-shadow);
    font-family: 'Montserrat', 'Poppins', sans-serif;
}

.form-title {
    font-size: 1.75rem;
    font-weight: 600;
    color: var(--dark-color);
    text-align: center;
    margin-bottom: 1.5rem;
}

.elegant-form {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

.form-group {
    margin-bottom: 1.5rem;
}

.input-wrapper {
    position: relative;
    display: flex;
    align-items: center;
}

.input-wrapper .input-icon {
    position: absolute;
    left: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: var(--primary-color);
    font-size: 1.2rem;
    pointer-events: none;
}

.input-wrapper input {
    padding-left: 2.5rem;
    padding-right: 1rem;
    width: 100%;
    height: 2.5rem;
    line-height: 1.5;
    border: 1px solid var(--border-color);
    border-radius: 8px;
    font-size: 1rem;
    background-color: var(--light-color);
    transition: var(--transition);
}

.input-wrapper input::placeholder {
    color: var(--secondary-color);
    font-size: 0.95rem;
}

.input-wrapper input:focus {
    border-color: var(--primary-color);
    outline: none;
    box-shadow: 0 0 0 3px rgba(115, 103, 240, 0.2);
    background-color: white;
}

.form-actions {
    display: flex;
    justify-content: flex-end;
    gap: 1rem;
}

.btn-submit {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    padding: 0.9rem 1.75rem;
    font-size: 1rem;
    font-weight: 500;
    color: white;
    background-color: var(--primary-color);
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: var(--transition);
    box-shadow: 0 3px 10px rgba(115, 103, 240, 0.3);
}

.btn-submit:hover {
    background-color: var(--primary-hover);
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(115, 103, 240, 0.4);
}

.btn-submit i {
    font-size: 1.2rem;
}

.btn-secondary {
    display: inline-block;
    padding: 0.9rem 1.75rem;
    font-size: 1rem;
    font-weight: 500;
    color: var(--dark-color);
    background-color: var(--light-color);
    border: 1px solid var(--border-color);
    border-radius: 8px;
    cursor: pointer;
    transition: var(--transition);
    margin-left: 1rem;
}

.btn-secondary:hover {
    background-color: var(--border-color);
    transform: translateY(-2px);
}

/* Responsive */
@media (max-width: 768px) {
    .form-container {
        margin: 1rem;
        padding: 1.5rem;
    }
    
    .form-title {
        font-size: 1.5rem;
    }

    .btn-submit, .btn-secondary {
        font-size: 0.9rem;        padding: 0.75rem 1.5rem;    }}</style>@endsection