<!-- /templates/layout.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include Bootstrap CSS via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Tech Store</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fff9f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            width: 100%;
            max-width: 500px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }
        .logo {
            margin-bottom: 20px;
        }
        .logo img {
            max-width: 150px;
        }
        h1 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        p {
            font-size: 14px;
            color: #555;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }
        button {
            background-color: #ff9900;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #e08900;
        }
        .illustration img {
            max-width: 100%;
            height: auto;
            margin: 20px 0;
        }
        .right-panel {
            margin-top: 30px;
            text-align: left;
        }
        .right-panel h2 {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .right-panel p {
            font-size: 14px;
            color: #666;
        }
    </style>
</head>
<body>
<div class="container">
        <!-- Logo -->
        <div class="logo">
            <img src="/src/assets/images/logoTechStore.png" alt="Logo">
        </div>

        <!-- Main Content -->
        <h1>Email Address</h1>
        <p>First, tell us what is your email address</p>

        <!-- Form -->
        <form action="process-forgot-password.php" method="POST">
            <input type="email" name="email" placeholder="Email Address" required>
            <button type="submit">Continue</button>
        </form>

        <!-- Illustration -->
        <div class="illustration">
            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAhFBMVEX///8UFBQZGRnh4eH19fUnJycRERGYmJihoaHy8vIsLCwAAAAkJCQdHR0XFxf4+PioqKiRkZHNzc1BQUHV1dW5ublJSUnn5+doaGhWVlawsLAMDAwxMTE9PT3ExMTd3d2Dg4N4eHhsbGxgYGCIiIg3NzdaWlpPT09qamqEhIS1tbVzc3NuO8P9AAAMc0lEQVR4nO2diXaqOhSGSZAwJQGZVEBEEe3R93+/S5htobXWpPaufOscixghP5n3TqKiSCQSiUQikUgkEolEIpFIJBKJRCKRSCQSiUQikUgkEskdLLzYYLj1S/36M+LRxR3VC2PXcOPQW/2SvqxAoAZuUwRQWrZvf4AdNJdehLmPEICkOY1odMwWovWtNoDAzVGvcY3qv/5z3ObRrQGk1XMr9svq3HFflBRQCg+ZUIEZwppr8rhyuKUEndzAGZ1bBMYGQVqGPG44TZbAK5cLq2cKy8lHZ7olhH7A5a4T8UBwyeXCLiLWfEKFKUl0Lvf9QIT3XK67pyj/NMAyIQWXO78jpCmX6xYEfFWbBBj7zhdhnsCGxF8H+j5Xgnfj96ss1pe6m900h+YWR9wlmoDwuIdOoDq6ie6z9pWy9tDXR1XPosQnDne/IQM8yoKXJF7/xjkmhGrFseouHQtMIV4Oz9TUyJHD/ce4gEeFlpLhqoFFwHXQ6+39Eg8lNAAJ50ZjWXIohjqJ+uNLQs7qzaerDUmMUdjt8yMwZuk/X6EJUZ8uYdK1tuFQyejUH9J4C7lUdcPNOCjUybo7rLoTbXLt7M0QIvPxpT+G5dNjcBMbDgq1IQl90nUnAjBSqIRa0idpSj2FIxwUZrAvhfGQPrcKlb126A4NyKdT1cKhHF6h2x2msK813ylUzn6XcirAz47CGA51KaRdBgyH1PygMPb7AU2KeA78l0+vyczE6g5PsK9PPih0/G3XuTl82YP9CUvgfh3oWyySLtOZAAy9l/cKlf22G1o9Pw5jOFy9hG0Jc4dWY0Kh0femXMBngNrAQaFBytrSpBI0yn0fFIagq0JjwLNvyiOHRDiN1Z2Bydg48kFhBrr24u8pXJwBBIAkN9afT9LQ+Gu5tCI8bKP9bU8lgB/KYafrz9U00+z89e2JNe3q0oL+rdZihmB7q3ABUNcepgnXFl9YGqa3xoRhABJAn+eNJxQ6y3ZoEHTmhjjuPtm9D3w3QXKThivYj+2PnOy1LRMKMxvUJSREdls+7KbaW5XJ48bxoDyM3w7DKoWgx5/bHUzl0pyiqruxRH0zlQFydhQPYv9x78bOGtelBe5tFwbZTAR/HpPl0EUk3xM0fLKz8NYA5O0HNwrQSMiV4K5yWWDEdQA8U9N4qVWm4xsvTpam/cgqN27xD4T2GfOAOZv2pxWqpWX5Nxayg6XhH42zRgoLPAh0IeTi1xuYVBhSUhRkZNU0fZweAc1/cKNeoXPGg8E/QIC3H3FKoY7onvmOSGfVDAiuhqthQk6PewA6heYWp30Dv8LcTd7TrQWqpRnIbouiDeuystPQ4zajwD6zP6qGo96Lb6Z4Pf+NJzGh0Ly22TO7tnHR9e6TVrIzMHxvODWV0s6G3SggZHDFLEp8foKEL3io1+aTAa19CiodztG56jGgZGj3hfjWHlS4hRMK0XBuzp/lJUNPRlmlQgQ+2PP+PJc6MxEPAMn7NyrGZxECxY0tqkQjoxT0IOHuG20QqNAfVZwhInxmuHxEnMLjyFEYI8q9HewQN8ZHwyDJRcj4LOxTEaYwGhzflUBhRUOcwoz23owwAXy9vreIUhj1HqAdouKyqCJM4Q5p3aGPcxF37BGkUIdd3Xnh7Lb/gCCFZ9BZDLZQ4MRShhiFDoRtDy0AfCYKziNGYQA6d7fO1zg6gRiFg5/pBPha1j4iRuHg77WA6OUIYhTqoG0CF5DrzJIpxCjs77JCgtsKUQpj2pbDDAqZ2j1GpyIUrpJ2ynAEBfa5K0zjlKaW9l3Sb4XGZdUU5kSrGvrdGYttDZcJofARNPKNwJQwW9UaEAAhsYTWpBtCr9lqwZ3mbpeIgnQpxPbUUeBU1LKchjkTHC9iijk7fX4bC4pdICccD3CdAPECGFR0H19RA6HFIgeXrwM9EeeIEUCRwNHvP7EKVxoBaUQIEGXp5j0f8D2Ohk+s2xYTIuy2HuC8GOeGYzdnJoCJ+nnQ52HdbxFaeO7xul7vj673YKONQacrh4KWxla9KEru6iOa7ma0Nh+d4gfW0quD+cnjshpwmjW2vu61rfYUUrg5xpnnhe7xXPWe4fHblf6uN0R9nCrMkxMBh2xlTtFlxiMgyVs2yppmWCAyLFmc/PI7WDBEum9cqLjalI1+IQVoCrt2hAUWQfmHrKxeAdk2jrLcZoEBmbxGS0Id5njqvBYRFNpKmUZRWpMwXS56vzayJfAJqqspnTShZy5So7EMGiLSlIhc8BD4U5YAzbZdOf2mi3NPYJ4Fl4jYYkdsn7EEn804+7aTc5lAACgVPCT9jBigT0dXMUi+N/pS9eJ0FdsX/hQVoS/8tAa8rz19VbajuT0zHPBpNeKPGQyMO5aQO9iioy2FktNf0rgg98y9Dkm6TStKRkp4z2Z+Kvp926pEZFTbmhQJtqX9BAvcVamPFm1XlMRdqTO8Wgb26KgUmp/ETgOjtSCxTQDF0/t+IZGd0Tv41+2DoKj7qs+JP/ZNW443g71w4/t+5E9BcDRzid+h7BYLuAmhlkVJMtO7yeidQ6FVKWgy6X2YqPXTXhLKkk/dQ3u6/zIaFX11zVTElO576dcN0G6mlp7OzFdOwb1WF1PIrPU76SZOGMNi88PMZlLF/TMrXklitzy+GLY6COG/yaD7b6x4eaGM2m2s5A9Z8P0C0I5vWc5NX5yd7XO6NDwP7b63PUwG/U4act+m5X4uIK//jkybx5mVed/asyOE3xxSciMDTQ0ToM6HqoIZS3UE7l/gGib0RTJpNfptZ/W84bIWtovITPaCYK5PF7jvurYhehmBQ7wdP/UPrn4i7zcL6NjNOj/0hCY3tqoQcdkY7kHWvUtjScC2BLNuKneu6tAp2RMwkvhCWZQRw35Jsxnq7vyuv2c43eDrFIVs1Ugv8bVSkO0NhO4a0KnU2ucDfUVZC6weVNJJfDWBrJN2V4T2Gh5ZamCSN6dbgWztT5NRw+TVBLJldHf40FaAxOGASxr7XC9QaTPq66WgwjaQvaP38T6QlzCJOkBDPydOgPuSApUV9r8cNFwgeVdaPUT+6eBmuBwn2HpFgVXM8FdzwlT4sdddSXxvDwi3PLYPfQbFF5sYm+lURg7Wheip+A/jfL7Q+pXGs49SaShnXS87S8w6bL4sIjznkTbAT/aPeCGuAJ4mRkdBRL7Ybf3vEGIC1u+qjqwAxHqRkewTcNhk9/Rf2Ix/HTXcW5C8irXlSSyMLaAUIJymGLEj3/1flMAbdsZhC1nfmvhXV9i8O+GYf86PLZFIJBKJRPI/IHAZr9DJVOuYPH8X2us5z3P/FYZBy6iKyfn5zuF6tq7+CgrrSMQcFDIjpk40jMuoYsteIh+LwB9uWGKs1S4Sl1ca/mOTCdkE3/pldmbhk7m54SrnlYbHLPMOL5FLr1mW5c9X6J4Yr2BQCuuYvKjlXyKRvBjTlrhXs8/tKAX2SbkQSLTcZD9x59iAWMBeKwqsZw1FWMNVGxM3U4g0ApBdHy1tYu9yG1gY2asr0SjbRtrZJ5j9BoGCveorkRJDAOzfbaF2Sb0JsFvF3zzaKyXbKgsns6oXJTvXu8MTTzGtWHGbyZj2rt0z+FI6iuk4C8W/VC+bqu4/VNfY7tl+yHn1dDwlsFbsW7N7DAtil9R/jHqqZV4whYri1Xs6Xi8Fa7NYauTHXmE3ODl2E2x95uNmrVsAFLeeHqdWgWCwoIFSP7lfhil0upjs7LFC27wwp2+lMMDqkIbt5uSZ3XrvG4XVi14op2a+0DZWouDMzlfX/eUkVHbAtu1jq3BlLwaF2Vlx7CqblpZmL5VOYVXo7GaLlJDgWmOtsCiOReEo7U9W7w3FL+qtYmJYXf53+1FtLp1Iw+tJ17Uq8+FAcTZ5n4YjN3hms1zcpOEyWFYFc9t0xQ6uEhmBXdU87k9+AeQ5dOWwVqifBoWO7V7C/NyUQ8/+UA4ZLlvD0CisBi5nV8mbmdNWwP5d1y9TDitcFrWsKmS9wvrArJKsSkNFj7q4jtNQWbJv9TVN9ZTU+qcV8k2T8ihsrvu77Oy39XqtGOnyn69VWjK2u3GGqjjXrZhvKOSqn0hV05DD21pX7OJtXTCVb4W+rrd8TJnCM6tLbfaQrsbZr7JnGbCUN118WK+Fb/xzg+MxlFUWZrVpyGQzmU2WMeuJfKtA8cKQnVuxcDulDs4+crK4qUHqbYQCppWdX4RxPRfaq8+q9bdeZzG3RCKRSCQSiUQikUgkEolEIpFIJBKJRCKRSH6Z/wCog9lKbuHx+QAAAABJRU5ErkJggg==" alt="Illustration">
        </div>

    <!-- Include Bootstrap JS and Popper.js via CDN (required for Bootstrap JavaScript features) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>