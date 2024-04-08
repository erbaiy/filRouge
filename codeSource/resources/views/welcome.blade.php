<!-- resources/views/payment.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
</head>

<body>
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('payment.process') }}" method="post">
        @csrf
        <input type="text" name="checkin" id="">
        <button type="submit">Pay Now</button>
    </form>
</body>

</html>
