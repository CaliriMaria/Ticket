@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Free Bulma template</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <!-- Bulma Version 0.9.0-->
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.0/css/bulma.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Admin-dashboard </title>
</head>

<body>

<!-- START NAV -->
<nav class="navbar is-white">
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item brand-text" href="../index.html">
                Bulma Admin
            </a>
            <div class="navbar-burger burger" data-target="navMenu">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <div id="navMenu" class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item" href="admin.html">
                    Home
                </a>
                <a class="navbar-item" href="admin.html">
                    Orders
                </a>
                <a class="navbar-item" href="admin.html">
                    Payments
                </a>
                <a class="navbar-item" href="admin.html">
                    Exceptions
                </a>
                <a class="navbar-item" href="admin.html">
                    Reports
                </a>
            </div>

        </div>
    </div>
</nav>
<!-- END NAV -->
<div class="container">
    <div class="columns">
        <div class="column is-3 ">
            <aside class="menu is-hidden-mobile">
                <p class="menu-label">
                   GENERALE
                </p>
                <ul class="menu-list">
                    <li><a class="is-active">Dashboard</a></li>
                    <li><a href="{{ route('admin.utente.index') }}">Tutti gli Utenti</a></li>
                    <li><a href="{{ route('categories.index') }}">Categorie</a></li>
                </ul>
                <p class="menu-label">
                  AMMINISTRAZIONE
                </p>
                <ul class="menu-list">
                    <li><a>Team Settings</a></li>
                    <li>
                       GESTIONE OPERATORI
                        <ul>
                            <li><a href="{{ route('admin.operatore.index') }}">Tutti gli Operatori</a></li>
                            <li><a href="{{ route('admin.operatore.create') }}">Aggiungi Operatore</a></li>
                        </ul>
                    </li>

                </ul>
            </aside>
        </div>
        <div class="column is-9">
            <section class="hero is-info welcome is-small">
                <div class="hero-body">
                    <div class="container">
                        <h1 class="title">
                            Hello, Admin.
                        </h1>
                        <h2 class="subtitle">
                            I hope you are having a great day!
                        </h2>
                    </div>
                </div>
            </section>

            <div class="columns">
                <div class="column is-12">
                    <div class="card events-card">
                        <header class="card-header">
                            <p class="card-header-title">
                                Tickets
                            </p>

                        </header>
                        <div class="card-table">
                            <div class="content">
                                <table class="table is-fullwidth is-striped">
                                    <thead>
                                    <tr class="info">
                                        <th >Id</th>
                                        <th >Titolo</th>
                                        <th >Data di apertura</th>
                                        <th >Categoria</th>
                                        <th >Stato</th>
                                        <th >Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($tickets as $ticket)
                                    <tr>
                                        <td>{{ $ticket->id }}</td>
                                        <td>{{ $ticket->title }}</td>
                                        <td>{{ $ticket->registered_at }}</td>
                                        <td>{{ $ticket->category->name }}</td>
                                        <td>
                                            @if( $ticket->status =='in attesa')
                                                <a class=" has-text-danger" href="">In Attesa</a>
                                            @elseif($ticket->status == 'in lavorazione')
                                                <a class=" has-text-warning" href=""> In Lavorazione</a>
                                            @elseif($ticket->status == 'completato')
                                                <a class=" has-text-success" href=""> Ticket chiuso</a>
                                            @endif
                                        </td>
                                        <td class="btn-container">
                                            <form action="{{ route('tickets.destroy',$ticket->id) }}" method="post">
                                                <a href=" {{route('tickets.show',$ticket->id)  }}" class="btn btn-search d-flex "> <i class="fa-solid fa-magnifying-glass"></i></a>
                                                <a href="{{route('tickets.edit',$ticket->id)  }}" class="btn btn-mod d-flex"><i class="fa-solid fa-pencil"></i></a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <footer class="card-footer">
                            <a href="#" class="card-footer-item">View All</a>
                        </footer>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
<script async type="text/javascript" src="../js/bulma.js"></script>
</body>

</html>
@endsection
