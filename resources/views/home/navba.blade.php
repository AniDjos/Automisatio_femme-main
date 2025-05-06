<header class="headerer">
    <a href="#" class="logoo"><img src="{{ asset('images/logo-masm.png') }}" alt=""></a>

    <nav class="navbarre">
        <a href="{{route('App_acceuil')}}" onclick="changeColor(this)">Accueil</a>
        <a href="{{route('App_groupement')}}" onclick="changeColor(this)">Nos groupements</a>
        <a href="{{route('App_prestation')}}" onclick="changeColor(this)">Nos prestations</a>
        <a href="{{route('App_contact')}}" onclick="changeColor(this)">Contact</a>
        <a href="{{route('login')}}" onclick="changeColor(this)">Connexion</a>
    </nav>

    <div class="social-media">
        <a href="#"><i class='bx bxl-facebook'></i></a>
        <a href="#"><i class='bx bxl-youtube'></i></a>
        <a href="#" id="searchIcon"><i class='bx bx-search'></i></a>
    </div>

    <div class="modal" id="searchModal">
        <div class="modal-content">
            <div class="modal-header">
                <span>RECHERCHE</span>
                <button class="close-btn" id="closeModal">&times;</button>
            </div>
            <input type="text" class="search-input" placeholder="Que recherchez-vous ?">
            <button class="search-button">Rechercher</button>
        </div>
    </div>
</header>
<style>
    .headerer {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        padding: 30px 8%;
        background: #eaeaea;
        display: flex;
        justify-content: space-between;
        align-items: center;
        z-index: 100;
    }

    .logoo img {
        width: 200px;
        font-weight: 600;
    }

    .navbarre a {
        color: #222;
        font-size: 18px;
        font-weight: 500;
        margin-left: 20px;
        text-decoration: none;
        margin: 0 20px;
        transition: 0.3s;
        cursor: pointer;
    }

    .navbarre a:hover,
    .navbarre a.active {
        color: #c2bd35;
    }

    .social-media {
        display: flex;
        justify-content: space-between;
        width: 150px;
        height: 40px;
    }

    .social-media a {
        display: inline-flex;
        justify-content: center;
        align-items: center;
        text-decoration: none;
        background: transparent;
        border: 2px solid transparent;
        width: 40px;
        height: 40px;
        transform: rotate(45deg);
        transition: .5s;
    }

    .social-media a:hover {
        border-color: #e3dc17;
    }

    .social-media a i {
        font-size: 24px;
        color: #c2bd35;
        transform: rotate(-45deg);
    }

    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        justify-content: center;
        align-items: center;
    }


    .modal-content {
        background: white;
        padding: 20px;
        border-radius: 10px;
        width: 400px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        text-align: center;
    }


    .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-weight: bold;
        font-size: 18px;
    }


    .close-btn {
        font-size: 22px;
        cursor: pointer;
        border: none;
    }


    .search-input {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-bottom: 10px;
    }


    .search-button {
        background-color: #b2ae2e;
        color: white;
        border: none;
        padding: 10px 15px;
        font-size: 16px;
        border-radius: 5px;
        cursor: pointer;
    }


    .modal.show {
        display: flex;
    }
</style>
<script>
    // Sélection des éléments
    const searchIcon = document.getElementById("searchIcon");
    const searchModal = document.getElementById("searchModal");
    const closeModal = document.getElementById("closeModal");

    // Afficher la modale
    searchIcon.addEventListener("click", () => {
        searchModal.classList.add("show");
    });

    // Fermer la modale
    closeModal.addEventListener("click", () => {
        searchModal.classList.remove("show");
    });

    // Fermer en cliquant à l'extérieur
    searchModal.addEventListener("click", (event) => {
        if (event.target === searchModal) {
            searchModal.classList.remove("show");
        }
    });
    function changeColor(element) {
        element.style.color = "#c2bd35";
    }
</script>