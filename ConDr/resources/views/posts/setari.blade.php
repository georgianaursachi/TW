@extends ('layouts.master')

@section('navlist')
<li><a href="/">Acasă</a></li>
<li><a href="/produse">Produse</a></li>
<li><a href="/euri">E-uri</a></li>
<li  class="current"><a href="/profil">Profil</a><ul>
    <li><a href="/setari">Setări</a></li></ul></li>
<li><a href="/contact">Contact</a></li>
<li><a href="/login">Deconectare</a></li>
@endsection

@section ('main') 
    <section class="wrapper style1">
    <div class="container">
         <div class="row ">
             
            <div class="2u 12u(mobilep)" >
                <strong>Nume:</strong>
            </div>

             <div class="10u 12u(mobilep)">
             <input type="text" name="name" id="name" placeholder="DiCaprio" required/>
             </div>
             
             <div class="2u 12u(mobilep)" >
                <strong>Prenume:</strong>
            </div>

             <div class="10u 12u(mobilep)">
             <input type="text" name="first_name" id="f_name" placeholder="Leonardo" required/>
             </div>
             
             <div class="2u 12u(mobilep)" >
                <strong>Parola:</strong>
            </div>

             <div class="10u 12u(mobilep)">
             <input type="password" name="pass" id="pass" placeholder="*******" required/>
             </div>

        </div>
        <br></br>
        <div class="table-responsive-vertical shadow-z-1">
              <table id="table" class="table table-hover table-mc-light-blue">
                  <thead>
                    <tr>
                      <th>Denumire boală</th>
                      <th>Denumire alergie</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td data-title="Denumire boală">Cancer</td>
                      <td data-title="Denumire alergie"></td>
                    </tr>
                    <tr>
                       <td data-title="Denumire boală">Diabet</td>
                      <td data-title="Denumire alergie">Alergie la căpșuni</td>
                    </tr>
                    <tr>
                       <td data-title="Denumire boală"  contenteditable>Acnee</td>
                      <td data-title="Denumire alergie">Biscuiți</td>
                    </tr>
                  </tbody>
                </table>
              </div>
        
        <div class="10u 12u(mobilep)">
            <input type="checkbox" id="c1" name="c1" />
            <label for="c1"><span></span>Doresc să primesc rețete prin e-mail.</label>
             </div>
             
        <br></br>
    <div class="row">
            <div class="3u 12u(mobilep)">
                <button class="button2">Renuntă la modificări</button>
            </div>
        <div class="3u 12u(mobilep)">
                
            </div>
        <div class="3u 12u(mobilep)">
                
        </div>
        <div class="3u 12u(mobilep)">
                <button class="button2">Salvează modificările </button>
        </div>
    </div>
    </div>
    </div>
    </section>
@endsection