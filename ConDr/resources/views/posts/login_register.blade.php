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
            <form role="form" action="" method="post" class="login-form" lang="ro">
                <div class="form-group">
                    <label class="sr-only" for="form-username">Nume</label>
                    <input type="text" name="nume" placeholder="Nume" class="form-username form-control" id="form-username" required>
                </div>
                <div class="form-group">
                    <label class="sr-only" for="form-password">Prenume</label>
                    <input type="text" name="prenume" placeholder="Prenume" class="form-password form-control" id="form-password" required>
                </div>
                <div class="form-group">
                    <label class="sr-only" for="form-password">E-mail</label>
                    <input type="email" name="email" placeholder="E-mail" class="form-password form-control" id="form-password">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="form-password">Parola</label>
                    <input type="password" name="pass" placeholder="Parola" class="form-password form-control" id="form-password">
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