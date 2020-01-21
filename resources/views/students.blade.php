@extends('layout')

@section('content')
<ul>
    @foreach($students as $student)
        <li>{{$student}}
            <form action="students/1" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit"> delete </button>
            </form> </li>
    @endforeach
</ul>
@endsection

