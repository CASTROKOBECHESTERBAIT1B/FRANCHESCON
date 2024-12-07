<!-- resources/views/about.blade.php -->
@extends('layout')

@section('content')
    <div class="container">
        <header>
            <h1>DokiMumu - About Us</h1>
        </header>

        <section class="description">
            <h2 class="h2">Our Story</h2>
            <p>
                DokiMumu is a website created by three people. One is named Doki, and the other is named Mana. The other is Spy and the three have created a website or social media platform, primarily to differentiate it from other websites. This website, is different. It is different because, unlike any other social media platform, you cannot get criticized here.
            </p>
            <img src="{{ asset('images/Doki.png') }}" alt="Home">
            <p>
                Doki-Chan is proud of you and you should keep going in life. Mana-Chan is also proud of you and you should do better stuff to succeed. Spy-Chan is also proud of you and do your best!
            </p>
            <p>
                From us, DokiMumu Developers.
            </p>
        </section>
    </div>

    <!-- Inline CSS for styling -->
    <style>

        body {
            margin: 0;
            padding: 0;
            color: #000;
            position: relative;
            overflow: auto;
            background-image: url('images/form.png');
            background-size: cover;
            background-repeat: no-repeat;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            padding: 20px;
            min-height: 100vh;
        }

        header h1 {
            font-size: 36px;
            margin-top: 20px;
            color: #ff69b4;
            padding: 10px;
        }

        h2 {
            background-image: 
                linear-gradient(to right, red, orange, yellow, green, blue, indigo, violet); 
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;  
            animation: move 35s linear infinite;
        }

        @keyframes move {
            to {
                background-position: 4500vh;
            }
        }

        nav ul {
            list-style: none;
            padding: 0;
            display: flex;
            justify-content: center;
            background-color: #949494;
        }

        nav ul li {
            margin: 0 20px;
        }

        nav ul li a {
            text-decoration: none;
            color: #000;
            font-size: 16px;
            padding: 10px;
            display: inline-block;
        }

        nav ul li a:hover {
            background-color: #ffb6c1;
            border-radius: 10px;
        }

        .description {
            padding: 50px;
            color: #000;
            font-size: 18px;
        }
    </style>
@endsection
