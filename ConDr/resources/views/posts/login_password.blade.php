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
                <form role="form" action="" method="post" class="login-form" lang="ro">
                    <div class="form-group">
                        <label class="sr-only" for="form-password">E-mail</label>
                        <input type="email" name="email" placeholder="E-mail" class="form-password form-control" id="form-password">
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="form-username">Parolă curentă</label>
                        <input type="password" name="form-password" placeholder="Parolă curentă" class="form-password form-control" id="form-password" lang="ro">
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="form-username">Parolă nouă</label>
                        <input type="password" name="form-password" placeholder="Parolă nouă" class="form-password form-control" id="form-password" lang="ro">
                    </div>
                    <button type="submit" class="btn">Schimbă parola</button>
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