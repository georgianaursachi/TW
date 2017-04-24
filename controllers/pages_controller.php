<?php
  class PagesController {
    public function home() {
      
      require_once('views/pages/home.html');
    }

    public function contact() {
      require_once('views/pages/contact.html');

    }
	
	public function e-uri() {
      require_once('views/pages/e-uri.html');

    }
	
	public function login() {
      require_once('views/pages/login.html');

    }
	
	public function passwd() {
      require_once('views/pages/passwd.html');

    }
	
	public function produse() {
      require_once('views/pages/produse.html');

    }
	
	public function profil() {
      require_once('views/pages/profil.html');

    }
	
	public function register() {
      require_once('views/pages/register.html');

    }
  }
?>