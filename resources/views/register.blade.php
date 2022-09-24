@extends('layouts.master')

@section('title')
    <title>register</title>
@endsection

@section('content')
    <!-- shop section -->

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }


        body {
            /* height: 100vh;
                display: flex;
                justify-content: center;
                align-items: center;
                padding: 10px; */
            background: linear-gradient(135deg, #71b7e6, #9b59b6);
        }

        .container_register {
            /* margin-left: 15%; */
            max-width: 700px;
            width: 100%;
            background-color: #fff;
            padding: 25px 30px;
            border-radius: 40px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
            */ align-items: center;
            text-align: center;
            margin: 10vh auto;

            /* display: flex;
                    flex-direction: column;
                   
                    background: transparent;
                    box-shadow: 0 0 15px rgb(255, 255, 255);
                    border-radius: 15px;
                    width: 500px;
                    margin: 10vh auto;
                    color: aliceblue; */
        }

        .container_register .title {
            font-size: 25px;
            font-weight: 500;
            position: relative;
        }

        .container_register .title::before {
            content: "";
            position: absolute;
            left: 0;
            bottom: 0;
            height: 3px;
            width: 30px;
            border-radius: 5px;
            background: linear-gradient(135deg, #71b7e6, #9b59b6);
        }

        .content form .user-details {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin: 20px 0 12px 0;
        }

        form .user-details .input-box {
            margin-bottom: 15px;
            width: calc(100% / 2 - 20px);
        }

        form .input-box span.details {
            display: block;
            font-weight: 500;
            margin-bottom: 5px;
        }

        .user-details .input-box input {
            height: 45px;
            width: 100%;
            outline: none;
            font-size: 16px;
            border-radius: 5px;
            padding-left: 15px;
            border: 1px solid #ccc;
            border-bottom-width: 2px;
            transition: all 0.3s ease;
        }

        .user-details .input-box input:focus,
        .user-details .input-box input:valid {
            border-color: #9b59b6;
        }

        form .gender-details .gender-title {
            font-size: 20px;
            font-weight: 500;
        }

        form .category {
            display: flex;
            width: 80%;
            margin: 14px 0;
            justify-content: space-between;
        }

        form .category label {
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        form .category label .dot {
            height: 18px;
            width: 18px;
            border-radius: 50%;
            margin-right: 10px;
            background: #d9d9d9;
            border: 5px solid transparent;
            transition: all 0.3s ease;
        }

        #dot-1:checked~.category label .one,
        #dot-2:checked~.category label .two,
        #dot-3:checked~.category label .three {
            background: #9b59b6;
            border-color: #d9d9d9;
        }

        form input[type="radio"] {
            display: none;
        }

        form .button {
            height: 45px;
            margin: 35px 0
        }

        form .button input {
            height: 100%;
            width: 100%;
            border-radius: 5px;
            border: none;
            color: #fff;
            font-size: 18px;
            font-weight: 500;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s ease;
            background: linear-gradient(135deg, #71b7e6, #9b59b6);
        }

        form .button input:hover {
            /* transform: scale(0.99); */
            background: linear-gradient(-135deg, #71b7e6, #9b59b6);
        }

        @media(max-width: 584px) {
            .container_register {
                max-width: 100%;
            }

            form .user-details .input-box {
                margin-bottom: 15px;
                width: 100%;
            }

            form .category {
                width: 100%;
            }

            .content form .user-details {
                max-height: 300px;
                overflow-y: scroll;
            }

            .user-details::-webkit-scrollbar {
                width: 5px;
            }
        }

        @media(max-width: 459px) {
            .container_register .content .category {
                flex-direction: column;
            }
        }
    </style>

    <div class="container_register">
        <div class="title">Registration</div>
        <div class="content">
            @if (count($errors)>0)
                @foreach ($errors as $err)
                    <p class="alert alert-danger"> {{ $err }}</p>
                @endforeach
            @endif
            <form method="POST" action="{{ route('register.action') }}" enctype="multipart/form-data">
                @csrf
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Email <span class="text-danger">*</span></span>
                        <input type="text" placeholder="Enter your email" name="email"
                            value="{{ old('email') }}">
                    </div>
                    <div class="input-box">
                        <span class="details">Full Name </span>
                        <input type="text" placeholder="Enter your name" name="fullname"
                            value="{{ old('fullname') }}">
                    </div>
                    <div class="input-box">
                        <span class="details">Password <span class="text-danger">*</span></span>
                        <input type="password" placeholder="Enter your password" name="password">
                    </div>
                    <div class="input-box">
                        <span class="details">Confirm Password <span class="text-danger">*</span></span>
                        <input type="password" placeholder="Confirm your password" name="password_confirmation">
                    </div>

                    <div class="input-box">
                        <span class="details">Phone Number</span>
                        <input type="text" placeholder="Enter your number" name="phone"
                            value="{{ old('phone') }}">
                    </div>
                    <div class="input-box">
                        <span class="details">Address</span>
                        <input type="text" placeholder="Enter your Address" name="address"
                            value="{{ old('address') }}">
                    </div>
                </div>
                <div>
                    <span class="details">Role <span class="text-danger">* </span></span>
                    <select name="role">
                        <option value="0">Please choose one</option>
                        <option value="1">Admin</option>
                        <option value="2">User</option>
                    </select>
                    {{-- <input type="text" placeholder="Enter 1 for admin and 2 for user)" name="role" id="role" value="{{ old('role') }}"> --}}
                </div>
                <div>
                    <span class="details">Active: <span class="text-danger">* </span></span>
                    <select name="active">
                        <option value="0">Please choose one</option>
                        <option value="1">Active</option>
                        <option value="2">Disable</option>
                    </select>
                </div>

                <div>Image: 
                    <input type="file" name="image">
                </div>

                <div class="button">
                    <input type="submit" value="Register">
                </div>
            </form>
        </div>
    </div>

    <!-- end shop section -->
@endsection
