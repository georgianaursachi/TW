@extends ('layouts.master')

@section('navlist')
<li><a href="/">Acasă</a></li>
<li class="current"><a href="/produse">Produse</a></li>
<li><a href="/euri">E-uri</a></li>
<li><a href="/profil">Profil</a></li>
<li><a href="/contact">Contact</a></li>
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
                            <p>Daca nu gasesti produsul incearca sa cauti e-urile aici</p>
                            <form>

                                <div class="6u 12u(mobilep)">
                                    <ul>
                                        <input type="text" placeholder="Introdu codul de bare/denumirea produsului..." required>
                                        <button class="button" id="search" type="submit">Cauta</button>
                                    </ul>
                                </div>
                            </form>

                        </header>
                        <p></p>
                        <div class="row 150%">
                            <section class="4u 12u(narrower)">
                                <div class="box highlight">
                                    <h3>Număr de e-uri</h3>
                                    <p class="icon major">1/2/3</p>
                                    <p>lista euri din produs+level danger</p>

                                </div>
                            </section>

                            <section class="4u 12u(narrower)">
                                <div class="box highlight">
                                    <h3>Sfat personalizat</h3>
                                    <p>text sfat</p>
                                </div>
                            </section>

                            <section class="4u 12u(narrower)">
                                <div class="box highlight">
                                    <h3>Nota produs</h3>
                                    <p>in functie de euri/boala/etc</p>
                                </div>
                            </section>
                        </div>

                        <h3>Comentarii</h3>
                        <p>comentariu 1</p>
                        <p>comentariul 2</p>

                        <div class="row 50%">
                            <div class="12u">
                                <textarea name="comentariu" id="comentariu" placeholder="Lasa un comentariu..." rows="5" required></textarea>
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

                    <section>
                        <h3>Calculator nutritional</h3>
                        <section class="6u 12u(narrower)">
                            <form>
                                <div class="row ">

                                    <div class="12u(mobilep)">
                                        Sare: <input type="number" name="salt" id="salt" />
                                    </div>

                                    <div class="12u(mobilep)">
                                        Zahăr: <input type="number" name="sugar" id="sugar" />
                                    </div>

                                    <div class="12u(mobilep)">
                                        Grăsimi: <input type="number" name="fats" id="fats" />
                                    </div>

                                    <div class="12u(mobilep)">
                                        Carbohidrați: <input type="number" name="carbs" id="carbs" />
                                    </div>

                                    <div class="12u(mobilep)">
                                        Fibre: <input type="number" name="fibers" id="fibers" />
                                    </div>

                                    <div class="12u(mobilep)">
                                        Proteine: <input type="number" name="proteins" id="proteins" />
                                    </div>

                                    <div class="12u(mobilep)">
                                        Calorii: <input type="number" name="calories" id="calories" />
                                    </div>

                                    <div class="12u(mobilep)">
                                        Grăsimi saturate: <input type="number" name="saturates" id="saturates" />
                                    </div>

                                </div>

                                <div class="row 50%">
                                    <div class="12u">
                                        <textarea name="eNumber" id="eNumber" placeholder="E-uri" rows="5"></textarea>
                                    </div>
                                </div>





                                <div class="row 50%">
                                    <div class="12u">
                                        <ul class="actions">
                                            <li><input type="submit" class="button alt" value="Calculeaza" /></li>
                                        </ul>
                                    </div>
                                </div>
                            </form>
                        </section>
                    </section>



                </div>
            </div>
        </div>
    </div>
</section>
@endsection
