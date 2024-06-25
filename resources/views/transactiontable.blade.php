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
            <form action="{{ route('transactiontable') }}" method="post">
                @csrf
                <h2>sort by</h2>
                <div class="filter-options">
                    <label for="filter1">status:</label>
                    <select id="filter1" name="status">
                        @isset($filters)
                            <option value="{{ $filters[0] }}"> {{ $filters[0] }}</option>

                            @if ($filters[0] != "all")
                                <option value="all">all </option>
                            @endif
                            @if ($filters[0] != "waiting payement")
                                <option value="waiting payement">waiting payment</option>
                            @endif
                            @if ($filters[0] != "paid")
                                <option value="paid">paid</option>
                            @endif
                            @if ($filters[0]!= "completed")
                                <option value="completed">completed</option>
                            @endif
                        @endisset

                    </select>

                    <label for="filter2">Transfer type:</label>
                    {{-- <form action="{{ route('status_update') }}"> --}}
                        <select id="filter2" name="withdrawal_method">
                            @isset($filters)
                                <option value="{{ $filters[1] }}"> {{ $filters[1] }}</option>

                                @if ($filters[1] != "all")
                                    <option value="all">all </option>
                                @endif
                                @if ($filters[1] != "Orange Money")
                                    <option value="Orange Money">Orange Money</option>
                                @endif
                                @if ($filters[1]!= "MTN mobile money")
                                    <option value="MTN mobile money">MTN mobile money</option>
                                @endif
                                @if ($filters[1] != "Bank deposit")
                                    <option value="Bank deposit">Bank deposit</option>
                                @endif
                            @endisset
                        </select>
                    {{-- </form> --}}


                    <!-- Add more filter dropdowns as needed -->
                    <button>Apply</button>
                </div>
            </form>
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
                {{-- @dd($transaction->created_at) --}}
                    <tr>
                        <td>{{ $transaction->created_at }}</td>
                        <td>{{ $transaction->sender }}</td>

                        <td>
                            <form action="{{ route('modify') }}" class="modify" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $transaction->id }}">
                                <select name="status">
                                    <option value="{{ $transaction->status }}" selected>{{ $transaction->status }}</option>
                                    <option value="waiting payement">waiting payement</option>
                                    <option value="paid">paid</option>
                                    <option value="completed">completed</option>
                                </select>
                                <button>apply</button>

                            </form>

                        </td>
                        <td>{{ $transaction->amount }} CAD</td>
                        <td>{{ $transaction->amount*441 }} FCFA</td>
                        <td>{{ $transaction->recipient }}</td>
                        <td>{{ $transaction->created_at }}</td>
                        <td>{{ $transaction->withdrawal_method }}</td>
                        <td>{{ $transaction->created_at }}  eye</td>
                        <td>{{ $transaction->transaction_id }}</td>
                        <td>{{ $transaction->created_at }} id</td>
                        <td>{{ $transaction->created_at }}email</td>
                        <td>{{ $transaction->phone }}</td>
                    </tr>


                @endforeach

            </tbody>
        </table>
        {{$transactions->links()}}
    </div>

@endsection
