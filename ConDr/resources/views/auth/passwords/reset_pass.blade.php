@extends ('layouts.master_login')

@section('content_login')

<div class="inner-bg">
<div class="container">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2 text">
            <h1><strong>ConDr</strong> </h1>
            <div class="description">
                <p>
                    Dorești un sfat asupra cumpărării sau consumării unui produs alimentar? Bun venit pe <strong>ConDr</strong>! 
                </p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3 form-box">
            <div class="form-bottom">
                <form role="form" action="{{ route('password.request') }}" method="post" class="login-form" lang="ro">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="sr-only" for="form-password">E-mail</label>
                        <input type="email" name="email" placeholder="E-mail" class="form-password form-control" id="form-password" required>
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="form-password">Parola</label>
                        <input type="password" name="password" placeholder="Parolă" class="form-password form-control" id="form-password" required>
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="form-password">Confirmare parola</label>
                        <input type="password" name="password-confirmation" placeholder="Confirmare parolă" class="form-password form-control" id="form-password" required>
                    </div>
                    
                    <button type="submit" class="btn">Schimbă parola</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection