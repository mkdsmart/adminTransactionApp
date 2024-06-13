@extends('layouts.design')
@section('content')
<style>
    .filter-section {
        position: relative;
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
</style>


    <div class="table-container">
        <section class="filter-section">
            <h2>sort by</h2>
            <div class="filter-options">
                <label for="filter1">Filter 1:</label>
                <select id="filter1">
                    <option value="option1">Option 1</option>
                    <option value="option2">Option 2</option>
                    <option value="option3">Option 3</option>
                </select>

                <label for="filter2">Filter 2:</label>
                <select id="filter2">
                    <option value="option1">Option 1</option>
                    <option value="option2">Option 2</option>
                    <option value="option3">Option 3</option>
                </select>

                <!-- Add more filter dropdowns as needed -->
            </div>
        </section>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Sender Name</th>
                    <th>Status</th>
                    <th>Amount (CAD)</th>
                    <th>Amount (FCFA)</th>
                    <th>Recipient Name</th>
                    <th>Account Number</th>
                    <th>Withdrawal Method</th>
                    <th>Detail</th>
                    <th>Transaction ID</th>
                    <th>Sender ID</th>
                    <th>Sender Email</th>
                    <th>Receiver Phone Number</th>
                </tr>
            </thead>
            <tbody>
                <!-- Table rows will be inserted here dynamically -->
                @foreach ($transactions as $transaction )
                    <tr>
                        <td>{{ $transaction->created_at }}</td>
                        <td>{{ $transaction->sender }}</td>
                        {{-- @dd( $transaction->sender ) --}}
                        <td>
                            <select>
                                <option value="option1">Option 1</option>
                                <option value="option2">Option 2</option>
                                <option value="option3">Option 3</option>
                            </select>
                        </td>
                        <td>{{ $transaction->amount }} CAD</td>
                        <td>{{ $transaction->amount*441 }} FCFA</td>
                        <td>{{ $transaction->recipient }}</td>
                        <td>{{ $transaction->created_at }}</td>
                        <td>{{ $transaction->wihdrawal_method }}</td>
                        <td>{{ $transaction->created_at }}  eye</td>
                        <td>{{ $transaction->id }}</td>
                        <td>{{ $transaction->created_at }} id</td>
                        <td>{{ $transaction->created_at }}email</td>
                        <td>{{ $transaction->phone }}</td>
                    </tr>


                @endforeach

            </tbody>
        </table>
    </div>

@endsection
