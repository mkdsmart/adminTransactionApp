@extends('layouts.design')
@section('content')
<style>
    .filter-section {
        position: relative;
        margin-left: 10px;
        width: 300px;
        top: 0px;
        right: 20px;
        background-color: #f0f0f0;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        display: flex;
    }

    .filter-section h2 {

        margin-bottom: 10px;
        font-size: 1.2em;
    }

    .filter-options label {
        display: block;
        margin-bottom: 5px;
    }

    .filter-options select {

        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 3px;
        margin-bottom: 10px;
    }


    .table-container {
        position: relative;
        margin: 20px;
        padding-bottom: 100px;
        overflow-x: auto;
        overflow-y: scroll;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        border: 1px solid #dddddd;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }
    .modify{
        display: flex;
    }
</style>


    <div class="table-container">
        <section class="filter-section">
            <h1>Client Information</h1>
        </section>
        <table>
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>date_of_birth</th>
                    <th>email</th>
                    <th>Modify</th>
                </tr>
            </thead>
            <tbody>
                <!-- Table rows will be inserted here dynamically -->
                @foreach ($clients as $client)

                    <tr>
                        <td>{{ $client->first_name }}</td>
                        <td>{{ $client->last_name }}</td>

                        <td>{{ $client->date_of_birth }}</td>
                        <td>{{ $client->email }}</td>
                        <td><button><a href="#">Edit</a></button></td>

                    </tr>


                @endforeach

            </tbody>
        </table>
        {{ $clients->links() }}
    </div>

@endsection
