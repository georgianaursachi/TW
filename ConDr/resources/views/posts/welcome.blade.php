@extends ('layouts.master')

@section('navlist')
<li><a href="/">Acasă</a></li>
<li class="current"><a href="/produse">Produse</a></li>
<li><a href="/euri">E-uri</a></li>
<li><a href="/profil">Profil</a></li>
<li><a href="/contact">Contact</a></li>
@endsection 

@section('main')
    @foreach($enr as $e )
        <span>{{$e->name}}</span> 
    @endforeach
@endsection