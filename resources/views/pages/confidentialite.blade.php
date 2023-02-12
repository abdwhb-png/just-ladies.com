@extends('layouts.guest')

@section('title', 'Confidentialité')
@section('content')
<div id="article-wrapper" class="md:container lg:mx-auto mb-20 mt-24 lg:mt-8 lg:mt-0 flex flex-col lg:flex-row">
    <article class="w-full">
        <div class="mb-10 hidden lg:block"><a href="{{ url()->previous() }}"
                class="bg-tertiary rounded-lg px-4 h-10 leading-10 inline-block cursor-pointer">Retour</a></div>
        <h1 class="strong text-4xl mb-6 px-4 lg:p-0">Confidentialité</h1>
        <div class="mt-8 lg:mt-20 text-base px-4 lg:p-0">
            <h2><strong>1. Aperçu de la protection des données</strong></h2>
            <h4>&nbsp;</h4>
            <h4><strong>Remarques générales</strong><br>&nbsp;</h4>
            <p>Les remarques générales suivantes donnent un aperçu simple de ce qu’il advient de vos données à caractère
                personnel lorsque vous consultez notre site Web. Les données à caractère personnel sont les données
                permettant de vous identifier personnellement. Pour de plus amples informations sur la protection des
                données, veuillez consulter la déclaration de confidentialité présentée ci-dessous.</p>
            <h2>&nbsp;</h2>
            <h4><strong>Enregistrement des données sur notre site Web</strong><br>&nbsp;</h4>
            <p><strong>Qui est responsable de l’enregistrement des données sur le présent site Web?</strong><br>&nbsp;
            </p>
            <p>Le traitement des données sur ce site Web est du ressort du propriétaire du site. Veuillez consulter les
                mentions légales du site pour trouver ses coordonnées.<br>&nbsp;</p>
            <p><strong>Comment enregistrons-nous vos données?</strong><br>&nbsp;</p>
            <p>Vos données sont collectées lorsque vous nous les communiquez. Il peut s’agir de données que vous
                saisissez dans le formulaire de contact.<br>&nbsp;</p>
            <p>D’autres données sont automatiquement collectées par nos systèmes informatiques lors de la visite du site
                Web. Il s’agit notamment de données techniques (navigateur Internet, systèmes d’exploitation ou heure de
                la consultation de la page). Les données sont enregistrées automatiquement dès que vous consultez notre
                site Web.<br>&nbsp;</p>
            <p><strong>A quoi nous servent vos données?</strong><br>&nbsp;</p>
            <p>Une partie des données est collectée afin de garantir la mise à disposition sans faille du site Web.
                D’autres données peuvent être collectées pour analyser votre comportement en tant
                qu’utilisateur.<br>&nbsp;</p>
            <p><strong>Quels sont vos droits concernant vos données?</strong><br>&nbsp;</p>
            <p>Vous avez à tout moment le droit d’obtenir gratuitement des renseignements sur l’origine, le destinataire
                et la finalité des données à caractère personnel enregistrées. Vous avez par ailleurs le droit d’exiger
                la correction, le blocage ou la suppression de ces données. Pour ce faire, ainsi que pour toute autre
                information sur la protection des données, vous pouvez vous adresser à tout moment à l’adresse indiquée
                dans les mentions légales. Vous pouvez par ailleurs déposer un recours auprès de l’autorité de
                surveillance compétente.</p>
            <h2>&nbsp;</h2>
            <h4><strong>Outils d’analyse des prestataires tiers</strong><br>&nbsp;</h4>
            <p>Lors d’une visite sur notre site Web, vos habitudes de navigation peuvent être évaluées du point de vue
                statistique. Pour ce faire, des cookies et des programmes dits d’analyse sont utilisés. L’analyse de vos
                habitudes de navigation se fait généralement de manière anonyme; les habitudes de navigation ne
                permettent pas de vous identifier. Vous pouvez refuser cette analyse ou l’empêcher par la
                non-utilisation de certains outils. Vous trouverez des informations détaillées à ce sujet dans la
                déclaration de confidentialité ci-dessous.<br>&nbsp;</p>
            <p>Vous pouvez refuser cette analyse. Vous trouverez des informations sur les modalités de refus dans la
                présente déclaration de confidentialité.<br><br>&nbsp;</p>
            <h2><strong>2. Remarques générales et informations obligatoires</strong></h2>
            <h4><br><strong>Protection des données</strong><br>&nbsp;</h4>
            <p>Les exploitants de ce site prennent la protection de vos données personnelles très au sérieux. Nous
                traitons vos données personnelles avec discrétion, conformément aux règlements légaux ainsi qu’à la
                présente déclaration de protection de données.</p>
            <p>Lorsque vous utilisez le présent site Web, différentes données à caractère personnel sont collectées. Les
                données à caractère personnel sont les données permettant de vous identifier personnellement. La
                présente déclaration de confidentialité explique quelles données nous collectons et dans quel but. Elle
                explique également comment et à quelle fin nous le faisons.</p>
            <p>Nous attirons l’attention sur le fait que la transmission de données sur Internet (par exemple lors de
                communication par e-mail) peut présenter des lacunes en matière de sécurité. Une protection intégrale
                des données contre l’accès par des tiers n’est pas possible.</p>
            <h2>&nbsp;</h2>
            <h4><strong>Informations sur l’autorité compétente</strong><br>&nbsp;</h4>
            <p>L’autorité compétente pour le traitement des données sur ce site Web est:</p>
            <p>data@JustLadies.com<br>JustLadies<br>Rue du Nant<br>CH-1207 Genève<br>Suisse<br>&nbsp;</p>
            <p>L’autorité compétente est la personne physique ou morale qui décide, seule ou conjointement avec
                d’autres, de la finalité et des moyens de traitement des données à caractère personnel (noms, adresses
                de messagerie, etc.).</p>
            <h2>&nbsp;</h2>
            <h4><strong>Révocation de l’autorisation du traitement des données</strong><br>&nbsp;</h4>
            <p>De nombreux processus de traitement des données sont uniquement possibles avec votre consentement exprès.
                Vous pouvez révoquer à tout moment un consentement accordé. Une simple communication informelle par
                e-mail suffit. La légalité du traitement des données effectué avant cette révocation n’est pas affectée
                par la révocation.</p>
            <h2>&nbsp;</h2>
            <h4><strong>Droit de recours auprès de l’autorité de surveillance</strong><br>&nbsp;</h4>
            <p>La personne concernée peut déposer un recours auprès de l’autorité de surveillance compétente en cas de
                violation des directives sur la protection des données. L’autorité de surveillance compétente pour les
                questions de protection des données est le responsable de la protection des données du pays ou du canton
                du siège de notre entreprise.</p>
            <h2>&nbsp;</h2>
            <h4><strong>Droit à la portabilité des données</strong><br>&nbsp;</h4>
            <p>Vous avez le droit de demander le transfert de données que nous traitons de manière automatisée suite à
                votre consentement ou dans le cadre de l’exécution d’un contrat, à vous-même ou à un tiers dans un
                format couramment utilisé et lisible par machine. Si vous exigez le transfert direct des données à un
                autre responsable, nous y procédons uniquement dans la mesure où cela est techniquement possible.</p>
            <h2>&nbsp;</h2>
            <h4><strong>Cryptage SSL ou TLS</strong><br>&nbsp;</h4>
            <p>Pour des raisons de sécurité et de protection de la transmission de contenus confidentiels, tels que des
                commandes ou des demandes de prix que vous nous adressez en tant qu’exploitant du site, le présent site
                utilise un cryptage SSL ou TLS. Vous reconnaissez une connexion cryptée au petit cadenas qui s’affiche
                dans la barre d’adresse du navigateur, et à l’adresse elle-même, qui passe de «http://» à
                «https://».<br>&nbsp;</p>
            <p>Lorsque le cryptage SSL ou TLS est activé, les données que vous nous transmettez ne peuvent pas être
                interceptées par des tiers.</p>
            <h2>&nbsp;</h2>
            <h4><strong>Renseignements, blocage, suppression</strong><br>&nbsp;</h4>
            <p>Dans le cadre de dispositions légales en vigueur, vous avez à tout moment le droit de renseignement
                gratuit sur vos données à caractère personnel enregistrées, leur origine, leur destinataire, ainsi que
                la finalité du traitement des données, et le droit de corriger, bloquer ou supprimer ces données. Pour
                ce faire, ainsi que pour toute autre information sur les données à caractère personnel, vous pouvez vous
                adresser à tout moment à l’adresse indiquée dans les mentions légales.</p>
            <h2>&nbsp;</h2>
            <h4><strong>Opposition aux e-mails publicitaires</strong><br>&nbsp;</h4>
            <p>L’utilisation des données de contact publiées dans le cadre de l’obligation des mentions légales pour
                l’envoi de publicité et de matériel d’information qui n’auraient pas été expressément demandés est
                expressément interdite par la présente. L’exploitant de ces pages se réserve le droit d’engager des
                poursuites en cas d’envoi non sollicité d’informations publicitaires, par spam par exemple.</p>
            <h2>&nbsp;</h2>
            <h3><strong>Exploitation de la solution Web par des tiers (hébergement)</strong><br>&nbsp;</h3>
            <p>Pour JustLadies.com nous avons confié la mise en place et le soutien technique de notre plateforme
                (exploitation du serveur Web, hébergement) à la société Infomaniak, Rue Eugène-Marziano 25, 1227 Genève,
                Suisse. Si des données sont transmises, enregistrées et traitées dans ce contexte, elles le sont selon
                les instructions de l’exploitant de la plateforme et dans le cadre d’un mandat, conformément à la LPE /
                au RGPD de l’Union européenne.<br>&nbsp;</p>
            <p>Les serveurs utilisés pour l’exploitation se trouvent en Suisse.<br>&nbsp;</p>
            <p><strong>Sous-traitant</strong><br>&nbsp;</p>
            <p>La relation contractuelle avec le sous-traitant est régie par des contrats écrits et les dispositions de
                protection des données ci-dessous ont été remises à ce sous-traitant. Nous contrôlons régulièrement les
                mesures de protection de vos données par Infomaniak. Un transfert de ces données à des tiers par le
                sous-traitant est exclu par contrat.</p>
            <h2>&nbsp;</h2>
            <h2><strong>3. Responsable de la protection des données prescrit par la loi</strong></h2>
            <h3><strong>Responsable de la protection des données prescrit par la loi</strong></h3>
            <p>Nous avons nommé un responsable de la protection des données au sein de notre entreprise.<br>&nbsp;</p>
            <p>L’autorité compétente pour le traitement des données sur ce site Web est:<br>&nbsp;</p>
            <p>data@JustLadies.com<br>JustLadies<br>Rue du Nant<br>CH-1207 Genève<br>Suisse</p>
            <h2>&nbsp;</h2>
            <h2><strong>4. Enregistrement des données sur notre site Web</strong><br>&nbsp;</h2>
            <h3><strong>Cookies</strong><br>&nbsp;</h3>
            <p>Les pages Web utilisent des «cookies» en plusieurs endroits. Les cookies ne causent aucun dommage sur
                votre ordinateur et ne contiennent pas de virus. Les cookies servent à rendre notre offre plus
                conviviale, plus performante et plus sûre. Les cookies sont de petits fichiers texte qui sont déposés
                sur votre ordinateur et que votre navigateur enregistre.<br>&nbsp;</p>
            <p>La plupart des cookies que nous utilisons sont de type «session cookies». Ils seront automatiquement
                effacés après votre visite. D’autres cookies restent enregistrés sur votre périphérique jusqu’à ce que
                vous les supprimiez. Ces cookies nous permettent de reconnaître votre navigateur lors de votre visite
                suivante.<br>&nbsp;</p>
            <p>Vous pouvez configurer votre navigateur de façon à être informé de la création de cookies et à l’accepter
                au cas par cas, à accepter les cookies dans certains cas ou à les exclure de manière générale, ainsi que
                de façon à activer la suppression automatique des cookies à la fermeture du navigateur. Lors de la
                désactivation de cookies, la fonctionnalité de ce site Web peut être limitée.<br>&nbsp;</p>
            <p>Les cookies permettant l’exécution du processus de communication électronique ou la mise à disposition de
                certaines fonctions que vous demandez (fonction de panier, par exemple) sont enregistrés conformément à
                l’Art. 6 Al. 1 let. f RGPD. L’exploitant du site Web a un intérêt légitime à l’enregistrement de cookies
                à des fins de mise à disposition sans faille et optimale de ses services. Si d’autres cookies (cookies
                d’analyse de vos habitudes de navigation, par exemple) sont enregistrés, ceux-ci sont traités séparément
                dans la présente déclaration de confidentialité.</p>
            <h2>&nbsp;</h2>
            <h3><strong>Fichiers journaux du serveur</strong><br>&nbsp;</h3>
            <p>Le fournisseur du site collecte et enregistre automatiquement des informations dans des fichiers journaux
                du serveur, que votre navigateur nous transmet automatiquement. Ces données sont les
                suivantes:<br>&nbsp;</p>
            <p>Type version du navigateur</p>
            <p>Système d’exploitation utilisé</p>
            <p>URL précédemment visitée (URL de référence)</p>
            <p>Nom d’hôte de l’ordinateur</p>
            <p>Date et heure de la demande serveur</p>
            <p>Adresse IP</p>
            <p>Nom de la page/du fichier consultés</p>
            <p>Volume de données transmis</p>
            <p>Le fournisseur utilise les données du protocole à des fins d’évaluation statistique uniquement pour ses
                propres besoins, ainsi que pour la sécurité et l’optimisation de l’offre. Le fournisseur se réserve
                cependant le droit de contrôler ultérieurement les données du journal, si des indices concrets
                permettent de soupçonner une utilisation illicite.</p>
            <p><br>Ces données ne seront pas recoupées avec d’autres sources de données.<br>&nbsp;</p>
            <p>Le traitement des données se fonde sur l’art. 6 al. 1 let. b RGPD, qui autorise le traitement des données
                dans le cadre de l’exécution d’un contrat ou de mesures précontractuelles.</p>
        </div>
    </article>
</div>
@endsection
