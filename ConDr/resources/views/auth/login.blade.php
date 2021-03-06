@extends ('layouts.master_login')

@section('content_login')

<div class="inner-bg">
<div class="container">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2 text">
            <h1><strong>ConDr</strong></h1>
            <div class="description">
                <p>
                    Dorești un sfat asupra cumpărării sau consumării unui produs alimentar? Bun venit pe <strong>ConDr</strong>! 
                </p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3 form-box">
            <div class="form-top">
                <div class="form-top-left">
                    <h3>Conectează-te</h3>
                    <p>Te rog, introdu adresa de e-mail si parola:</p>
                </div>
                <div class="form-top-right">
                    <i class="fa fa-lock"></i>
                </div>
            </div>
            <div class="form-bottom"> 
                <form role="form" method="POST" class="login-form" lang="ro" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label class="sr-only" for="email">E-mail</label>
                        
                        <input type="email" name="email" placeholder="E-mail..." class="form-control" id="email" lang="ro" value="{{ old('email') }}" required autofocus>
                        
                        @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>E-mail și/sau parolă greșită.</strong>
                                    </span>
                                @endif
                    </div>
                    <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                        <label class="sr-only" for="password">Parola</label>
                        
                        <input type="password" name="password" placeholder="Parola..." class="form-control" id="password" lang="ro" required>
                        
                        @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>E-mail și/sau parolă greșită.</strong>
                                    </span>
                                @endif
                    </div>
                    <p>
                    <button type="submit" class="btn">Conectare</button></p>
                </form>
            </div>
        </div>
    </div>
</div>
<div class = "under_form">
    <a href="/register" class="under_form">Înregistrează-te</a>  |
    <a href="passwords/reset_password" class="under_form">Ți-ai uitat parola?</a>
</div>
</div>
@endsection