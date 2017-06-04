@extends ('layouts.master')

@section('navlist')
<li><a href="/">Acasă</a></li>
<li class="current"><a href="/produse">Produse</a></li>
<li ><a href="/euri">E-uri</a></li>
<li><a href="/profil">Profil</a><ul>
    <li><a href="/setari">Setări</a></li></ul></li>
<li><a href="/contact">Contact</a></li>
<li><a href="auth/logout">Deconectare</a></li>
@endsection 

@section('main')
<!-- Main -->
<section class="wrapper style1">
    <div class="container">
        <div class="row 200%">
            <div class="8u 12u(narrower)">
                <div id="content">

                    <!-- Content -->

                    <article>
                        <header>
                            <h2>Cauta informatii despre un anumit produs alimentar</h2>
                        </header>
                        <p></p>
                         <div class="row 50%">
                            <div class="7u 12u(mobilep)">
                                <form action="/produse/{name}" method="GET" >
                                <input type="text" name="produs" placeholder="Introdu codul de bare/denumirea produsului..." required>
                            </div>
                            <div class="2u 12u(mobilep)">
                                    <button class="button3" type="submit">Caută</button>
                                </form>
                                
                            </div>

                        </div>


                    </article>

                </div>
            </div>
            <div class="4u 12u(narrower)">
                <div id="sidebar">

                    <!-- Sidebar -->

                    <section>
                        <h3>Atentie!</h3>
                        <p>Excesul de sare, zahăr şi grăsimi dăunează grav sănătăţii.</p>
                    </section>



                </div>
            </div>
        </div>
    </div>
</section>
@endsection