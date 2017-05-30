@extends ('layouts.master_login')

@section('content_login')

<div class="inner-bg">
<div class="container">
<div class="row">
    <div class="col-sm-8 col-sm-offset-2 text">
        <h1><strong>ConDr</strong> </h1>
        <div class="description">
            <p>
                Alătură-te comunității <strong>ConDr</strong>!  
            </p>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6 col-sm-offset-3 form-box">
        <div class="form-top">
            <div class="form-top-left">
                <h3>Înregistrează-te</h3>
                <p>Te rog, completează formularul de mai jos:</p>
            </div>
            <div class="form-top-right">
                <i class="fa fa-lock"></i>
            </div>
        </div>
        <div class="form-bottom">
            <form role="form" action="" method="POST" action="{{ route('register') }}" class="login-form" lang="ro">
                {{ csrf_field() }}
                
                <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                    <label class="sr-only" for="last_name">Nume</label>
                    <input type="text" name="last_name" placeholder="Nume" class="form-control" id="last_name" value="{{ old('last_name') }}" required autofocus>
                </div>
                
                <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                    <label class="sr-only" for="first_name">Prenume</label>
                    <input type="text" name="first_name" placeholder="Prenume" class="form-control" id="first_name" value="{{ old('first_name') }}" required autofocus>
                </div>
                    
                
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label class="sr-only" for="form-password">E-mail</label>
                    <input type="email" name="email" placeholder="E-mail" class="form-password form-control" id="email" value="{{ old('email') }}" required>
                </div>
                
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label class="sr-only" for="form-password">Parola</label>
                    <input type="password" name="password" placeholder="Parola" class="form-password form-control" id="password" required>
                </div>
                
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label class="sr-only" for="form-password">Confirmare parolă</label>
                    <input type="password" name="password_confirmation" placeholder="Confirmare parolă" class="form-password form-control" id="password-confirm" required>
                </div>
                <button type="submit" class="btn">Înregistrare</button>
            </form>
        </div>
    </div>
</div>
</div>
<div class = "under_form"> 
<a href="/login" class="under_form">Întoarce-te la pagina principală</a>
</div>
</div>
@endsection