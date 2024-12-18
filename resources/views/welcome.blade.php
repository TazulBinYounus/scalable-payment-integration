<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <style>
        /* Basic reset for the page */
        body,
        h1,
        p,
        form {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-group input[type="hidden"] {
            border: none;
            background: transparent;
        }

        .form-group select {
            cursor: pointer;
        }

        .form-group button {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-group button:hover {
            background-color: #45a049;
        }

        .error-message {
            color: red;
            font-size: 14px;
            margin-top: 10px;
        }

        .validation-errors {
            color: red;
            margin-top: 20px;
        }

        .validation-errors ul {
            list-style-type: none;
            padding-left: 0;
        }

        .validation-errors ul li {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Payment Form</h1>

        <form method="POST" action="/payment/initiate">
            @csrf

            <div class="form-group">
                <label for="payment_method">Payment Method</label>
                <select name="payment_method" id="payment_method">
                    <option value="sslcommerz">SSLCommerz</option>
                    <option value="bkash">bKash</option>
                </select>
                @error('payment_method')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <input type="hidden" name="amount" value="100">
                <input type="hidden" name="name" value="John Doe">
                <input type="hidden" name="email" value="john@example.com">
                <input type="hidden" name="phone" value="123456789">
            </div>

            <div class="form-group">
                <button type="submit">Pay Now</button>
            </div>
        </form>

        <!-- Display validation errors -->
        @if ($errors->any())
        <div class="validation-errors">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>

</body>

</html>