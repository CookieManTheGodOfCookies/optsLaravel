@extends('partials.navbar')

@section('navbar_crap')
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="/students">Students</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/companies">Companies</a>
        </li>
    </ul>
    <ul class="ml-auto navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="/login">Log out</a>
        </li>
    </ul>
@endsection