@extends ('layouts.master') 

@section('navlist')
<li><a href="/">Acasă</a></li>
<li><a href="/produse">Produse</a></li>
<li><a href="/euri">E-uri</a></li>
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


                        <!--<span class="image featured"><img src="images/banner.jpg" alt="" /></span>-->

                    </article>
                    <section class="10u 12u(narrower)">
                        <h3>Adaugă produs</h3>
                        <form method="POST" action="/adauga">
                            {{csrf_field()}} 
                            <div class="row ">
                                <div class="6u 12u(mobilep)">
                                    Nume Produs: <input type="text" name="name" id="name" placeholder="Nume" required/>
                                </div>
                                
                                <div class="6u 12u(mobilep)">
                                    
                                    Categorie Produs: 
                                    <input type="list" list="categories" name="categories">
                                      <datalist id="categories">
                                        <option value="Legume">
                                        <option value="Fructe">
                                        <option value="Lactate">
                                        <option value="Carne">
                                        <option value="Peste">
                                        <option value="Ou">
                                      </datalist>

                                </div>

                                <div class="6u 12u(mobilep)">
                                    Cod de bare: <input type="number" min=0 name="barCode" id="barCode" placeholder="Cod de bare" />
                                </div>

                                <div class="6u 12u(mobilep)">
                                    Sare: <input type="number" step=0.01 min=0 name="salt" id="salt" placeholder="Sare" />
                                </div>

                                <div class="6u 12u(mobilep)">
                                    Zahăr: <input type="number" step=0.01 min=0 name="sugar" id="sugar" placeholder="Zahăr" />
                                </div>

                                <div class="6u 12u(mobilep)">
                                    Grăsimi: <input type="number" step=0.01 min=0 name="fats" id="fats" placeholder="Grăsimi" />
                                </div>

                                <div class="6u 12u(mobilep)">
                                    Carbohidrați: <input type="number" step=0.01 min=0 name="carbs" id="carbs" placeholder="Carbohidrați" />
                                </div>

                                <div class="6u 12u(mobilep)">
                                    Fibre: <input type="number" step=0.01 min=0 name="fibers" id="fibers" placeholder="Fibre" />
                                </div>

                                <div class="6u 12u(mobilep)">
                                    Proteine: <input type="number" step=0.01 min=0 name="proteins" id="proteins" placeholder="Proteine" />
                                </div>

                                <div class="6u 12u(mobilep)">
                                    Calorii: <input type="number" step=0.01 min=0 name="calories" id="calories" placeholder="Calorii" />
                                </div>

                                <div class="6u 12u(mobilep)">
                                    Grăsimi saturate: <input type="number" step=0.01 min=0 name="saturates" id="saturates" placeholder="Grăsimi saturate" />
                                </div>

                            </div>

                             <div class="row 50%">
                                <div class="12u">
                                    <textarea name="desricption" id="description" placeholder="Descriere" rows="5" ></textarea>
                                </div>
                            </div>

                           <div class="row 50%">
                                <div class="12u">
                                    Alergeni:
                                    <ul id="allergens">
                                    <li><input type="checkbox" id="lapte" name="lapte" />
                                    <label for="lapte"><span></span>Lapte</label></li>
                                    <li><input type="checkbox" id="ou" name="ou" />
                                    <label for="ou"><span></span>Ou</label></li>
                                    <li><input type="checkbox" id="peste" name="peste" />
                                    <label for="peste"><span></span>Peste</label></li>
                                    <li><input type="checkbox" id="crustacee" name="crustacee" />
                                    <label for="crustacee"><span></span>Crustacee</label></li>
                                    <li><input type="checkbox" id="moluste" name="moluste" />
                                    <label for="moluste"><span></span>Moluște</label></li>
                                    <li><input type="checkbox" id="arahide" name="arahide" />
                                    <label for="arahide"><span></span>Arahide</label></li>
                                    <li><input type="checkbox" id="nuci" name="nuci" />
                                    <label for="nuci"><span></span>Nuci</label></li>
                                    <li><input type="checkbox" id="migdale" name="migdale" />
                                    <label for="migdale"><span></span>Migdale</label></li>
                                    <li><input type="checkbox" id="alune" name="alune" />
                                    <label for="alune"><span></span>Alune</label></li>
                                    <li><input type="checkbox" id="caju" name="caju" />
                                    <label for="caju"><span></span>Caju</label></li>
                                    <li><input type="checkbox" id="pecan" name="pecan" />
                                    <label for="pecan"><span></span>Pecan</label></li>
                                    <li><input type="checkbox" id="brazils" name="brazils" />
                                    <label for="brazils"><span></span>Brazils</label></li>
                                    <li><input type="checkbox" id="fistic" name="fistic" />
                                    <label for="fistic"><span></span>Fistic</label></li>
                                    <li><input type="checkbox" id="nuci_de_macadamia" name="nuci_de_macadamia" />
                                    <label for="nuci_de_macadamia"><span></span>Nuci de macadamia</label></li>
                                    <li><input type="checkbox" id="nuci_de_Q" name="nuci_de_Q" />
                                    <label for="nuci_de_Q"><span></span>Nuci de Queensland</label></li>
                                    <li><input type="checkbox" id="seminte_susan" name="seminte_susan" />
                                    <label for="seminte_susan"><span></span>Semințe de susan</label></li>
                                    <li><input type="checkbox" id="cereale" name="cereale" />
                                    <label for="cereale"><span></span>Cereale care conțin gluten</label></li>
                                    <li><input type="checkbox" id="soia" name="soia" />
                                    <label for="soia"><span></span>Soia</label></li>
                                    <li><input type="checkbox" id="telina" name="telina" />
                                    <label for="telina"><span></span>Țelină</label></li>
                                    <li><input type="checkbox" id="mustar" name="mustar" />
                                    <label for="mustar"><span></span>Muștar</label></li>
                                    <li><input type="checkbox" id="lupin" name="lupin" />
                                    <label for="lupin"><span></span>Lupin</label></li>
                                    <li><input type="checkbox" id="dioxid" name="dioxid" />
                                    <label for="dioxid"><span></span>Dioxid de sulf si sulfiți</label></li>
                                    </ul>
                                </div>
                            </div>



                            <div class="row 50%">
                                <div class="12u">
                                    <ul class="actions">
                                        <li><input type="submit" class="button alt" value="Salvează produs" /></li>
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
