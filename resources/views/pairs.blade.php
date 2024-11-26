@extends('layout')

@section('content')
    <h1>Employee pairs</h1>

    @if (count($rows) > 0)
        <table class="table table-bordered">
            <thead class="table-dark">
            <tr>
                <th>Employee ID #1</th>
                <th>Employee ID #2</th>
                <th>Project ID</th>
                <th>Days worked</th>
            </tr>
            </thead>
            <tbody>
            @foreach($rows as $row)
                <tr>
                    <td>{{ $row[0] }}</td>
                    <td>{{ $row[1] }}</td>
                    <td>{{ $row[2] }}</td>
                    <td>{{ $row[3] }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p>The list is empty</p>
    @endif

    <a href="{{ route('form') }}" class="btn btn-primary">Back</a>
@endsection





