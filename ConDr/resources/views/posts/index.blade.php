@extends ('layouts.master')

@section('navlist')
<li class="current"><a href="/">Acasă</a></li>
<li><a href="/produse">Produse</a></li>
<li><a href="/euri">E-uri</a></li>
<li><a href="/profil">Profil</a><ul>
    <li><a href="/setari">Setări</a></li></ul></li>
<li><a href="/contact">Contact</a></li>
<li><a href="/login">Deconectare</a></li>
@endsection

@section ('banner') 
<section id="banner">
    <header>

    </header>
</section>
@endsection

@section ('main') 
<section class="wrapper style1">
    <div class="container">
        <div class="row 200%">
            <section class="4u 12u(narrower)">
                <div class="box highlight">
                    <i class="icon major fa-search" ></i>
                    <h3>Informează-te</h3>
                    <p>Îți asigurăm o calitate a căutarii produselor si E-urilor existente pentru a vă informa asupra acestora.</p>
                </div>
            </section>
            <section class="4u 12u(narrower)">
                <div class="box highlight">
                    <i class="icon major fa-user" aria-hidden="true"></i>
                    <h3>Oferă feedback</h3>
                    <p>Ai posibilitatea de a oferi feedback si rating anumitor produse, pentru a împartăși și altor consumatori părerea ta.</p>
                </div>
            </section>
            <section class="4u 12u(narrower)">
                <div class="box highlight">
                    <i class="icon major fa-pencil" aria-hidden="true"></i>
                    <h3>Ajută-ne</h3>
                    <p>Ne puteți ajuta la îmbunătățirea site-ului prin trimiterea unui e-mail pe adresa de contact, sau prin <a href="/adauga"> adăugarea produselor</a>. </p>
                </div>
            </section>
        </div>
    </div>
</section>

<!-- Gigantic Heading -->
<section class="wrapper style2">
    <div class="container">
        <header class="major">

            <h2>Mesajele săptămânii</h2>
            <p></p>
            <div id="changeText" class="paragraph"></div>
                <script type="text/javascript">
                var text = ["O minte sănătoasă într-un corp sănătos.", "Sănătatea e darul cel mai frumos şi mai bogat pe care natura ştie să-l facă.", "Esenţa fericirii este sănătatea, iar a sănătăţii e mişcarea.", "Sănătatea e unitatea ce dă valoare tuturor zerourilor vieţii."];
                var counter = 0;
                var elem = document.getElementById("changeText");
                var change = function(){
                    elem.innerHTML = text[counter++];
                    if(counter >= text.length) { counter = 0; }
                }
                setInterval(change, 5000);
                change();
                </script>
        </header>
    </div>
</section>

<!-- Posts -->
<section class="wrapper style1">
    <div class="container">
        <div class="row">
            <section class="6u 12u(narrower)">
                <div class="box post">
                    <a href="/produse" class="image left"><img src="images/produse-01.jpg" alt="" /></a>
                    <div class="inner">
                        <h3>Produse</h3>
                        <p>Pe această pagină puteți găsi produse din România, împreună cu valorile lor nutrționale.</p>
                    </div>
                </div>
            </section>
            <section class="6u 12u(narrower)">
                <div class="box post">
                    <a href="/euri" class="image left"><img src="images/euri-01.jpg" alt="" /></a>
                    <div class="inner">
                        <h3>E-uri</h3>
                        <p>În această categorie veți găsi toate E-urile existente in momentul de față.</p>
                    </div>
                </div>
            </section>
        </div>
        <div class="row">
            <section class="6u 12u(narrower)">
                <div class="box post">
                    <a href="/contact" class="image left"><img src="images/contact2-01.jpg" alt="" /></a>
                    <div class="inner">
                        <h3>Contact</h3>
                        <p>Pe această pagină ne puteți trimite un e-mail, în cazul anumitor neclarități sau pentru feedback.</p>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>
@endsection