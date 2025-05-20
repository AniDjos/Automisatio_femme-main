@extends('welcome')

@section('name', 'Dashboard Général')

@section('content')
<style>
/* Variables de couleurs pour faciliter la maintenance */
:root {
    --primary: #8B5CF6;
    --primary-light: #A78BFA;
    --secondary: #F97316;
    --success: #10B981;
    --danger: #EF4444;
    --gray-light: #F3F4F6;
    --gray-medium: #9CA3AF;
    --gray-dark: #4B5563;
    --white: #FFFFFF;
    --shadow-sm: 0 1px 2px rgba(0, 0, 0, 0.05);
    --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    --transition: all 0.3s ease;
}

.dashboard-container {
    max-width: 1280px;
    margin: 3rem auto 2rem 17rem;
    padding: 2rem;
    background-color: var(--gray-light);
    border-radius: 1rem;
    box-shadow: var(--shadow-sm);
}

.dashboard-title {
    text-align: center;
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 2.5rem;
    color: var(--primary);
    position: relative;
    padding-bottom: 1rem;
}

.dashboard-title::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 80px;
    height: 4px;
    background: linear-gradient(90deg, var(--primary), var(--primary-light));
    border-radius: 2px;
}

/* Animation des conteneurs */
.stats-container,
.charts-container,
.cards-container {
    opacity: 0;
    transform: translateY(30px);
    animation: fadeIn 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
}

.stats-container {
    animation-delay: 0.2s;
}

.charts-container {
    animation-delay: 0.4s;
}

.cards-container {
    animation-delay: 0.6s;
}

@keyframes fadeIn {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Conteneur des statistiques */
.stats-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1.5rem;
    margin-bottom: 3rem;
}

.stat-card {
    position: relative;
    border-radius: 1rem;
    padding: 2rem;
    box-shadow: var(--shadow-md);
    text-align: center;
    overflow: hidden;
    transition: var(--transition);
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-lg);
}

.stat-card h3 {
    font-size: 1.1rem;
    font-weight: 600;
    color: var(--white);
    margin-bottom: 0.75rem;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
}

.stat-card p {
    font-size: 2.5rem;
    font-weight: 700;
    color: var(--white);
    text-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
}

/* Couleurs pour chaque carte avec gradients améliorés */
.stat-card:nth-child(1) {
    background: linear-gradient(135deg, #4361EE, #3A0CA3);
}

.stat-card:nth-child(2) {
    background: linear-gradient(135deg, #F72585, #7209B7);
}

.stat-card:nth-child(3) {
    background: linear-gradient(135deg, #4CC9F0, #4895EF);
}

.stat-card:nth-child(4) {
    background: linear-gradient(135deg, #F94144, #F3722C);
}

/* Animation des vagues */
.sinusoid {
    position: absolute;
    bottom: -10px;
    left: 0;
    width: 100%;
    height: 40%;
    background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1200 120' preserveAspectRatio='none'%3E%3Cpath d='M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z' opacity='.25' class='shape-fill'%3E%3C/path%3E%3Cpath d='M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z' opacity='.5' class='shape-fill'%3E%3C/path%3E%3Cpath d='M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z' class='shape-fill'%3E%3C/path%3E%3C/svg%3E") no-repeat center center;
    background-size: cover;
    opacity: 0.3;
    pointer-events: none;
}

/* Conteneur des graphiques */
.charts-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 2rem;
    margin-bottom: 3rem;
}

.chart-card {
    background: var(--white);
    padding: 1.5rem;
    border-radius: 1rem;
    box-shadow: var(--shadow-md);
    transition: var(--transition);
}

.chart-card:hover {
    box-shadow: var(--shadow-lg);
}

.chart-card h3 {
    text-align: center;
    font-size: 1.25rem;
    font-weight: 600;
    margin-bottom: 1.5rem;
    color: var(--gray-dark);
    position: relative;
    padding-bottom: 0.75rem;
}

.chart-card h3::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 50px;
    height: 3px;
    background: linear-gradient(90deg, var(--primary), var(--primary-light));
    border-radius: 2px;
}

canvas {
    max-width: 100%;
    max-height: 400px;
    display: block;
    margin: 0 auto;
}

/* Nouveau style pour les cartes d'annonces */
.cards-container {
    margin-top: 3rem;
}

.section-title {
    font-weight: 700;
    font-size: 1.5rem;
    margin-bottom: 1.5rem;
    color: var(--primary);
    position: relative;
    padding-left: 1rem;
}

.section-title::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    width: 4px;
    background: var(--primary);
    border-radius: 2px;
}

.cards-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 1.5rem;
    margin-bottom: 3rem;
}

.data-card {
    background: var(--white);
    border-radius: 0.75rem;
    overflow: hidden;
    box-shadow: var(--shadow-md);
    transition: var(--transition);
    position: relative;
}

.data-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-lg);
}

.data-card-header {
    padding: 1rem 1.5rem;
    background: linear-gradient(135deg, var(--primary), var(--primary-light));
    color: var(--white);
    font-weight: 600;
    font-size: 1.1rem;
}

.data-card-body {
    padding: 1.5rem;
}

.data-item {
    display: flex;
    margin-bottom: 0.75rem;
    align-items: center;
}

.data-item:last-child {
    margin-bottom: 0;
}

.data-label {
    font-weight: 600;
    color: var(--gray-dark);
    min-width: 100px;
    font-size: 0.9rem;
}

.data-value {
    color: var(--gray-dark);
    flex-grow: 1;
    text-align: right;
    font-size: 0.95rem;
}

.data-card-footer {
    padding: 1rem 1.5rem;
    background-color: var(--gray-light);
    border-top: 1px solid rgba(0, 0, 0, 0.05);
    display: flex;
    justify-content: flex-end;
}

.view-more {
    color: var(--primary);
    text-decoration: none;
    font-weight: 600;
    font-size: 0.85rem;
    transition: var(--transition);
    display: inline-flex;
    align-items: center;
}

.view-more:hover {
    color: var(--primary-light);
    text-decoration: underline;
}

.view-more svg {
    margin-left: 0.25rem;
    width: 16px;
    height: 16px;
}

/* Badges pour les états */
.badge {
    display: inline-block;
    padding: 0.25rem 0.5rem;
    border-radius: 9999px;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

.badge-success {
    background-color: #D1FAE5;
    color: #065F46;
}

.badge-warning {
    background-color: #FEF3C7;
    color: #92400E;
}

.badge-danger {
    background-color: #FEE2E2;
    color: #991B1B;
}

.badge-info {
    background-color: #DBEAFE;
    color: #1E40AF;
}

/* Responsive */
@media (max-width: 1200px) {
    .dashboard-container {
        margin: 3rem auto 2rem auto;
        padding: 1.5rem;
        width: 95%;
    }
}

@media (max-width: 768px) {
    .chart-card {
        min-height: 400px;
    }

    .stats-container {
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    }
}
</style>

<div class="dashboard-container">
    <h1 class="dashboard-title">Tableau de Bord Général</h1>

    <!-- Statistiques résumées -->
    <div class="stats-container">
        <div class="stat-card">
            <div class="sinusoid"></div>
            <h3>Total des Groupements</h3>
            <p>{{ isset($groupementsParDepartement) ? array_sum($groupementsParDepartement->toArray()) : 0 }}</p>
        </div>
        <div class="stat-card">
            <div class="sinusoid"></div>
            <h3>Total des Appuis</h3>
            <p>{{ isset($repartitionAppuis) ? array_sum($repartitionAppuis->toArray()) : 0 }}</p>
        </div>
        <div class="stat-card">
            <div class="sinusoid"></div>
            <h3>Total des Équipements</h3>
            <p>{{ isset($repartitionEquipements) ? array_sum($repartitionEquipements->toArray()) : 0 }}</p>
        </div>
    </div>

    <!-- Section des graphiques -->
    <div class="charts-container">
        <!-- Graphique 1 -->
        <div class="chart-card">
            <h3>Groupements par Département</h3>
            <canvas id="groupementsChart" width="400" height="300"></canvas>
        </div>

        <!-- Graphique 2 -->
        <div class="chart-card">
            <h3>Répartition des Appuis</h3>
            <canvas id="appuisChart" width="400" height="300"></canvas>
        </div>

        <!-- Graphique 3 -->
        <div class="chart-card">
            <h3>État des Équipements</h3>
            <canvas id="equipementsChart" width="400" height="300"></canvas>
        </div>
    </div>

    <!-- Section des cartes de données -->
    <div class="cards-container">
        <!-- Cartes des Groupements -->
        <h2 class="section-title">Groupements</h2>
        <div class="cards-grid">
            @isset($groupements)
                @foreach ($groupements as $groupement)
                <div class="data-card">
                    <div class="data-card-header">
                        {{ $groupement->nom }}
                    </div>
                    <div class="data-card-body">
                        <div class="data-item">
                            <span class="data-label">ID</span>
                            <span class="data-value">{{ $groupement->groupement_id }}</span>
                        </div>
                        <div class="data-item">
                            <span class="data-label">Effectif</span>
                            <span class="data-value">{{ $groupement->effectif }}</span>
                        </div>
                    </div>
                    <div class="data-card-footer">
                        <a href="{{ route('groupements.index')}}" class="view-more">
                            Voir détails
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>
                @endforeach
            @else
                <div class="data-card">
                    <div class="data-card-header">
                        Aucun groupement disponible
                    </div>
                    <div class="data-card-body">
                        <p>Aucun groupement n'a été trouvé dans la base de données.</p>
                    </div>
                </div>
            @endisset
        </div>

        <!-- Cartes des Appuis -->
        <h2 class="section-title">Appuis</h2>
        <div class="cards-grid">
            @isset($appuis)
                @foreach ($appuis as $appui)
                <div class="data-card">
                    <div class="data-card-header">
                        {{ $appui->type_appuis }}
                    </div>
                    <div class="data-card-body">
                        <div class="data-item">
                            <span class="data-label">ID</span>
                            <span class="data-value">{{ $appui->appuis_id }}</span>
                        </div>
                        <div class="data-item">
                            <span class="data-label">Date</span>
                            <span class="data-value">{{ $appui->date_appuis }}</span>
                        </div>
                        <div class="data-item">
                            <span class="data-label">Description</span>
                            <span class="data-value">{{ Str::limit($appui->description, 50) }}</span>
                        </div>
                    </div>
                    <div class="data-card-footer">
                        <a href="{{ route('appuis.index') }}" class="view-more">
                            Voir détails
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>
                @endforeach
            @else
                <div class="data-card">
                    <div class="data-card-header">
                        Aucun appui disponible
                    </div>
                    <div class="data-card-body">
                        <p>Aucun appui n'a été trouvé dans la base de données.</p>
                    </div>
                </div>
            @endisset
        </div>

        <!-- Cartes des Équipements -->
        <h2 class="section-title">Équipements</h2>
        <div class="cards-grid">
            @isset($equipements)
                @foreach ($equipements as $equipement)
                <div class="data-card">
                    <div class="data-card-header">
                        {{ $equipement->nom ?? $equipement->equipment_libelle }}
                    </div>
                    <div class="data-card-body">
                        <div class="data-item">
                            <span class="data-label">ID</span>
                            <span class="data-value">{{ $equipement->id ?? $equipement->equipment_id }}</span>
                        </div>
                        <div class="data-item">
                            <span class="data-label">Nom equipement</span>
                            <span class="data-value">{{ $equipement->equipment_libelle ?? 'Non spécifié' }}</span>
                        </div>
                        <div class="data-item">
                            <span class="data-label">État</span>
                            <span class="data-value">
                                @php
                                    $etat = $equipement->etat ?? $equipement->stat_equipement ?? 'inconnu';
                                    $badgeClass = 'badge-info';
                                    if (str_contains(strtolower($etat), 'bon')) $badgeClass = 'badge-success';
                                    if (str_contains(strtolower($etat), 'mauvais')) $badgeClass = 'badge-danger';
                                    if (str_contains(strtolower($etat), 'usé') || str_contains(strtolower($etat), 'usee')) $badgeClass = 'badge-warning';
                                @endphp
                                <span class="badge {{ $badgeClass }}">{{ $etat }}</span>
                            </span>
                        </div>
                    </div>
                    <div class="data-card-footer">
                        <a href="{{ route('equipement.index') }}" class="view-more">
                            Voir détails
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>
                @endforeach
            @else
                <div class="data-card">
                    <div class="data-card-header">
                        Aucun équipement disponible
                    </div>
                    <div class="data-card-body">
                        <p>Aucun équipement n'a été trouvé dans la base de données.</p>
                    </div>
                </div>
            @endisset
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Configuration des graphiques
    const chartConfig = {
        colors: {
            blue: ['#4361EE', '#3A0CA3', '#4895EF', '#4CC9F0'],
            purple: ['#7209B7', '#8B5CF6', '#A78BFA', '#C4B5FD'],
            red: ['#F72585', '#F94144', '#F3722C', '#F8961E'],
            green: ['#06D6A0', '#10B981', '#34D399', '#6EE7B7']
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { position: 'bottom' },
                tooltip: {
                    backgroundColor: 'rgba(17, 24, 39, 0.8)',
                    padding: 12,
                    cornerRadius: 8
                }
            }
        }
    };

    // Initialisation des graphiques
    document.addEventListener('DOMContentLoaded', function() {
        initGroupementsChart();
        initAppuisChart();
        initEquipementsChart();
    });

    function initGroupementsChart() {
        const ctx = document.getElementById('groupementsChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($departements),
                datasets: [{
                    label: 'Nombre de Groupements',
                    data: @json($groupementsParDepartement->values()),
                    backgroundColor: chartConfig.colors.blue
                }]
            },
            options: chartConfig.options
        });
    }

    function initAppuisChart() {
        const ctx = document.getElementById('appuisChart').getContext('2d');
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: @json($repartitionAppuis->keys()),
                datasets: [{
                    data: @json($repartitionAppuis->values()),
                    backgroundColor: chartConfig.colors.purple
                }]
            },
            options: chartConfig.options
        });
    }

    function initEquipementsChart() {
        const ctx = document.getElementById('equipementsChart').getContext('2d');
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: @json($repartitionEquipements->keys()),
                datasets: [{
                    data: @json($repartitionEquipements->values()),
                    backgroundColor: chartConfig.colors.green
                }]
            },
            options: chartConfig.options
        });
    }
</script>
@endsection