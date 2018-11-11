@extends('shared/layout')

@section('content')

<h2>Index</h2>


<table class="table">
    <thead>
        <tr>
            <th>
               UserID
            </th>
            <th>
                Name
            </th>
            <th>
                Phone
            </th>
            <th>
                Address
            </th>
            <th>
                Email
            </th>

            <th>
                Email_verified_at
            </th>

            <th>
                Status
            </th>
        </tr>
    </thead>
    <tbody>
            <tr>
                <td>
                    {{$user->id}}
                </td>
                <td>
                    {{$user->name}}
                </td>
                <td>
                    {{$user->phone}}
                </td>
                <td>
                    {{$user->address}}
                </td>
                <td>
                    {{$user->email}}
                </td>
                <td>
                    {{$user->created_at}}
                </td>
                <td>
                    {{$user->enabled}}
                </td>
            </tr>
    </tbody>
</table>

@endsection