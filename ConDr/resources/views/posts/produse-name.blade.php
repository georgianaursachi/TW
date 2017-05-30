@extends ('layouts.master')

@section('navlist')
<li><a href="/">Acasă</a></li>
<li class="current"><a href="/produse">Produse</a></li>
<li ><a href="/euri">E-uri</a></li>
<li><a href="/profil">Profil</a><ul>
    <li><a href="/setari">Setări</a></li></ul></li>
<li><a href="/contact">Contact</a></li>
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
                            <h2>Cauta informatii despre un anumit produs alimentar</h2>
                        </header>
                        <p></p>
                        <div class="row 50%">
                            <div class="7u 12u(mobilep)">
                                <form action="/produse/{name}" method="GET" >
                                <input type="text" name="produs" placeholder="Introdu codul de bare/denumirea produsului..." required>
                            </div>
                            <div class="2u 12u(mobilep)">
                                    <button class="button3" type="submit">Caută</button>
                                </form>                                
                            </div>
                        </div>
                        
                        <br>
                        
                        @foreach($products as $p)
                        @if ($products->first() === $p)
                        <h3>{{$p->product_name}}</h3>
                        <div class="row 150%">                            
                            <section class="4u 12u(narrower)">
                                <div class="box highlight">
                                    <h3>Număr de e-uri</h3>
                                    <p class="icon major">{{$p->enumbers->count()}}</p>
                                <p>
                                
                                @foreach($p->enumbers as $e )
                                    
                                    @if ($p->enumbers->last() === $e)
                                        @php
                                        switch( $e->danger_level ) {
                                            case '0':@endphp <img src="/images/error-triangle(0).png"> {{$e->id}} @php break;
                                            case '1':@endphp  <img src="/images/error-triangle (1).png"> {{$e->id}} @php break;
                                            case '2':@endphp <img src="/images/error-triangle (2).png"> {{$e->id}} @php break;
                                        }
                                        @endphp 
                                    @else
                                        @php
                                        switch( $e->danger_level ) {
                                            case '0':@endphp <img src="/images/error-triangle(0).png"> {{$e->id}},  @php break;
                                            case '1':@endphp  <img src="/images/error-triangle (1).png"> {{$e->id}},  @php break;
                                            case '2':@endphp <img src="/images/error-triangle (2).png"> {{$e->id}},  @php break;

                                        }
                                        @endphp
                                    @endif
                                  
                                 @endforeach
                                    
                                    </p>
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
                                    <h3>Alergeni</h3>
                                    <p>
                                    @forelse($p->allergens as $a )
                                        @if ($p->allergens->last() === $a)
                                            {{$a->name}}
                                        @else
                                            {{$a->name}},
                                        @endif
                                        
                                    @empty
                                        Produsul nu conține alergeni dăunători pentru dumneavoastră!
                                    @endforelse
                                    </p>
                                </div>
                            </section>
                        </div>
                        <ul>
                            
                            <h3>Alte produse</h3>
                           
                        @else
                            <li><a href="/produse/%7Bname%7D?produs=@php echo str_replace(' ', '+', $p->product_name);@endphp">{{$p->product_name}}</a></li>
                       
                        @endif
                        </ul>
                        @endforeach
                        <br>
                        
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
                    
                    @include('layouts.euri_nvl_pericol')



                </div>
            </div>
        </div>
    </div>
</section>
@endsection
