@extends('layouts.guest')

@section('title', 'Qui-sommes-nous?')
@section('content')
<div id="article-wrapper" class="md:container lg:mx-auto mb-20 mt-24 lg:mt-8 lg:mt-0 flex flex-col lg:flex-row">
    <article class="w-full">
        <div class="mb-10 hidden lg:block"><a href="{{ url()->previous() }}"
                class="bg-tertiary rounded-lg px-4 h-10 leading-10 inline-block cursor-pointer">Retour</a></div>
        <h1 class="strong text-4xl mb-6 px-4 lg:p-0">Qui sommes-nous ?</h1>
        <div class="mt-8 lg:mt-20 text-base px-4 lg:p-0">
            <h3><strong>La naissance</strong></h3>
            <p><br>L’idée de JustLadies émerge au cours d’un dîner auquel participent trois amis célibataires, chacun
                faisant part de ses difficultés à trouver des partenaires sur les sites de rencontres traditionnelles.
                Partant de ce constat, le concept d’une plateforme en ligne dédiée aux rencontres payantes voit le jour
                en 2012.&nbsp;<br><br>JustLadies se veut être l’unique application web à garantir chaque profil et
                l’ensemble des photos présentées sous un regard artistique et novateur.</p>
            <figure class="image image_resized" style="width: 100%;"><img
                    src="https://www.bemygirl.ch/storage/837bbeee9f82d2c7b76d0b8aabfdf1a2/60dc2dc956c3d.jpeg" alt="60dc2dc956c3d.jpeg"
                    srcset="https://www.bemygirl.ch/storage/837bbeee9f82d2c7b76d0b8aabfdf1a2/60dc2dc956c3d.jpeg?w=360 360w, https://www.bemygirl.ch/storage/837bbeee9f82d2c7b76d0b8aabfdf1a2/60dc2dc956c3d.jpeg?w=570 570w, https://www.bemygirl.ch/storage/837bbeee9f82d2c7b76d0b8aabfdf1a2/60dc2dc956c3d.jpeg?w=720 720w, https://www.bemygirl.ch/storage/837bbeee9f82d2c7b76d0b8aabfdf1a2/60dc2dc956c3d.jpeg?w=1440 1440w"
                    sizes="100vw"></figure>
            <h3><br><strong>Plus d'intermédiaire</strong></h3>
            <p><br>La plateforme met donc en relation des femmes proposant des rencontres payantes avec leurs clients,
                tout en éliminant les intermédiaires. Aucune commission n’est perçue sur le montant des rencontres et
                l’application vit uniquement de la publication des profils.&nbsp;<br><br>Grâce à la digitalisation,
                JustLadies apporte une totale transparence et indépendance aux femmes qui souhaitent offrir leur charme.
            </p>
            <figure class="image image_resized" style="width: 100%;"><img
                    src="https://www.bemygirl.ch/storage/aec8982abef88f4809520d929c68b511/60dc2ddce30d0.jpeg" alt="60dc2ddce30d0.jpeg"
                    srcset="https://www.bemygirl.ch/storage/aec8982abef88f4809520d929c68b511/60dc2ddce30d0.jpeg?w=360 360w, https://www.bemygirl.ch/storage/aec8982abef88f4809520d929c68b511/60dc2ddce30d0.jpeg?w=570 570w, https://www.bemygirl.ch/storage/aec8982abef88f4809520d929c68b511/60dc2ddce30d0.jpeg?w=720 720w, https://www.bemygirl.ch/storage/aec8982abef88f4809520d929c68b511/60dc2ddce30d0.jpeg?w=1440 1440w"
                    sizes="100vw"></figure>
            <h3><br><strong>L’anonymat</strong></h3>
            <p><br>JustLadies garantit l’ensemble des profils présentés mais également l’anonymat de ses utilisateurs et
                utilisatrices. Chaque femme peut choisir de montrer son visage ou non et de bloquer l’accès à son profil
                depuis les pays de son choix.</p>
            <figure class="image image_resized" style="width: 100%;"><img
                    src="https://www.bemygirl.ch/storage/4053284dbaa9b293a87865cce46a036b/60dc2ded3d0ec.jpeg" alt="60dc2ded3d0ec.jpeg"
                    srcset="https://www.bemygirl.ch/storage/4053284dbaa9b293a87865cce46a036b/60dc2ded3d0ec.jpeg?w=360 360w, https://www.bemygirl.ch/storage/4053284dbaa9b293a87865cce46a036b/60dc2ded3d0ec.jpeg?w=570 570w, https://www.bemygirl.ch/storage/4053284dbaa9b293a87865cce46a036b/60dc2ded3d0ec.jpeg?w=720 720w, https://www.bemygirl.ch/storage/4053284dbaa9b293a87865cce46a036b/60dc2ded3d0ec.jpeg?w=1440 1440w"
                    sizes="100vw"></figure>
            <h3><br><strong>Développement 100% Suisse</strong></h3>
            <p><br>L’équipe de JustLadies a réalisé plus de 7’000 shootings en Suisse depuis sa mise en ligne en 2012 et
                sa communauté représente plus de 35’000 membres.&nbsp;<br><br>L’intégralité du développement de la
                plateforme et de son concept ont été fait en Suisse par la start-up et ses partenaires exclusifs.</p>
            <figure class="image image_resized" style="width: 100%;"><img
                    src="https://www.bemygirl.ch/storage/d4b29811e832782100f8d6475b04e272/60dc2dfef07ae.jpeg" alt="60dc2dfef07ae.jpeg"
                    srcset="https://www.bemygirl.ch/storage/d4b29811e832782100f8d6475b04e272/60dc2dfef07ae.jpeg?w=360 360w, https://www.bemygirl.ch/storage/d4b29811e832782100f8d6475b04e272/60dc2dfef07ae.jpeg?w=570 570w, https://www.bemygirl.ch/storage/d4b29811e832782100f8d6475b04e272/60dc2dfef07ae.jpeg?w=720 720w, https://www.bemygirl.ch/storage/d4b29811e832782100f8d6475b04e272/60dc2dfef07ae.jpeg?w=1440 1440w"
                    sizes="100vw"></figure>
            <h3><br><strong>La marque</strong></h3>
            <p><br>JustLadies est une marque déposée en le 27 janvier 2012 en Suisse (no de marque:
                630272).&nbsp;<br><br>L'ensemble des photographies et du contenu de JustLadies, y compris les textes, les
                pictogrammes, les graphismes, logos et autres fichiers, sont la propriété de la start-up et sont
                protégés par les lois suisses et internationales du droit d’auteur, des marques commerciales et de la
                propriété intellectuelle.</p>
            <figure class="image image_resized" style="width: 100%;"><img
                    src="https://www.bemygirl.ch/storage/e4a2b76f902a28f437fbf6f9000ba8c1/61d6ec4ac228d.jpg" alt="61d6ec4ac228d.jpg"
                    srcset="https://www.bemygirl.ch/storage/e4a2b76f902a28f437fbf6f9000ba8c1/61d6ec4ac228d.jpg?w=360 360w, https://www.bemygirl.ch/storage/e4a2b76f902a28f437fbf6f9000ba8c1/61d6ec4ac228d.jpg?w=570 570w, https://www.bemygirl.ch/storage/e4a2b76f902a28f437fbf6f9000ba8c1/61d6ec4ac228d.jpg?w=720 720w, https://www.bemygirl.ch/storage/e4a2b76f902a28f437fbf6f9000ba8c1/61d6ec4ac228d.jpg?w=1440 1440w"
                    sizes="100vw"></figure>
            <h3><br><strong>Investisseurs</strong></h3>
            <p><br>Pour toute demande de renseignement, contactez-nous à l'adresse : info@JustLadies.com. Vous pouvez
                également faire une demande de notre prochaine ouverture de capital.</p>
        </div>
    </article>
</div>
@endsection
