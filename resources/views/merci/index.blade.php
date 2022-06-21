<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/merci.css') }}">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Paiement succès
        </h2>
    </x-slot>
    <div class=content>
        <div class="wrapper-1">
        <div class="wrapper-2">
            <h1>{{ auth()->user()->name }} !</h1>
            <p>Merci pour votre commande.  </p>
            <br><br>
            <a class="go-home" href="/products">
            Retour Accueil
            </a>
        </div>
        <div class="footer-like">
            <p>Paiement avec
            <a href="#">success</a>
            </p>
        </div>
    </div>
  </div>

  <link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Source+Sans+Pro" rel="stylesheet">

</x-app-layout>
