@extends ('layouts.master')

@section('navlist')
<li><a href="/">Acasă</a></li>
<li class="current"><a href="/produse">Produse</a></li>
<li><a href="/euri">E-uri</a></li>
<li><a href="/profil">Profil</a>
    <ul>
        <li><a href="/setari">Setări</a></li>
    </ul>
</li>
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
                        <header>
                            <h2>Cauta informatii despre un anumit produs alimentar</h2>
                        </header>
                        <p></p>
                        <div class="row 50%">
                            <div class="7u 12u(mobilep)">
                                <form action="/produse/{name}" method="GET">
                                    <input type="text" name="produs" placeholder="Introdu codul de bare/denumirea produsului..." required>
                            </div>
                            <div class="2u 12u(mobilep)">
                                <button class="button3" type="submit">Caută</button>
                                </form>
                            </div>
                        </div>

                        <br> @php $uAllergens =array(); @endphp
                        @foreach($userAllergens as $userA) 
                            @php $uAllergens[]= $userA->name; @endphp 
                        @endforeach 
                        @forelse($products as $p) 
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
                                                @php switch( $e->danger_level ) 
                                                    { case '0':@endphp <img class="image error-triangle" src="/images/error-triangle(0).png">{{$e->id}} @php break; 
                                                    case '1':@endphp <img class="image error-triangle" src="/images/error-triangle (1).png">{{$e->id}} @php break; 
                                                    case '2':@endphp <img class="image error-triangle" src="/images/error-triangle (2).png">{{$e->id}} @php break; } 
                                                @endphp 
                                            @else @php switch( $e->danger_level ) 
                                                { case '0':@endphp <img class="image error-triangle" src="/images/error-triangle(0).png">{{$e->id}}, @php break; 
                                                case '1':@endphp <img class="image error-triangle" src="/images/error-triangle (1).png">{{$e->id}}, @php break; 
                                                case '2':@endphp <img class="image error-triangle" src="/images/error-triangle (1).png">{{$e->id}}, @php break; } @endphp 
                                            @endif 
                                        @endforeach

                                    </p>
                                </div>
                            </section>

                            <section class="4u 12u(narrower)">
                                <div class="box highlight">
                                    <h3>Sfat personalizat</h3>
                                    <p>{{$adviceMessage}}</p>
                                </div>
                            </section>

                            <section class="4u 12u(narrower)">
                                <div class="box highlight">
                                    <h3>Alergeni</h3>
                                    <p>
                                        @forelse($p->allergens as $a ) 
                                            @if ($p->allergens->last() === $a) 
                                                @if(in_array($a->name, $uAllergens))
                                                    <font color="red">{{$a->name}}</font>
                                                @else {{$a->name}} 
                                                @endif 
                                            @else @if(in_array($a->name, $uAllergens))
                                                <font color="red">{{$a->name}}</font>, 
                                                @else {{$a->name}} 
                                                @endif 
                                            @endif 
                                        @empty Produsul nu conține alergeni! 
                                        @endforelse
                                    </p>
                                </div>
                            </section>
                        </div>
                        <div class="table-responsive-vertical shadow-z-1">
                            <table id="table" class="table table-hover table-mc-light-blue">
                                <thead>
                                    <tr>
                                        <th><strong>Valori nutriționale</strong></th>
                                        <th><strong>În 100g</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($p->salt != null)
                                    <tr>
                                        <td>Sare</td>
                                        <td>{{$p->salt}}</td>
                                    </tr>
                                    @endif
                                    @if($p->sugar != null)
                                    <tr>
                                        <td>Zahăr</td>
                                        <td>{{$p->sugar}}</td>
                                    </tr>
                                    @endif
                                    @if($p->fats != null)
                                    <tr>
                                        <td>Grăsimi</td>
                                        <td>{{$p->fats}}</td>
                                    </tr>
                                    @endif
                                    @if($p->carbohydrate != null)
                                    <tr>
                                        <td>Carbohidrați</td>
                                        <td>{{$p->carbohydrate}}</td>
                                    </tr>
                                    @endif
                                    @if($p->fibre != null)
                                    <tr>
                                        <td>Fibre</td>
                                        <td>{{$p->fibre}}</td>
                                    </tr>
                                    @endif
                                    @if($p->protein != null)
                                    <tr>
                                        <td>Proteine</td>
                                        <td>{{$p->protein}}</td>
                                    </tr>
                                    @endif
                                    @if($p->calories != null)
                                    <tr>
                                        <td>Calorii</td>
                                        <td>{{$p->calories}}</td>
                                    </tr>
                                    @endif
                                    @if($p->saturates != null)
                                    <tr>
                                        <td>Grăsimi saturate</td>
                                        <td>{{$p->saturates}}</td>
                                    </tr>
                                    @endif

                                </tbody>
                            </table>
                        </div>

                        @endif 
                        @empty
                        <p>Ne poți ajuta adăugând produsul <a href="/adauga">aici</a></p>
                        @endforelse
                        <br> 
                        @foreach($products as $p) 
                            @if ( $products->first() === $p) 
                                @if(count($products) ==1 ) @break; 
                                @else
                                    <h3>Alte produse</h3>
                            @endif 
                            @else <li><a href="/produse/%7Bname%7D?produs=@php echo str_replace(' ', '+', $p->product_name);@endphp">{{$p->product_name}}</a></li>
                            @endif 
                        @endforeach
                        <br>
                        @if(count($products)>0)
                        <h3>Comentarii</h3>

                        @foreach($products as $p) 
                            @if($products->first() === $p ) 
                            @foreach($p->comments as $comment)
                        <article>
                            <img src="/uploads/avatars/{{ $comment->user->avatar }}" class="image">
                            <p>{{$comment->user->first_name}} {{$comment->user->last_name}}</p>
                            <p>{{$comment->message}}</p>
                        </article>
                        @endforeach @endif @endforeach

                        <div class="row 50%">
                            <div class="8u">
                                <textarea name="comentariu" id="comentariu" placeholder="Lasa un comentariu..." rows="5" required></textarea>
                            </div>
                        </div>
                        @endif

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
                    
                    <section >
                        <h3>Produs recomandat</h3>
                        @if($productRecomandation->first()->category == null)
                            <img src="/images/groceries.png" class="image">
                        @else <img src="/images/{{$productRecomandation->first()->category}}.png" class="image">
                        @endif
                        <br>
                        <p ><a href="/produse/%7Bname%7D?produs=@php echo str_replace(' ', '+', $productRecomandation->first()->product_name);@endphp" >{{$productRecomandation->first()->product_name}}</a></p>
                    </section>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
