@extends('layouts.guest')

@section('title', 'Contactez JustLadies')
@section('content')
<div id="article-wrapper" class="md:container lg:mx-auto mb-20 mt-24 lg:mt-8 lg:mt-0 flex flex-col lg:flex-row">
    <article class="w-full">
        <div class="mb-10 hidden lg:block"><a href="{{ url()->previous() }}"
                class="bg-tertiary rounded-lg px-4 h-10 leading-10 inline-block cursor-pointer">Retour</a></div>
        <h1 class="strong text-4xl mb-6 px-4 lg:p-0">Contactez JustLadies</h1>
        <div class="mt-8 lg:mt-20 text-base px-4 lg:p-0">
            <p>Nous répondons à vos demandes du lundi au vendredi de 08:00 à 18:00 par WhatsApp ou par E-mail.<br><br>Le
                délai de traitement moyen est actuellement de 24 heures.&nbsp;Merci de votre compréhension</p>
            <h4><a href="#"><strong>+41 79 960 69 69</strong></a></h4>
            <figure class="image image_resized" style="width: 100%;"><img
                    src="https://www.bemygirl.ch/storage/ad6b034001da751a13f67786f50330b2/613f779d6521b.jpg" alt="613f779d6521b.jpg"
                    srcset="https://www.bemygirl.ch/storage/ad6b034001da751a13f67786f50330b2/613f779d6521b.jpg?w=360 360w, https://www.bemygirl.ch/storage/ad6b034001da751a13f67786f50330b2/613f779d6521b.jpg?w=570 570w, https://www.bemygirl.ch/storage/ad6b034001da751a13f67786f50330b2/613f779d6521b.jpg?w=720 720w, https://www.bemygirl.ch/storage/ad6b034001da751a13f67786f50330b2/613f779d6521b.jpg?w=1440 1440w"
                    sizes="100vw"></figure>
            <p><br>L'équipe de JustLadies se fera un plaisir de répondre à l'ensemble de vos messages.&nbsp;<br><br>Nos
                bureaux sont situés au coeur de la ville de Genève et de Zürich.&nbsp;<br>Nos photographes se déplacent
                également partout en Suisse ou en France.</p>
            <h1 class="" style="width: 100%;">info@just-ladies.com</h1>
            <p>&nbsp;</p>
        </div>
    </article>
</div>
@endsection
