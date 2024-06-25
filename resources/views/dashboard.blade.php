<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Dashboard</title>
{{-- <link rel="stylesheet" href="styles.css"> --}}
</head>
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
    }

    header {
        background-color: #333;
        color: #fff;
        padding: 20px;
    }

    nav ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
    }

    nav ul li {
        display: inline;
        margin-right: 20px;
    }

    nav ul li a {
        text-decoration: none;
        color: #fff;
    }

    main {
        padding: 20px;
    }

    .transactions {
        background-color: #f4f4f4;
        padding: 20px;
        margin-top: 20px;
    }

    .transactions h2 {
        margin-bottom: 10px;
    }

    .transactions ul {
        list-style-type: none;
        padding: 0;
    }

    .transactions li {
        border-bottom: 1px solid #ccc;
        padding: 10px 0;
    }

</style>
<body>

<header>
    <h1>Admin Dashboard</h1>
    <nav>
        <ul>
            <li><a href="#">Dashboard</a></li>
            <li><a href="{{ route('transactiontable') }}">Transactions</a></li>
            <li><a href="{{ route('viewclient') }}">Users</a></li>
            <li><a href="{{ route('addmember') }}">Add new admin</a></li>
            <li><a href="#">Settings</a></li>
            <li> {{ auth()->user()->name }} </li>
        </ul>

    </nav>
</header>

<main>
    <section class="transactions">
        <h2>Recent Transactions</h2>
       <div>
        Welcome on the dashboard of the admin. for now you can just manage the transactions
       </div>
    </section>
</main>

</body>
</html>
