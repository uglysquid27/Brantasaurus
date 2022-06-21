<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Order Details</title>
    <style>
        body {
            background-color: white;
            margin: 0;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            margin: 0;
            padding: 0;
        }

        p {
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            margin-right: auto;
            margin-left: auto;
        }

        .brand-section {
            background-color: #D19C97;
            padding: 10px 40px;
        }

        .logo {
            width: 50%;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
        }

        .col-6 {
            width: 50%;
            flex: 0 0 auto;
        }

        .text-white {
            color: #fff;
        }

        .company-details {
            float: right;
            text-align: right;
        }

        .body-section {
            padding: 16px;
            border: 1px solid gray;
        }

        .heading {
            font-size: 20px;
            margin-bottom: 08px;
        }

        .sub-heading {
            color: #262626;
            margin-bottom: 8px;
        }

        table {
            background-color: #fff;
            width: 100%;
            border-collapse: collapse;
        }

        table thead tr {
            border: 1px solid #111;
            background-color: #f2f2f2;
        }

        table td {
            vertical-align: middle !important;
            text-align: center;
        }

        table th,
        table td {
            padding-top: 08px;
            padding-bottom: 08px;
        }

        .table-bordered {
            box-shadow: 0px 0px 5px 0.5px gray;
        }

        .table-bordered td,
        .table-bordered th {
            border: 1px solid #dee2e6;
        }

        .text-right {
            text-align: end;
        }

        .w-20 {
            width: 20%;
        }

        .float-right {
            float: right;
        }

        .km {
            margin-top: 10px;
        }

        .shipping-details,
        .order-details {
            padding-left: 20px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="brand-section">
            <div class="row">
                <div class="col-6">
                    <h1 class="text-white km">K-Merch</h1>
                </div>
            </div>
        </div>

        <div class="body-section">
            <div class="row">
                <div class="col-12 shipping-details">
                    <h2 class="heading">Invoice No: {{ $orders->id}}</h2>
                    <p class="sub-heading">Tracking No. {{ $orders->tracking_num }} </p>
                    <p class="sub-heading">Order Date: {{ $orders->created_at->format('d-m-Y') }} </p>
                    <p class="sub-heading">Email Address: {{ $orders->email }} </p>
                    <p class="sub-heading">Full Name: {{ $orders->name }}</p>
                    <p class="sub-heading">Address: {{ $orders->address }}, {{ $orders->city }}, {{ $orders->state }},
                        {{ $orders->zip }}</p>
                    <p class="sub-heading">Phone Number: {{ $orders->phone }}</p>
                </div>
            </div>
        </div>

        <div class="body-section order-details">
            <h3 class="heading">Ordered Items</h3>
            <br>
            <table class="table-bordered">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th class="w-20">Quantity</th>
                        <th class="w-20">Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders->order_items as $item)

                    <tr>
                        <td>{{ $item->product->product_name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>Rp. {{ number_format($item->price) }}</td>
                    </tr>                    
                    @endforeach
                    <tr>
                        <th colspan="2" class="text-center">      Grand Total           </th>
                        <td> Rp. {{ number_format($orders->total_price) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="body-section">
            <p>&copy; Copyright 2022 - K-Merch. All rights reserved.
            </p>
        </div>
    </div>

</body>

</html>