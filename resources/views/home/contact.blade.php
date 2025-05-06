@extends('welcome')

@section('name', 'Contact')

@section('content')

    <section class="contacter">
        <div class="contact-content">
            <h2>Contactez-nous</h2>
            <p>Envoyer un message au Ministère des Affaires Sociales et de la Microfinance du Bénin en remplissant le
                formulaire ci-dessous.</p>
            <form action="" method="get">
                <label for="">Nom*</label>
                <input type="text" name="nom" id="">
                <label for="">Email*</label>
                <input type="email" name="prenom" id="">
                <label for="">Object*</label>
                <input type="email" name="email" id="">
                <label for="">Message*</label>
                <textarea name="message" id="" cols="30" rows="5"></textarea>
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

        <div class="femme5">

        </div>
    </section>

    <section class="geo">
        <h1>Geo-(MASM)</h1>
        <div id="map"></div>
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
        <script>

            var map = L.map('map').setView([12.6395, 8.0029], 15);


            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);


            L.marker([12.6395, 8.0029]).addTo(map)
                .bindPopup('Ministère des Affaires Sociales et de la Microfinance')
                .openPopup();
        </script>
    </section>

    <style>
        .contacter {
            position: relative;
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 27% 8% 200px;
            overflow: hidden;
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

        .geo {
            width: 100%;
            padding: 5% 5% 5% 5%;
            background: white;
        }

        .geo h1 {
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
    </style>

@endsection()