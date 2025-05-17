@extends('welcome')
@section('name', 'Liste des Structures')
@section('content')
<div class="container">
    <div class="header">
        <h1 class="page-title">Liste des Structures</h1>
        <a href="{{ route('structures.create') }}" class="btn btn-primary">Ajouter une Structure</a>
    </div>

    <!-- Tableau des structures -->
    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom de la Structure</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($structures as $structure)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $structure->structure }}</td>
                        <td class="actions">
                            <a href="{{ route('structures.edit', $structure->structure_id) }}" class="btn btn-edit"><i class='bx bx-edit-alt'></i></a>
                            <form action="{{ route('structures.destroy', $structure->structure_id) }}" method="POST" class="inline-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette structure ?')"><i class='bx bx-trash'></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Aucune structure trouvée.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<style>
/* Base Styles */
:root {
    --primary-color: #7367F0;
    --primary-hover: #5D50E6;
    --danger-color: #EA5455;
    --light-color: #F8F8F8;
    --dark-color: #4B4B4B;
    --border-color: #EBE9F1;
    --card-shadow: 0 4px 24px 0 rgba(34, 41, 47, 0.1);
    --transition: all 0.3s ease;
}

.container {
    max-width: 1200px;
    margin: 6rem 1rem 1rem 17rem;
    padding: 1.5rem;
    background: white;
    border-radius: 12px;
    box-shadow: var(--card-shadow);
    font-family: 'Montserrat', 'Poppins', sans-serif;
}

.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1.5rem;
}

.page-title {
    font-size: 1.75rem;
    font-weight: 600;
    color: var(--dark-color);
}

.btn {
    display: inline-block;
    padding: 0.75rem 1.5rem;
    font-size: 1rem;
    font-weight: 500;
    border-radius: 8px;
    text-decoration: none;
    text-align: center;
    transition: var(--transition);
}

.btn-primary {
    background-color: var(--primary-color);
    color: white;
    border: none;
}

.btn-primary:hover {
    background-color: var(--primary-hover);
    transform: translateY(-2px);
}

.table-container {
    overflow-x: auto;
}

.table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 1rem;
}

.table thead {
    background-color: var(--light-color);
}

.table th, .table td {
    padding: 1rem;
    text-align: left;
    border: 1px solid var(--border-color);
}

.table th {
    font-size: 1rem;
    font-weight: 600;
    color: var(--dark-color);
}

.table td {
    font-size: 0.95rem;
    color: var(--dark-color);
}

.table .actions {
    display: flex;
    gap: 0.5rem;
}

.btn-edit {
    background-color: var(--primary-color);
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 6px;
    font-size: 0.9rem;
    border: none;
    cursor: pointer;
    transition: var(--transition);
}

.btn-edit:hover {
    background-color: var(--primary-hover);
}

.btn-delete {
    background-color: var(--danger-color);
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 6px;
    font-size: 0.9rem;
    border: none;
    cursor: pointer;
    transition: var(--transition);
}

.btn-delete:hover {
    background-color: #d32f2f;
}

.inline-form {
    display: inline;
}

.text-center {
    text-align: center;
    font-size: 1rem;
    color: var(--dark-color);
}

/* Responsive */
@media (max-width: 768px) {
    .header {
        flex-direction: column;
        align-items: flex-start;
        gap: 1rem;
    }

    .table th, .table td {
        padding: 0.75rem;
    }

    .btn {
        font-size: 0.9rem;
        padding: 0.5rem 1rem;
    }
}
</style>
@endsection