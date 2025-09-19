<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Invoice</title>
</head>

<body class="invoice-body">
    <div class="invoice-box">

        <!-- Header -->
        <header>
            <h1>GIRAFFE</h1>
            <div class="company-details">
                <strong>GIRAFFE ASSOC. Pvt Ltd</strong><br>
                123 Business Street, Pune, India<br>
                support@giraffe.com | +91 9090909090
            </div>
        </header>

        <!-- Customer Details -->
        <section class="customer-details">
            <h3>Bill To:</h3>
            <p>
                <strong>Customer Name:</strong> {{ $order->name }}<br>
                <strong>Address:</strong>{{ $order->cust_address }}<br>
                <strong>Phone:</strong> +91 {{ $order->phone }}<br>
                <strong>Email:</strong> {{ $order->email }}
            </p>
        </section>

        <!-- Product Table -->
        <table>
            <thead>
                <tr>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Order Status</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><img class="rounded-3" width="80" src="products/{{ $order->product->image }}"
                            alt="{{ $order->product->title }}">
                    </td>
                    <td>{{ $order->product->title }}</td>
                    <td>1</td>
                    <td>
                        @if ($order->status == 'In Progress' || $order->status == 'In Transit')
                            <span class="in-progress">{{ $order->status }}</span>
                        @else
                            <span class="completed">{{ $order->status }}</span>
                        @endif
                    </td>
                    <td>{{ number_format($order->product->price, 2) }}</td>
                </tr>
            </tbody>
        </table>

        <!-- Total Section -->
        @php
            if ($order->product->price >= 2499) {
                $grand_total = $order->product->price + 0;
            } elseif ($order->product->price >= 1499) {
                $grand_total = $order->product->price + 50;
            } else {
                $grand_total = $order->product->price + 100;
            }
        @endphp
        <p class="total">Grand Total <small class="text-secondary">(Shipping included)</small>:
            {{ number_format($grand_total, 2) }}</p>

        <!-- Footer -->
        <footer>
            This is a system generated invoice. For any queries, contact support@giraffe.com
        </footer>
    </div>
</body>

<style>
    /* Order invoice template starts */
    .invoice-body {
        font-family: Arial, sans-serif;
        color: #333;
        margin: 0;
        padding: 0;
        background: #fff;
    }

    .invoice-body .invoice-box {
        max-width: 900px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
    }

    .invoice-body header {
        border-bottom: 2px solid #4a90e2;
        padding-bottom: 15px;
        margin-bottom: 25px;
    }

    .invoice-body header h1 {
        margin: 0;
        font-size: 28px;
        color: #4a90e2;
    }

    .invoice-body .company-details {
        text-align: right;
        font-size: 14px;
        color: #666;
    }

    .invoice-body .customer-details {
        margin-bottom: 25px;
        font-size: 14px;
    }

    .invoice-body .customer-details h3 {
        margin: 0 0 10px 0;
        color: #444;
    }

    .invoice-body table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 25px;
    }

    .invoice-body table thead tr {
        background: #f5f7fa;
        border-bottom: 2px solid #ddd;
    }

    .invoice-body table thead th {
        padding: 12px;
        text-align: left;
        font-weight: 600;
        font-size: 14px;
        color: #333;
    }

    .invoice-body table tbody tr {
        border-bottom: 1px solid #eee;
    }

    .invoice-body table tbody td {
        padding: 12px;
        font-size: 14px;
        vertical-align: middle;
    }

    .invoice-body .total {
        text-align: right;
        font-size: 16px;
        font-weight: bold;
        color: #4a90e2;
    }

    .invoice-body footer {
        border-top: 2px solid #4a90e2;
        padding-top: 15px;
        font-size: 12px;
        text-align: center;
        color: #666;
    }

    .invoice-body .in-progress {
        color: #ba7e16;
    }

    .invoice-body .completed {
        color: #268d0d;
    }

    /* Order invoice template ends */
</style>

</html>
