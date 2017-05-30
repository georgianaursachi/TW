@extends ('layouts.master')

@section('navlist')
<li><a href="/">Acasă</a></li>
<li><a href="/produse">Produse</a></li>
<li class="current"><a href="/euri">E-uri</a></li>
<li><a href="/profil">Profil</a>
    <ul>
        <li><a href="/setari">Setări</a></li>
    </ul>
</li>
<li><a href="/contact">Contact</a></li>
<li><a href="/login">Deconectare</a></li>
@endsection

@section('main')
<section class="wrapper style1">
    <div class="container">
        <div class="row 200%">
            <div class="8u 12u(narrower)">
                <div id="content">

                    <!-- Content -->

                    <article>
                        <header>
                            <h2>Cauta informatii despre un anumit aditiv alimentar</h2>
                            <p>Poti cauta dupa cod(exemplu: E100), sau denumire(exemplu: Curcumina).</p>
                        </header>
                        <p></p>
                       <div class="row 50%">
                            <div class="7u 12u(mobilep)">
                                <form action="/euri/{name}" method="GET" >
                                <input type="text" name="euri" placeholder="Caută un E aici..." required >
                            </div>
                            <div class="2u 12u(mobilep)">
                                    <button class="button3" type="submit">Caută</button>
                                </form>
                                
                            </div>

                        </div>

                        <p></p>


                        @forelse($enumber as $e )
                        
                        <div class="row 150%">
                            <section class="4u 12u(narrower)">
                                <div class="box highlight">
                                    <h3>Nivel de pericol</h3>
                                    @php
                                    switch( $e->danger_level ) {
                                        case '0':@endphp <img src="/images/number-zero-in-a-circle.png"> @php break;
                                        case '1':@endphp <img src="/images/number-one-in-a-circle.png"> @php break;
                                        case '2':@endphp <img src="/images/number-two-in-a-circle.png"> @php break;
                                        
                                    }
                                    @endphp
                                    
                                </div>
                            </section>

                            <section class="4u 12u(narrower)">
                                <div class="box highlight">
                                    <h3>Funcție tehnologică</h3>
                                    <p><span>{{$e->technological_function}}</span></p>
                                </div>
                            </section>

                            <section class="4u 12u(narrower)">
                                <div class="box highlight">
                                    <h3>Denumire</h3>
                                    <p><span>{{$e->name}}</span> sau <span>{{$e->id}}</span></p>
                                </div>
                            </section>
                        </div>
                        
                        @empty 
                            <p> Acest E nu există!!</p>
                        @endforelse


                        



                        <!-- Chart -->
                        <p></p>
                        {!! $chart->render() !!}


                    </article>



                </div>
            </div>
            <div class="4u 12u(narrower)">
                <div id="sidebar">

                    <!-- Sidebar -->
                    
                    @include('layouts.euri_nvl_pericol')

                    <section>
                        <h3>Ce sunt e-urile?</h3>
                        <p>Aditivii alimentari (cunoscuți în limbaj uzual și ca E-uri) reprezintă orice naturală sau chimică care nu este consumată ca aliment în sine și nu este folosită ca ingredient constituent al unui aliment, care are sau nu valoare nutritivă și care se adaugă intenționat, cu un scop tehnologic (incluzând modificări organoleptice) în timpul producerii, procesării, preparării, tratării, împachetării, ambalării, transportului, stocării, sau în timpul altei modificări aplicate unui aliment, devenind un component sau afectând într-un fel sau altul caracteristicile alimentelor.</p>
                        <footer>
                            <a target="_blank" href="http://www.csid.ro/health/sanatate/totul-despre-e-uri-2780289/" class="button">Continuă să citești</a>
                        </footer>
                    </section>


                </div>
            </div>
        </div>
    </div>
</section>
@endsection
