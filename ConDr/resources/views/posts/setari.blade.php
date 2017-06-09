@extends ('layouts.master')

@section('navlist')
<li><a href="/">Acasă</a></li>
<li><a href="/produse">Produse</a></li>
<li><a href="/euri">E-uri</a></li>
<li  class="current"><a href="/profil">Profil</a><ul>
    <li><a href="/setari">Setări</a></li></ul></li>
<li><a href="/contact">Contact</a></li>
<li><a href="auth/logout">Deconectare</a></li>
@endsection

@section ('main') 
<section class="wrapper style1">
<div class="container">
    <form enctype="multipart/form-data" action="/profil" method="POST">
        {{ csrf_field() }}
        <div class="card">
            <div class="image_card">
                    <img src="/uploads/avatars/{{ Auth::user()->avatar }}" class ="avatar-icon dimensiune">
                    <br>
                    <div class="container cont">
                    <h4>
                        <input type="file" name="avatar" id="avatar" class="inputfile">
                        <label for="avatar">Alege o fotografie</label>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </h4> 
                    </div>
            </div>
            <div class="info_card">
                    <h6 align="left">Descriere</h6>
                    <textarea name="description" placeholder="Adaugă o descriere" rows="5" ></textarea>
            </div>
        </div>
    <br>
    
    <p><strong>Actualizează-ți starea de sănătate:</strong></p>
        
    <div class="table-responsive-vertical shadow-z-1">
      <table id="table" class="table table-hover table-mc-light-blue">
          @if (count($users->first()->diseases) != 0)
          <thead>
            <tr style="position:relative;">
              <th><strong>Boală</strong></th>
              <th>
                  <div class="dropdown">
                      
                    <button class="button5 roz" name="add" align="right" disabled>
                      <i class="fa fa-plus" aria-hidden="true"></i>
                     </button>
                    
                    <select name="disease_name" size="3" class="dropdown-content">
                        @foreach($disease as $dis)
                            <option value="{{$dis->disease_name}}">{{str_limit($dis->disease_name, $limit = 40, $end = '...')}}</option>
                        @endforeach
                    </select>

                                
                  </div>
                </th>
            </tr>
          </thead>
          <tbody id = "diseases">
              @foreach($users->first()->diseases as $d)
            <tr>
              <td >{{ $d->disease_name }}</td>
              <td method="DELETE" >
                  <a class="button4 albastru" href="{{ route('/setari/boli/{name}', $d->disease_name) }}">Șterge</a>
              </td>
            </tr>
              @endforeach
          </tbody> 
          @else
          <thead>
            <tr>
              <th><strong>Boală</strong></th>
              <th ><div class="dropdown">
                      
                    <button class="button5 roz" name="add" align="right" disabled>
                      <i class="fa fa-plus" aria-hidden="true"></i>
                     </button>
                    
                    <select name="disease_name" size="3" class="dropdown-content">
                        @foreach($disease as $dis)
                            <option value="{{$dis->disease_name}}">{{str_limit($dis->disease_name, $limit = 40, $end = '...')}}</option>
                        @endforeach
                    </select>
                  </div>
                </th>
            </tr>
          </thead>
          @endif
        </table>
    </div>
        
    <div class="table-responsive-vertical shadow-z-1">
      <table id="table" class="table table-hover table-mc-light-blue">
          @if (count($users->first()->allergens) != 0)
          <thead>
            <tr style="position:relative;">
              <th><strong>Alergie</strong></th>
              <th >
                  <div class="dropdown">
                  <button class="button5 roz" name="add" align="right" disabled>
                      <i class="fa fa-plus" aria-hidden="true"></i>
                     </button>
                  <select name="allergen_name" size="3" class="dropdown-content">
                        @foreach($allergens as $a)
                            <option value="{{$a->name}}">{{str_limit($a->name, $limit = 40, $end = '...')}}</option>
                        @endforeach
                    </select>
                  </div>
                </th>
            </tr>
          </thead>
          <tbody id = 'allergens'>
              @foreach($users->first()->allergens as $a)
            <tr>
              <td >{{ $a->name }}</td>
              <td method="DELETE">
                  <a class="button4 albastru" href="{{ route('/setari/alergeni/{name}', $a->name) }}">Șterge</a>
              </td>
            </tr>
              @endforeach
          </tbody> 
          @else
          <thead>
            <tr>
              <th><strong>Alergie</strong></th>
                <th ><div class="dropdown">
                  <button class="button5 roz" name="add" align="right" disabled>
                      <i class="fa fa-plus" aria-hidden="true"></i>
                     </button>
                  <select name="allergen_name" size="3" class="dropdown-content">
                        @foreach($allergens as $a)
                            <option value="{{$a->name}}">{{str_limit($a->name, $limit = 40, $end = '...')}}</option>
                        @endforeach
                    </select>
                  </div>
                </th>
            </tr>
          </thead>
          @endif
        </table>
    </div>

    <p>
        <input type="checkbox" id="c1" name="c1" value="1"/>
        <label for="c1"><span></span>Trimite-mi rețeta personalizată prin e-mail.</label>
    </p>

    <div class="row">
        <div class="3u 12u(mobilep)">
                <button class="button2" onclick="window.location='{{ url('/profil') }}'">Salvează modificările </button>
        </div>
    </div>
    </form>
</div>
</section>
@endsection