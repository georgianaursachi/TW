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
                <form role="form" action="" method="post" class="login-form" lang="ro">
                    <div class="form-group">
                        <label class="sr-only" for="form-username">E-mail</label>
                        <input type="email" name="form-username" placeholder="E-mail..." class="form-username form-control" id="form-username" lang="ro" required>
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="form-password">Parola</label>
                        <input type="password" name="form-password" placeholder="Parola..." class="form-password form-control" id="form-password" lang="ro">
                    </div>
                    <p>
                    <input type="checkbox"> Păstrează-mă conectat
                    </p><p>
                    <button type="submit" class="btn">Conectare</button></p>
                </form>
            </div>
        </div>
    </div>
</div>
<div class = "under_form">
    <a href="/inregistrare" class="under_form">Înregistrează-te</a>  |
    <a href="/schimbare_parola" class="under_form">Ți-ai uitat parola?</a>
</div>
</div>
@endsection