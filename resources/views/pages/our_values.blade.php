@extends('layouts.guest')

@section('title', 'Nos valeurs')
@section('content')
<div id="article-wrapper" class="md:container lg:mx-auto mb-20 mt-24 lg:mt-8 lg:mt-0 flex flex-col lg:flex-row">
    <article class="w-full">
        <div class="mb-10 hidden lg:block"><a href="{{ url()->previous() }}"
                class="bg-tertiary rounded-lg px-4 h-10 leading-10 inline-block cursor-pointer">Retour</a></div>
        <h1 class="strong text-4xl mb-6 px-4 lg:p-0">Nos valeurs</h1>
        <div class="mt-8 lg:mt-20 text-base px-4 lg:p-0">
            <h3><strong>Le respect</strong></h3>
            <p><br>La philosophie de la start-up repose sur des valeurs d’intégrité et de respect sans concession. Ce
                sont pour ces raisons que chaque femme y est représentée sans dénaturer sa beauté mais aussi, sans
                déshonorer sa personne.&nbsp;</p>
            <figure class="image image_resized" style="width: 100%;"><img
                    src="https://www.bemygirl.ch/storage//b3724b39545cdc99f62ad0f57a23fafe/60dc2af60d7cb.jpeg" alt="60dc2af60d7cb.jpeg"
                    srcset="https://www.bemygirl.ch/storage//b3724b39545cdc99f62ad0f57a23fafe/60dc2af60d7cb.jpeg?w=360 360w, https://www.bemygirl.ch/storage//b3724b39545cdc99f62ad0f57a23fafe/60dc2af60d7cb.jpeg?w=570 570w, https://www.bemygirl.ch/storage//b3724b39545cdc99f62ad0f57a23fafe/60dc2af60d7cb.jpeg?w=720 720w, https://www.bemygirl.ch/storage//b3724b39545cdc99f62ad0f57a23fafe/60dc2af60d7cb.jpeg?w=1440 1440w"
                    sizes="100vw"></figure>
            <h3><br><strong>Esprit d’équipe&nbsp;</strong></h3>
            <p><br>Avant tout c’est une équipe professionnelle soudée et animée par le désir commun de faire
                toujours mieux, d'être toujours plus créatifs. Nous partageons avec passion une vision de l'esthétisme
                artistique de la photographie érotique.</p>
            <figure class="image image_resized" style="width: 100%;"><img
                    src="https://www.bemygirl.ch/storage//d22ae14f176feec2293dfb4ddd5f9d2e/60dc2b091e362.jpeg" alt="60dc2b091e362.jpeg"
                    srcset="https://www.bemygirl.ch/storage//d22ae14f176feec2293dfb4ddd5f9d2e/60dc2b091e362.jpeg?w=360 360w, https://www.bemygirl.ch/storage//d22ae14f176feec2293dfb4ddd5f9d2e/60dc2b091e362.jpeg?w=570 570w, https://www.bemygirl.ch/storage//d22ae14f176feec2293dfb4ddd5f9d2e/60dc2b091e362.jpeg?w=720 720w, https://www.bemygirl.ch/storage//d22ae14f176feec2293dfb4ddd5f9d2e/60dc2b091e362.jpeg?w=1440 1440w"
                    sizes="100vw"></figure>
            <h3><br><strong>Innovation et croissance</strong></h3>
            <p>&nbsp;</p>
            <p>La marque JustLadies est bien plus ambitieuse qu’une simple plateforme de rencontre. C’est la somme de
                nombreux éléments qui animent le cœur même de la start-up qui ne cesse de se réinventer dans un souci
                de perfection.</p>
        </div>
    </article>
</div>
@endsection
