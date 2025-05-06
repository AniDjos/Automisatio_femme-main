@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}


textarea {
    width: 630px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.contact-content form button {
    background-color: #b2ae2e;
    color: white;
    border: none;
    margin: 7% 0;
    padding: 10px;
    border-radius: 5px;
    cursor: pointer;
}

.footer {
    width: 100%;
    padding: 90px 8%;
    background-color: rgb(33, 32, 32);
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.footer-img img{
    margin-left: 19%;
    width: 300px;
}

.footer-img p{
    color: #eaeaea;
}

.footer-content{
    position: relative;
    width: 200px;
    color: #eaeaea;
}

.footer-content h5{
    font-size: 30px;
    line-height: 1.2;
    color: #c2bd35;
    padding-bottom: 11px;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}

.footer-content ul li{
    margin-bottom: 8px;
}

.footer-content ul li a{
    text-decoration: none;
    color: #eaeaea;
    padding: 5px;
}

.footer-social{
    position: relative;
    width: 400px;
    color: #eaeaea;
}

.adresse-icon i {
    font-size: 60px;
    color: #c2bd35;
    padding-right: 10px;

}

.footer-social p{
    font-size: 12px;
    line-height: 1.2;
    padding-bottom: 25px;
}

.footer-social a{
    text-decoration: none;
    color: #c2bd35;
    padding: 5px;
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

.footer-social a i{
    transform: rotate(-45deg);
    font-size: 25px;
} 

.footer-social a:hover{
    border: 1px solid #c2bd35;
}


.sig{
    background-color: rgb(41, 40, 40);
}

.sig h2{
    text-align: center;
    color: #eaeaea;
}

.contacter{
    position: relative;
    width: 100%;
    height: 100vh;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 27% 8% 200px;
    overflow: hidden;
}


.geo{
    width: 100%;
    padding: 5% 5% 5% 5%;
    background: white;
}

.geo h1{
    text-align: center;
    font-size: 55px;
    line-height: 1.2;
    margin-bottom: 5%;
}
#map {
    height: 400px;
    width: 100%;
    padding: 5%;
}

.contacter .femme5 {
    position: absolute;
    width: 500px;
    height: 500px;
    top: -20%;
    right: -8%;
    background: #b2ae2e;
    transform: rotate(45deg);
    z-index: -1;
}


.accueil{
    position: relative;
    width: 100%;
    height: 300px;
    overflow: hidden;
}


.accueil .acc-img {
    width: 100%;
    display: flex;
    justify-content: center;
}


.accueil .acc-img img {
    width: 100%;
    width: 100vw; 
    height: auto;
    object-fit: cover; 
    display: block;
}


.prestation{
    position: relative;
    width: 100%;
    padding:  5% 10% 10% 10%;
}


.prestation .femme6{
    position: absolute;
    width: 500px;
    height: 500px;
    top: -12%;
    left: -8%;
    background: #b2ae2e;
    transform: rotate(45deg);
    z-index: -1;
}

.prestation .femme7{
    position: absolute;
    width: 500px;
    height: 500px;
    bottom: -28%;
    background: #b2ae2e;
    transform: rotate(45deg);
    z-index: -1;
}

.prestation-header{
    padding: 20px 12%;
}

.prestation-header h2{
    font-size: 25px;
    line-height: 1.2;
}

.accordion{
    margin: 60px auto;
    width: 100%;
    max-width: 750px;
}

.accordion li{
    list-style: none;
    width: 100%;
    padding: 5px;
}

.accordion li label{
    display: flex;
    align-items: center;
    padding: 20px;
    font-size: 18px;
    font-weight: 500;
    background: #303030;
    color: #eaeaea;
    margin-bottom: 2px ;
    cursor: pointer;
    position: relative;
}

.accordion li label::after{
    content: '+'; 
    font-size: 34px ; 
    position: absolute;
    right: 20px;
    transition: transform 0.5s;
}

input[type="radio"]{
    display: none;
}

.accordion .content{
    background: #303030;
    color: #eaeaea;
    text-align: left;
    padding: 0 20px;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.5s , padding 0.5s;
}

.accordion input[type="radio"]:checked + label + .content{
    max-height: 890px;
    padding: 30px 20px;
}

.accordion input[type="radio"]:checked + label::after{
    transform: rotate(135deg);
}

   .search-icon {
    font-size: 30px;
    cursor: pointer;
    color: #003366;
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

/** INTERFACE ADMINISTRATEUR **/

:root {
    --primary: #4f46e5;
    --primary-hover: #4338ca;
    --primary-light: rgba(79, 70, 229, 0.1);
    --text: #1f2937;
    --text-light: #6b7280;
    --text-xlight: #9ca3af;
    --bg: #f9fafb;
    --bg-active: #f3f4f6;
    --white: #ffffff;
    --border: #e5e7eb;
    --border-focus: #d1d5db;
    --shadow: 0 1px 3px rgba(0,0,0,0.1);
    --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    --rounded: 0.5rem;
    --rounded-lg: 1rem;
    --transition: all 0.2s ease;
}

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
        background-color: var(--bg);
        color: var(--text);
    }
    .text {
        text-align: center;
        margin-bottom: 2rem;
        padding: 1rem;
    }

    .text .title {
        font-size: 2rem;
        font-weight: bold;
        margin-bottom: 0.5rem;
    }

    .text p {
        font-size: 1rem;
        color: var(--text-light);
    }



    /* Empty state */
    .empty-state {
        text-align: center;
        padding: 3rem;
        background-color: white;
        border-radius: 0.75rem;
        box-shadow: var(--shadow);
    }

    .empty-state i {
        font-size: 4rem;
        color: var(--text-light);
        margin-bottom: 1rem;
    }

    .empty-state h3 {
        font-size: 1.5rem;
        color: var(--text);
        margin-bottom: 0.5rem;
    }

    .empty-state p {
        color: var(--text-light);
        margin-bottom: 1.5rem;
    }

    /* Responsive styles */
    @media (max-width: 1024px) {
        .container-prin {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 768px) {
        .nav-menu {
            display: none;
            flex-direction: column;
            gap: 0;
            position: absolute;
            top: 70px;
            left: 0;
            width: 100%;
            background-color: var(--white);
            box-shadow: var(--shadow);
            padding: 1rem 0;
            border-bottom: 1px solid var(--border);
            align-items: stretch;
        }

        .nav-menu.active {
            display: flex;
        }

        .mobile-menu-btn {
            display: block;
        }

        .nav-item {
            width: 100%;
        }

        .nav-link {
            padding: 0.75rem 1.5rem;
            border-radius: 0;
            justify-content: space-between;
        }

        .drop {
            position: static;
            box-shadow: none;
            min-width: 100%;
            opacity: 1;
            visibility: visible;
            transform: none;
            display: none;
            border: none;
            background-color: #f1f5f9;
            padding-left: 2rem;
        }

        .drop::before {
            display: none;
        }

        .nav-item.active .drop {
            display: block;
        }

        .drop-link {
            padding: 0.75rem 1.5rem;
        }

        .recherche {
            flex-direction: column;
            align-items: stretch;
        }

        .recherche-groupement {
            max-width: 100%;
        }

        .container-prin {
            grid-template-columns: 1fr;
        }

        .page-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 1rem;
        }
        .stats-container {
            flex-direction: column;
        }
    }

    @media (max-width: 480px) {
        .container-groupement {
            padding: 1.25rem;
        }
        .stat-card {
            padding: 1.25rem;
        }
    }



/* Formulaire d'ajout de groupement */
/* Interface de details des groupements */
.containerr {
    display: flex;
    flex-direction: column;
    width: calc(100% - 2rem); 
    margin: 1rem; 
    box-sizing: border-box; 
}

/* Tabs styles améliorés */
.tabs-container {
    position: relative;
    margin-bottom: 2rem;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.tab-menu {
    display: flex;
    border-bottom: 1px solid var(--border);
    max-width: 900px;
    margin: 0 auto 2rem;
    background-color: var(--white);
    border-radius: var(--rounded) var(--rounded) 0 0;
    box-shadow: var(--shadow);
    overflow: hidden;
    position: relative;
    z-index: 1;
}

.tab-item {
    padding: 16px 24px;
    font-weight: 600;
    color: var(--text-light);
    cursor: pointer;
    position: relative;
    transition: var(--transition);
    border-bottom: 3px solid transparent;
    display: flex;
    align-items: center;
    gap: 8px;
}

.tab-item:hover {
    color: var(--primary);
    background-color: var(--bg-active);
}

.tab-item.active {
    color: var(--primary);
    border-bottom-color: var(--primary);
    background-color: rgba(79, 70, 229, 0.05);
}

.tab-count {
    background-color: var(--border);
    color: var(--text-light);
    border-radius: 20px;
    padding: 2px 10px;
    font-size: 0.75rem;
    font-weight: 700;
    min-width: 24px;
    text-align: center;
    line-height: 1.5;
    transition: var(--transition);
}

.tab-item.active .tab-count {
    background-color: var(--primary);
    color: white;
    box-shadow: 0 0 0 2px rgba(79, 70, 229, 0.2);
}

.tab-item i {
    font-size: 1.1rem;
    margin-right: 8px;
    transform: translateY(1px);
}

/* Contenu d'information amélioré */
.information-content {
    display: flex;
    flex-wrap: wrap;
    gap: 2rem;
    padding: 2.5rem;
    border-radius: var(--rounded-lg);
    max-width: 1000px;
    margin: 0 auto;
    background-color: var(--white);
    box-shadow: var(--shadow-lg);
    position: relative;
    overflow: hidden;
}

.information-content::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 6px;
    background: linear-gradient(to right, var(--primary), var(--primary-hover));
    border-radius: var(--rounded-lg) var(--rounded-lg) 0 0;
}

.partie-1 h1 {
    font-size: 1.75rem;
    font-weight: bold;
    margin-bottom: 1.5rem;
    color: var(--text);
    position: relative;
    padding-bottom: 10px;
}

.partie-1 h3{
    font-size: 1.2rem;
    margin-bottom: 1.5rem;
}

.partie-1 h2 {
    font-size: 1.4rem;
    font-weight: bold;
    margin-bottom: 1rem;
}

.partie-1 h3 span {
    font-weight: bold;
    color: var(--primary);
}

.partie-1 h4 span i{
    font-weight: bold;
    font-size: 1.2rem;
    color: var(--primary);
}

.partie-1 h4 span{
    margin-right: 10px;
    color: var(--text-light);
}

.partie-1 h1::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    width: 60px;
    height: 4px;
    background: var(--primary);
    border-radius: 2px;
}

.info-item {
    margin-bottom: 1.5rem;
    position: relative;
}

.info-label {
    display: flex;
    align-items: center;
    font-size: 0.875rem;
    color: var(--text-light);
    margin-bottom: 0.5rem;
}

.info-label i {
    font-size: 1rem;
    width: 24px;
    height: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: rgba(79, 70, 229, 0.1);
    color: var(--primary);
    border-radius: 50%;
    margin-right: 10px;
}

.info-value {
    font-weight: 600;
    font-size: 1.05rem;
    color: var(--text);
    padding-left: 34px;
}

.info-value.empty {
    color: var(--text-xlight);
    font-style: italic;
}

/* Animation pour les changements d'onglets */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}

.tab-content {
    animation: fadeIn 0.3s ease-out;
}

/* Responsive */
@media (max-width: 768px) {
    .tab-menu {
        overflow-x: auto;
        padding: 0;
        -webkit-overflow-scrolling: touch;
        scrollbar-width: none;
        justify-content: flex-start;
    }
    
    .tab-menu::-webkit-scrollbar {
        display: none;
    }
    
    .tab-item {
        padding: 12px 16px;
        font-size: 0.85rem;
        white-space: nowrap;
    }

    .information-content {
        padding: 1.5rem;
        gap: 0;
    }

    .partie-1, .partie-2 {
        flex: 1 1 100%;
        padding: 0.5rem;
    }

    .partie-1 h1 {
        font-size: 1.5rem;
    }
}

/* Animation pour les interactions */
.tab-item {
    transition: transform 0.2s;
}

.tab-item:active {
    transform: scale(0.98);
}


/* Animation */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}

/* Responsive */
@media (max-width: 992px) {
    .stats-container {
        flex-wrap: wrap;
    }
    
    .stat-card {
        flex: 1 1 calc(50% - 1rem);
        min-width: 240px;
    }
}

.acronyme-circle {
    width: 70px;
    height: 50px;
    border-radius: 50%;
    background-color: #007bff;
    color: white;
    align-items: center;
    justify-content: center;
    padding: 0.8rem;
    font-size: 18px;
    font-weight: bold;
    margin-right: 10px;
}

.acronymee-circle {
    width: 70px;
    height: 50px;
    border-radius: 50%;
    background-color: #007bff;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    font-weight: bold;
}




.membre-item1 {
    width: 200px;
    display: flex;
}

.membre-item2 {
    width: 210px;
}

.membre-item2 ul li span{
    color: blue;
}

.membre-item2 p {
    color: var(--text-light);
    margin-bottom: 5px;
}
.membre-item2 p i{
    color: var(--text-light);
}

.membre-grid {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 20px;
}

.membre-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 15px;
    background-color: white;
}

.acronymee-circle {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background-color: #007bff;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 10px;
}

.pagination-container {
    margin-top: 20px;
    text-align: center;
}

.pagination-container .pagination {
    display: inline-flex;
    list-style: none;
    padding: 0;
}

.pagination-container .pagination li {
    margin: 0 5px;
}

.pagination-container .pagination li a {
    display: block;
    padding: 8px 12px;
    border: 1px solid #ddd;
    border-radius: 4px;
    color: #007bff;
    text-decoration: none;
}

.pagination-container .pagination li a:hover {
    background-color: #007bff;
    color: white;
}

.btn-modifier {
    display: inline-block;
    margin-top: 20px;
    padding: 10px 20px;
    background-color: #007bff;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    font-size: 14px;
    font-weight: bold;
    transition: background-color 0.3s ease;
}

.btn-modifier:hover {
    background-color: #0056b3;
    color: white;
}

.btn-delete {
    display: inline-block;
    margin-top: 10px;
    padding: 10px 20px;
    background-color: #dc3545;
    color: white;
    text-decoration: none;
    border: none;
    border-radius: 5px;
    font-size: 14px;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn-delete:hover {
    background-color: #a71d2a;
}

.form-delete {
    display: inline-block;
    margin-top: 10px;
}

.membre-actions {
    display: flex;
    margin-top: 10px;
}

.btn-action {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 35px;
    height: 35px;
    border: none;
    border-radius: 50%;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn-edit {
    background-color: #007bff;
    color: white;
}

.btn-edit:hover {
    background-color: #0056b3;
}

.btn-delete {
    background-color: #dc3545;
    color: white;
}

.btn-delete:hover {
    background-color: #a71d2a;
}

.form-delete {
    display: inline-block;
    margin-top: 10px;
}
