@extends('layouts.mtpro', (['title' => 'Home']))

@section('content')
<x-card-content title="Welcome Home">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <p>You are logged in!</p>
</x-card-content>
@endsection
