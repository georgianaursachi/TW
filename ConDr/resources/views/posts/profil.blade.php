@extends ('layouts.master')

@section('navlist')
<li><a href="/">Acasă</a></li>
<li><a href="/produse">Produse</a></li>
<li ><a href="/euri">E-uri</a></li>
<li class="current"><a href="/profil">Profil</a><ul>
    <li><a href="/setari">Setări</a></li></ul></li>
<li><a href="/contact">Contact</a></li>
<li><a href="auth/logout">Deconectare</a></li>
@endsection

@section ('main')
<section class="profile">
<main>
    <div class="container icons">
        <img src="/uploads/avatars/{{ Auth::user()->avatar }}" class ="big-icon">

        <div class="rate">
        </div>

        <div class="add">
        </div>

    </div>
    <div class="details">
        <h3>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h3>
        <p>{{ Auth::user()->email }}</p>
    </div>
    <div class="container bio">
            <div class="title">
                <h6>Descriere</h6>
            </div>
            <div class="content">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro officiis fugit hic vel voluptates perferendis aut quibusdam sit omnis unde aspernatur quae repellat blanditiis autem, a libero asperiores neque illum aliquid est tempore. Eveniet velit voluptate amet facere, repellendus aperiam, cumque est ipsam. Asperiores expedita iusto, inventore sit suscipit nihil repudiandae? Laboriosam cum maxime dolorem neque, in veniam expedita ad. Hic fugit necessitatibus blanditiis, optio dignissimos molestiae nam, numquam odio.</p>
                <br></br>
            </div>
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
                       <td data-title="Denumire boală">Acnee</td>
                      <td data-title="Denumire alergie">Biscuiți</td>
                    </tr>
                  </tbody>
                </table>
              </div>
    <br></br><br></br>
    </div>
</main>
</section>
@endsection