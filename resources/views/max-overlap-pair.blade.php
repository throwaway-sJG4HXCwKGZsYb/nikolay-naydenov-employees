@extends('layout')

@section('content')

    <h1>Max overlapping pair</h1>

    <table class="table table-bordered">
        <thead class="table-dark">
        <tr>
            <th>Employee ID #1</th>
            <th>Employee ID #2</th>
            <th>Days worked</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{ $pair[0] }}</td>
            <td>{{ $pair[1] }}</td>
            <td>{{ $pair[2] }}</td>
        </tr>
        </tbody>
    </table>


    <a href="{{ route('form') }}" class="btn btn-primary">Back</a>
@endsection





