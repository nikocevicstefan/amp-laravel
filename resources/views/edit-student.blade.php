@extends('layout')

@section('content')
    <form action="/amplitudo_laravel/amp-laravel/public/students/1" method="POST">
        @csrf
        @method('PATCH')
        <input type="text" placeholder="name" name="name" value="Stefan">
        <input type="text" placeholder="family name" name="family_name" value="Nikocevic">
        <label for="birthday">Birthday</label>
        <input type="date" name="birthday" id="birthday" value="06:09:1995">
        <button type="submit">Submit</button>
    </form>
@endsection

