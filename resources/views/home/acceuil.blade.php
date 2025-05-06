@extends('welcome')

@section('name', 'Accueil')

@section('content')

    <section class="homee">
        <div class="homee-content">
            <h2>Ministère des affaires sociales et de la microfiance (MASM)</h2>
            <h3>Emancipation de la femme notre devoir !</h3>
            <p>Le groupement des professionnels de la santé est une association qui regroupe les professionnels de la santé
                de la région de l'ouest du Cameroun.</p>
            <a href="#body-header" class="btnn">En savoir plus</a>
        </div>

        <div class="homee-img">
            <div class="femme">
                <img src="{{ asset('images/FEME.png') }}" alt="Logo" style="width: ;">
            </div>
        </div>

        <div class="femme2">

        </div>

    </section>

    <section id="body-header">
        <div class="body-content">
            <h3>Qui sommes nous ?</h3>
            <p>Le Ministère des Affaires Sociales et de la Microfinance joue un rôle fondamental dans l’élaboration et la
                mise en œuvre des politiques publiques visant à améliorer les conditions de vie des populations vulnérables
                et à promouvoir l’inclusion financière. À travers ses différentes initiatives, il travaille à renforcer la
                protection sociale, à soutenir les groupes défavorisés et à encourager l'autonomisation économique, en
                particulier celle des femmes et des jeunes. En facilitant l’accès aux services sociaux de base et en
                développant des programmes de microfinance adaptés, le ministère contribue à la réduction de la pauvreté et
                à l’amélioration du bien-être des citoyens. Il collabore également avec des partenaires nationaux et
                internationaux pour financer des projets de développement et accompagner les bénéficiaires dans la gestion
                efficace de leurs activités génératrices de revenus.</p>
            <p>Dans le domaine de la microfinance, le ministère met en place des mécanismes permettant aux populations
                exclues du système bancaire classique d’accéder à des financements adaptés à leurs besoins. À travers des
                structures spécialisées et des programmes de soutien, il favorise la création et le développement des
                coopératives et des groupements de microfinance, facilitant ainsi l’entrepreneuriat et la résilience
                économique. L’adoption de solutions numériques pour la gestion de ces initiatives constitue un enjeu majeur,
                permettant une meilleure traçabilité des fonds, une transparence accrue et un suivi plus efficace des
                bénéficiaires. Grâce à ces actions, le Ministère des Affaires Sociales et de la Microfinance s’impose comme
                un acteur clé du développement social et économique, en garantissant un cadre favorable à l’inclusion et à
                l’épanouissement des populations les plus vulnérables.</p>
        </div>
        <div class="femme3">

        </div>
        <div class="femme4">

        </div>
    </section>

    <section class="contact">
        <div class="contact-content">
            <h2>NEWSLETTER</h2>
            <form action="" method="get">
                <label for="">Nom</label>
                <input type="text" name="nom" id="">
                <label for="">Prénom</label>
                <input type="text" name="prenom" id="">
                <label for="">Email</label>
                <input type="email" name="email" id="">
                <button type="submit">Envoyer</button>
            </form>
        </div>

        <div class="contact-img">
            <h2>Toute l’actualité du Ministere en temps réel sur nos réseaux sociaux. <br>
                <a href="#"><i class='bx bxl-facebook'></i></a>
                <a href="#"><i class='bx bxl-youtube'></i></a>
                <a href="#"><i class='bx bx-search'></i></a>
            </h2>
        </div>

    </section>

    <style>
        .homee {
            position: relative;
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 50px 8% 0;
            overflow: hidden;
        }

        .homee-content {
            max-width: 630px;
        }

        .homee-content h2 {
            font-size: 50px;
            line-height: 1.2;
        }

        .homee-content h3 {
            font-size: 30px;
            color: #c2bd35;
        }

        .homee-content p {
            font-size: 20px;
            line-height: 1.2;
            margin: 15px 0 30px;
        }

        .btnn {
            display: inline-block;
            padding: 10px 28px;
            background: #b2ae2e;
            border-radius: 6px;
            box-shadow: 0 0 10 rgba(0 0 0 0.1);
            color: #fff;
            font-weight: 600;
            letter-spacing: 1px;
            font-size: 16px;
            text-decoration: none;
            /*opacity: 0;
        animation: slideRight 1s ease forwards;*/
            transition: .5s;
        }

        .btnn:hover {
            background: transparent;
            color: #c2bd35;
        }

        .homee-img {
            position: relative;
            right: -7%;
            width: 450px;
            height: 450px;
            transform: rotate(45deg);
        }

        .homee-img .femme {
            position: absolute;
            width: 100%;
            height: 100%;
            background: #eaeaea;
            border: 25px solid #b2ae2e;
            box-shadow: (-15px 15px 15px rgba(0, 0, 0, 0.2));
        }

        .homee-img .femme img {
            position: absolute;
            max-width: 750px;
            bottom: -85px;
            right: -85px;
            transform: rotate(-45deg);
        }

        .homee .femme2 {
            position: absolute;
            width: 700px;
            height: 700px;
            top: -25%;
            right: -25%;
            background: #b2ae2e;
            transform: rotate(45deg);
            z-index: -1;
        }

        /*
    @keyframes slideRight {
        0% {
            opacity: 0;
            transform: translateY(-100px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }

    }*/

        #body-header {
            position: relative;
            width: 100%;
            overflow: hidden;
            margin-bottom: 15px;
        }

        .body-content {
            padding: 50px 15%;
        }

        .body-content h3 {
            text-align: center;
            font-size: 30px;
            line-height: 1.2;
            margin-bottom: 8%;
        }

        .body-content p {
            font-size: 20px;
            line-height: 1.2;
            margin-bottom: 20px;
            text-align: justify;
        }



        #body-header .femme3 {
            position: absolute;
            width: 500px;
            height: 500px;
            top: 25%;
            right: -8%;
            background: #b2ae2e;
            transform: rotate(45deg);
            z-index: -1;
        }

        #body-header .femme4 {
            position: absolute;
            width: 500px;
            height: 500px;
            top: 80%;
            left: -8%;
            background: #b2ae2e;
            transform: rotate(45deg);
            z-index: -1;
        }

        .contact {
            position: relative;
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 50px 8% 0;
            overflow: hidden;
        }

        .contact-content {
            max-width: 630px;
        }

        .contact-content h2 {
            font-size: 50px;
            line-height: 1.2;
            margin-bottom: 5%;
        }

        .contact-img {
            position: relative;
            right: -5%;
            width: 450px;
            height: 450px;
            background-color: #eaeaea;
            border: 20px solid #b2ae2e;
            display: flex;
            justify-content: center;
            align-items: center;
            transform: rotate(45deg);
        }

        .contact-img h2 {
            transform: rotate(-45deg);
            text-align: center;
            font-size: 30px;
            font-weight: 600;
            width: 80%;
            padding-bottom: 3%;
        }

        .contact-img h2 a {
            padding: 3%;
            color: #b2ae2e;
        }


        .contact-img p {
            transform: rotate(-45deg);
            text-align: center;
            width: 80%;
            padding-top: 10px;
        }

        /*
    .contact-img .contact-femme{
        position: absolute;
        width: 100%;
        height: 100%;
        background:#eaeaea;
        border: 25px solid #b2ae2e;
        box-shadow: (-15px 15px 15px rgba(0, 0, 0, 0.2));
    }
    */
        .contact-img .contact-femme img {
            position: absolute;
            transform: rotate(-45deg);
        }

        .contact-content form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .contact-content form input {
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
    </style>


@endsection()