@extends('layouts.guest')

@section('title', 'Tarifs de JustLadies')
@section('content')
   <div id="article-wrapper" class="md:container lg:mx-auto mb-20 mt-24 lg:mt-8 lg:mt-0 flex flex-col lg:flex-row">
        <article class="w-full">
            <div class="mb-10 hidden lg:block"><a href="{{ url()->previous() }}"
                    class="bg-tertiary rounded-lg px-4 h-10 leading-10 inline-block cursor-pointer">Retour</a></div>
            <h1 class="strong text-4xl mb-6 px-4 lg:p-0">Tarifs de JustLadies</h1>
            <div class="mt-8 lg:mt-20 text-base px-4 lg:p-0">
                <h3><strong>Le tarif de publication</strong></h3>
                <p><br>La publication des profils est facturée par jour et selon un barème dégressif.&nbsp;<br>À partir de
                    10,50 CHF</p>
                <figure class="image image_resized" style="width: 100%;"><img
                        src="https://www.bemygirl.ch/storage/976adcf13bab168a76ffe4a55e9d0f42/60dc2a245992f.jpeg" alt="60dc2a245992f.jpeg"
                        srcset="https://www.bemygirl.ch/storage/976adcf13bab168a76ffe4a55e9d0f42/60dc2a245992f.jpeg?w=360 360w, https://www.bemygirl.ch/storage/976adcf13bab168a76ffe4a55e9d0f42/60dc2a245992f.jpeg?w=570 570w, https://www.bemygirl.ch/storage/976adcf13bab168a76ffe4a55e9d0f42/60dc2a245992f.jpeg?w=720 720w, https://www.bemygirl.ch/storage/976adcf13bab168a76ffe4a55e9d0f42/60dc2a245992f.jpeg?w=1440 1440w"
                        sizes="100vw"></figure>
                <h3><br><strong>Promouvoir votre profil</strong></h3>
                <p><br>Avec les toplines, votre profil est au premier plan et vous avez accès à davantage de
                    clients.&nbsp;<br>À partir de 15 CHF</p>
                <figure class="image image_resized" style="width: 100%;"><img
                        src="https://www.bemygirl.ch/storage/a64ab2512c197c389b6d9f6e2c0175d6/60dc2a34d827c.jpeg" alt="60dc2a34d827c.jpeg"
                        srcset="https://www.bemygirl.ch/storage/a64ab2512c197c389b6d9f6e2c0175d6/60dc2a34d827c.jpeg?w=360 360w, https://www.bemygirl.ch/storage/a64ab2512c197c389b6d9f6e2c0175d6/60dc2a34d827c.jpeg?w=570 570w, https://www.bemygirl.ch/storage/a64ab2512c197c389b6d9f6e2c0175d6/60dc2a34d827c.jpeg?w=720 720w, https://www.bemygirl.ch/storage/a64ab2512c197c389b6d9f6e2c0175d6/60dc2a34d827c.jpeg?w=1440 1440w"
                        sizes="100vw"></figure>
                <h3>&nbsp;</h3>
                <h3><strong>Les photos shooting</strong></h3>
                <p><br>JustLadies vous enverra un lien de réservation pour sélectionner le shooting de votre choix.&nbsp;<br>À
                    partir de 150 CHF</p>
                <figure class="image image_resized" style="width: 100%;"><img
                        src="https://www.bemygirl.ch/storage/2a80fdf0fe88681818ce0fea63bf9b66/60dc2a45a292c.jpeg" alt="60dc2a45a292c.jpeg"
                        srcset="https://www.bemygirl.ch/storage/2a80fdf0fe88681818ce0fea63bf9b66/60dc2a45a292c.jpeg?w=360 360w, https://www.bemygirl.ch/storage/2a80fdf0fe88681818ce0fea63bf9b66/60dc2a45a292c.jpeg?w=570 570w, https://www.bemygirl.ch/storage/2a80fdf0fe88681818ce0fea63bf9b66/60dc2a45a292c.jpeg?w=720 720w, https://www.bemygirl.ch/storage/2a80fdf0fe88681818ce0fea63bf9b66/60dc2a45a292c.jpeg?w=1440 1440w"
                        sizes="100vw"></figure>
                <h3>&nbsp;</h3>
                <h3><strong>Les tarifs des escorts</strong></h3>
                <p><br>
                    JustLadies n'est en aucun cas un intermédiaire et n'a aucune relation avec l'activité des escortes sur
                    la plateforme. Les tarifs de chaque expérience peuvent varier d'une fille à l'autre.</p>
            </div>
        </article>
    </div>
@endsection
