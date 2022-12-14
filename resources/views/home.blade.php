@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">

                            @if(auth()->user()->type == 1)
                                <a href="{{url('admin/routes')}}">Admin</a>
                            @else
                                <div class=”panel-heading”>Normal User</div>
                            @endif


                        <!DOCTYPE html>
                        <head>
                            <meta charset="utf-8">
                            <meta http-equiv="X-UA-Compatible" content="IE=edge">
                            <meta name="viewport" content="width=device-width, initial-scale=1">
                            <title>Ticket System Utente</title>
                            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
                            <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
                            <!-- Bulma Version 0.9.0-->
                            <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.0/css/bulma.min.css" />
                            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
                        </head>
                        <div>
                        <div class="column is-12">
                            <nav class="breadcrumb" aria-label="breadcrumbs">
                                <ul>
                                    <li><a href="{{ route('user.profile') }}">Profilo</a></li>
                                    <li><a href="{{ route('change-password') }}">Modifica Password</a></li>
                                    <li><a href="{{ route('login-history') }}">Lista Accessi</a></li>
                                </ul>
                            </nav>
                            <section class="hero is-info welcome is-small">
                                <div class="hero-body">
                                    <div class="container">
                                        <h1 class="title">
                                            Hello, Utente.
                                        </h1>
                                        <h2 class="subtitle">
                                            I hope you are having a great day!
                                        </h2>
                                    </div>
                                </div>
                            </section>
                            <div class="mt-5">
                                <form method="GET" >
                                    @csrf
                                <main>
                                    <a class="button" href="{{ route('tickets.create')  }}">Apri ticket</a>
                                </main>
                                </form>
                            </div>
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

                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                         </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    @endsection

