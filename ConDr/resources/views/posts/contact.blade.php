@extends ('layouts.master')

@section('navlist')
<li><a href="/">Acasă</a></li>
<li><a href="/produse">Produse</a></li>
<li><a href="/euri">E-uri</a></li>
<li><a href="/profil">Profil</a></li>
<li class="current"><a href="/contact">Contact</a></li>
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
                            <h2>Contactează-ne</h2>
                            <p>Pentru bug-uri, adăugare de produse sau orice alta sugestie ne poți contacta. </p>
                        </header>

                        <!--<span class="image featured"><img src="images/banner.jpg" alt="" /></span>-->

                    </article>
                    @if(Session::has('message'))
                        <div class="alert alert-info">
                          {{Session::get('message')}}
                        </div>
                    @endif
                    
                    <section class="8u 12u(narrower)">
                        <h3>Contact</h3>
                        {!! Form::open(array('route' => 'contact_form', 'class' => 'form')) !!}
                            
                            <div class="row 50%">
                                
                                <div class="6u 12u(mobilep) form-group">
                                    
                                     {!! Form::email('email', null, 
                                            array('required', 'class'=>'form-control', 
                                                'placeholder'=>'Email')) !!}
                                </div> 
                                <div class="6u 12u(mobilep) form-group">
                    
                                    {!! Form::text('subject', null, 
                                            array('required', 'class'=>'form-control', 
                                                'placeholder'=>'Subiect')) !!}
                                </div>
                            </div>
                            <div class="row 50%">
                                <div class="12u form-group">
                                    {!! Form::textarea('message', null, 
                                            array('required', 
                                            'class'=>'form-control', 
                                                'placeholder'=>'Mesaj')) !!}
                                </div>
                            </div>
                            <div class="row 50%">
                                <div class="12u">
                                    
                                    {!! Form::submit('Trimite e-mail', 
                                        array('class'=>'btn btn-success button alt form-control')) !!}
                                </div>
                            </div>
                        {!! Form::close() !!}
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
                        <h3>E-mail:</h3>
                        <p>contact@condr.com</p>
                    </section>

                    <section>
                        <h3>Adresă:</h3>
                        <p>Iași, România</p>
                    </section>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
