@extends ('layouts.master') 

@section('navlist')
<li><a href="/">Acasă</a></li>
<li><a href="/produse">Produse</a></li>
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


                        <!--<span class="image featured"><img src="images/banner.jpg" alt="" /></span>-->

                    </article>
                    <section class="6u 12u(narrower)">
                        <h3>Adaugă produs</h3>
                        <form>
                            <div class="row ">
                                <div class="6u 12u(mobilep)">
                                    Nume Produs: <input type="text" name="name" id="name" placeholder="Nume" required/>
                                </div>

                                <div class="6u 12u(mobilep)">
                                    Cod de bare: <input type="number" name="barCode" id="barCode" placeholder="Cod de bare" required/>
                                </div>

                                <div class="6u 12u(mobilep)">
                                    Sare: <input type="number" name="salt" id="salt" placeholder="Sare" />
                                </div>

                                <div class="6u 12u(mobilep)">
                                    Zahăr: <input type="number" name="sugar" id="sugar" placeholder="Zahăr" />
                                </div>

                                <div class="6u 12u(mobilep)">
                                    Grăsimi: <input type="number" name="fats" id="fats" placeholder="Grăsimi" />
                                </div>

                                <div class="6u 12u(mobilep)">
                                    Carbohidrați: <input type="number" name="carbs" id="carbs" placeholder="Carbohidrați" />
                                </div>

                                <div class="6u 12u(mobilep)">
                                    Fibre: <input type="number" name="fibers" id="fibers" placeholder="Fibre" />
                                </div>

                                <div class="6u 12u(mobilep)">
                                    Proteine: <input type="number" name="proteins" id="proteins" placeholder="Proteine" required/>
                                </div>

                                <div class="6u 12u(mobilep)">
                                    Calorii: <input type="number" name="calories" id="calories" placeholder="Calorii" />
                                </div>

                                <div class="6u 12u(mobilep)">
                                    Grăsimi saturate: <input type="number" name="saturates" id="saturates" placeholder="Grăsimi saturate" />
                                </div>

                            </div>

                            <div class="row 50%">
                                <div class="12u">
                                    <textarea name="eNumber" id="eNumber" placeholder="E-uri" rows="5"></textarea>
                                </div>
                            </div>

                            <div class="row 50%">
                                <div class="12u">
                                    <textarea name="desricption" id="description" placeholder="Descriere" rows="5" required></textarea>
                                </div>
                            </div>



                            <div class="row 50%">
                                <div class="12u">
                                    <ul class="actions">
                                        <li><input type="submit" class="button alt" value="Trimite mesaj" /></li>
                                    </ul>
                                </div>
                            </div>
                        </form>
                    </section>

                </div>
            </div>
            <div class="4u 12u(narrower)">
                <div id="sidebar">

                    <!-- Sidebar -->

                    <section>
                        <h3>Telefon:</h3>
                        <p>004 0700 000 000</p>
                    </section>

                    <section>
                        <h3>E- mail:</h3>
                        <p>contact@condr.com</p>
                    </section>

                    <section>
                        <h3>Adresa:</h3>
                        <p>Iasi, Romania</p>
                    </section>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
