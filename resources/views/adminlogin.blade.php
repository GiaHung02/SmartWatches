@extends('layouts.master')

@section('title')
    <title>Admin Login</title>
@endsection

@section('content')
    <style>
        .background {
            background: url('timups-html/timups-html/images/apple33.jpg') rgba(0, 0, 0, 0.61);
            background-repeat: no-repeat;
            background-size: contain;
            background-blend-mode: darken;
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: -1;
            filter: blur(3px);
            min-height: 400px;

        }

        h2 {
            font-size: 30px;
        }

        .container_login {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            background: transparent;
            box-shadow: 0 0 15px rgb(255, 255, 255);
            border-radius: 15px;
            width: 500px;
            margin: 10vh auto;
            color: aliceblue;
        }

        form {
            padding: 10px;
            display: flex;
            flex-direction: column;
            width: 85%;
        }

        .form-item {
            display: flex;
            width: 90%;
            background: transparent;
            margin: 10px auto;
            align-items: center;
            border-radius: 15px;
            border-bottom: 1px solid rgb(82, 81, 81);
        }

        .success-form {
            text-align: center width: 90%;
            background: transparent;
            margin: 15px;
            padding: 5px;
            align-items: center;
            border-radius: 10px;
            color: #3be662;
            border: 1px solid #8bdf9e;
        }
        .password-form {
            text-align: center width: 90%;
            background: transparent;
            margin: 15px;
            padding: 5px;
            align-items: center;
            border-radius: 10px;
            color: hsl(0, 75%, 67%);
            border: 1px solid hsl(0, 75%, 67%) ;
        }

        .form-item:hover {
            border: 1px solid hsl(0, 23%, 95%);
            ;
        }

        input {
            font-size: 18px;
            width: 80%;
            height: 30px;
            outline: none;
            background: transparent;
            border: none;
            margin: auto;
            color: white;
        }


        span {
            margin: 5px;
            color: rgb(172, 172, 172);
            cursor: default;
            user-select: none;
            background: rgba(85, 81, 81, 0.637);
            padding: 5px;
            border-radius: 15px;
        }

        button[type="submit"] {
            width: 250px;
            font-size: 20px;
            margin: 10px auto;
            padding: 10px 16px;
            color: white;
            background: rgba(122, 123, 116, 0.72);
            border: none;
            text-align: center;
        }

        button[type="submit"]:hover {
            background: rgb(172, 134, 8);
        }

        p:first-of-type {
            font-size: 18px;
            margin: 0;
        }

        .options {
            display: flex;
            margin: 10px auto;
            flex-wrap: wrap;
            justify-content: center;
        }

        button {
            padding: 5px 16px;
            font-size: 18px;
            margin: 5px 15px;
            width: 180px;
            color: white;
            background: transparent;
            cursor: pointer;
            transition: all 0.7s ease;
        }

        .fb:hover {
            background: rgb(92, 92, 238);
            border: none;
            box-shadow: 0 0 5px rgb(235, 235, 244);
        }

        .gl:hover {
            background: rgb(180, 14, 14);
            border: none;
            box-shadow: 0 0 5px rgb(225, 216, 216);

        }

        p {
            font-size: 18px;
            margin: 5px;
        }

        a {
            color: white;
        }

        a:hover {
            color: grey;
        }

        @media screen and (max-width:550px) {
            .container_login {
                width: 90%;
            }
        }
    </style>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <div class="background"></div>
    <div class="container_login">
        <h2>Admin Login Form</h2>
        @if (session('success'))
            <p class="success-form">{{ session('success') }} </p>
        @endif
        @if (session('password'))
        <p class="password-form">{{ session('password') }} </p>
        @if($errors->any())
        @foreach ($errors as $err)
        <p class="alert alert-danger"> {{ $err }}</p>
        @endforeach

        @endif
    @endif
        <form method="POST" action="{{ route('adminprocessLogin') }}">
            @csrf
            <div class="form-item">
                <span class="material-icons-outlined">
                    account_circle
                </span>
                <input type="text" name="email" value="{{ old('email') }}" placeholder=" email">
            </div>

            <div class="form-item">
                <span class="material-icons-outlined">
                    lock
                </span>
                <input type="password" name="password" value="{{ old('password') }}" placeholder="password">

            </div>

            <button type="submit"> LOGIN </button>
            {{-- <p> Or Login Using</p>
            <div class="options">
                <button class="fb">Facebook</button>
                <button class="gl">Google</button>
            </div> --}}
            <p>New Admin User? <a href="{{ route('register') }}">Create an account</a></p>
            <p><a href="">Forgot password</a></p>
        </form>

    </div>
@endsection
