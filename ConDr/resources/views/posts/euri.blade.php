@extends ('layouts.master')

@section('navlist')
<li><a href="/">Acasă</a></li>
<li><a href="/produse">Produse</a></li>
<li class="current"><a href="/euri">E-uri</a></li>
<li><a href="/profil">Profil</a><ul>
    <li><a href="/setari">Setări</a></li></ul></li>
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
                            <div class="6u 12u(mobilep)">
                                <form>
                                    <input type="text" placeholder="Cauta un e aici..." required>
                                    <button class="button" type="submit">Caută</button>
                                </form>
                            </div>

                        </div>

                        <p></p>
                        <div class="row 150%">
                            <section class="4u 12u(narrower)">
                                <div class="box highlight">
                                    <h3>Nivel de pericol</h3>
                                    <p class="icon major">1/2/3</p>
                                </div>
                            </section>

                            <section class="4u 12u(narrower)">
                                <div class="box highlight">
                                    <h3>Funcție tehnologică</h3>
                                    <p>nume</p>
                                </div>
                            </section>

                            <section class="4u 12u(narrower)">
                                <div class="box highlight">
                                    <h3>Denumire</h3>
                                    <p>nume</p>
                                </div>
                            </section>
                        </div>

                        <p></p>

                        <h3>Distributia E-urilor in produse</h3>


                        <div class="4u 12u(narrower)" id="graphE"></div>
                        <!--[if IE]><script src="resources/assets/js/excanvas.js"></script><![endif]-->
                        <script src="/js/html5-canvas-bar-graph.js"></script>
                        <script>
                            (function() {

                                function createCanvas(divName) {

                                    var div = document.getElementById(divName);
                                    var canvas = document.createElement('canvas');
                                    div.appendChild(canvas);
                                    if (typeof G_vmlCanvasManager != 'undefined') {
                                        canvas = G_vmlCanvasManager.initElement(canvas);
                                    }
                                    var ctx = canvas.getContext("2d");
                                    return ctx;
                                }



                                var ctx2 = createCanvas("graphE");

                                var graph2 = new BarGraph(ctx2);
                                graph2.margin = 2;
                                graph2.width = content.offsetWidth;
                                graph2.height = 150;
                                graph2.xAxisLabelArr = ["E100", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M"];
                                setInterval(function() {
                                    graph2.update([20, 10, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20]);
                                }, 1500);

                            }());

                        </script>


                    </article>



                </div>
            </div>
            <div class="4u 12u(narrower)">
                <div id="sidebar">

                    <!-- Sidebar -->

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