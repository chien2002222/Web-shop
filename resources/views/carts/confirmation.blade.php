@extends('main')

@section('content')
<section class="confirmation spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Order Confirmation</h2>
                <p>Thank you for your order. Here are the details:</p>
                <ul>
                    <li>First Name: {{ $order['first_name'] }}</li>
                    <li>Last Name: {{ $order['last_name'] }}</li>
                    <li>Country: {{ $order['country'] }}</li>
                    <li>Address: {{ $order['address'] }}</li>
                    <li>City: {{ $order['city'] }}</li>
                    <li>State: {{ $order['state'] }}</li>
                    <li>Postcode: {{ $order['postcode'] }}</li>
                    <li>Phone: {{ $order['phone'] }}</li>
                    <li>Email: {{ $order['email'] }}</li>
                    <li>Total: ${{ number_format($order['total'], 2) }}</li>
                </ul>
                <h3>Products</h3>
                <ul>
                    @foreach($order['products'] as $product)
                        <li>{{ $product['name'] }} - ${{ number_format($product['price'], 2) }} x {{ $product['quantity'] }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection
