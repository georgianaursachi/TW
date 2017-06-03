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
        <img src="/uploads/avatars/{{ Auth::user()->avatar }}" class ="icons big-icon">

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
        @if(Auth::user()->description != null)
            <div class="content">
                <p>{{ Auth::user()->description }}</p>
            </div>
        <br>
         @else
            <div class="content">
                <p>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }} nu și-a actualizat descrierea.</p>
            </div>
        <br>
         @endif
        
            @if (count($diseases) != 0)
            <div class="table-responsive-vertical shadow-z-1">
              <table id="table" class="table table-hover table-mc-light-blue">
                  <thead>
                    <tr>
                      <th><strong>Boală</strong></th>
                      <th><strong>Descriere boală</strong></th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($diseases as $d)
                    <tr>
                      <td >{{ $d->disease_name }}</td>
                      <td >{{ $d->description }}</td>
                    </tr>
                      @endforeach
                  </tbody> 
                </table>
            </div>
            <br>
            @endif
    
             @if (count($allergens) != 0)
            <div class="table-responsive-vertical shadow-z-1">
              <table id="table" class="table table-hover table-mc-light-blue">
                  <thead>
                    <tr>
                      <th><strong>Alergie</strong></th>
                    </tr>
                  </thead>
                  <tbody>
                        @foreach($allergens as $a)
                    <tr>
                      <td >{{ $a->name }}</td>
                    </tr>
                      @endforeach
                  </tbody> 
                </table>
            </div>
    <br></br><br></br>
    </div>
            @endif
</main>
</section>
@endsection