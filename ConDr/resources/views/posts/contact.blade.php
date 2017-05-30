@extends ('layouts.master')

@section('navlist')
<li><a href="/">Acasă</a></li>
<li><a href="/produse">Produse</a></li>
<li><a href="/euri">E-uri</a></li>
<li><a href="/profil">Profil</a></li>
<li class="current"><a href="/contact">Contact</a></li>
<li><a href="/login">Deconectare</a></li>
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
                            <h2>Contactează-ne</h2>
                            <p>Pentru bug-uri, adăugare de produse sau orice alta sugestie ne poți contacta. </p>
                        </header>

                        <!--<span class="image featured"><img src="images/banner.jpg" alt="" /></span>-->

                    </article>
                    <section class="6u 12u(narrower)">
                        <h3>Contact</h3>
                        <form>
                            <div class="row 50%">
                                <div class="6u 12u(mobilep)">
                                    <input type="text" name="name" id="name" placeholder="Nume" required/>
                                </div>
                                <div class="6u 12u(mobilep)">
                                    <input type="email" name="email" id="email" placeholder="Email" required/>
                                </div>
                            </div>
                            <div class="row 50%">
                                <div class="12u">
                                    <textarea name="message" id="message" placeholder="Mesaj" rows="5" required></textarea>
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
                        <h3>E-mail:</h3>
                        <p>contact@condr.com</p>
                    </section>

                    <section>
                        <h3>Adresă:</h3>
                        <p>Iași, România</p>
                    </section>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
