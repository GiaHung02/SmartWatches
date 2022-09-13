@extends('layout.layout')

@section('content')
<section class="shop_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Latest Watches
            </h2>
        </div>
        <div class="row">
            <div class="col-md-6 ">
                <div class="box">
                    <a href="">
                        <div class="img-box">
                            <img src="{{ asset('assets/images/w1.png') }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h6>
                                Smartwatch
                            </h6>
                            <h6>
                                Price:
                                <span>
                                    $300
                                </span>
                            </h6>
                        </div>
                        <div class="new">
                            <span>
                                Featured
                            </span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="box">
                    <a href="">
                        <div class="img-box">
                            <img src="{{ asset('assets/images/w2.png') }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h6>
                                Smartwatch
                            </h6>
                            <h6>
                                Price:
                                <span>
                                    $125
                                </span>
                            </h6>
                        </div>
                        <div class="new">
                            <span>
                                New
                            </span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="box">
                    <a href="">
                        <div class="img-box">
                            <img src="{{ asset('assets/images/w3.png') }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h6>
                                Smartwatch
                            </h6>
                            <h6>
                                Price:
                                <span>
                                    $110
                                </span>
                            </h6>
                        </div>
                        <div class="new">
                            <span>
                                New
                            </span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="box">
                    <a href="">
                        <div class="img-box">
                            <img src="{{ asset('assets/images/w4.png') }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h6>
                                Smartwatch
                            </h6>
                            <h6>
                                Price:
                                <span>
                                    $145
                                </span>
                            </h6>
                        </div>
                        <div class="new">
                            <span>
                                New
                            </span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="box">
                    <a href="">
                        <div class="img-box">
                            <img src="{{ asset('assets/images/w5.png') }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h6>
                                Smartwatch
                            </h6>
                            <h6>
                                Price:
                                <span>
                                    $195
                                </span>
                            </h6>
                        </div>
                        <div class="new">
                            <span>
                                New
                            </span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-sm-6  col-xl-3">
                <div class="box">
                    <a href="">
                        <div class="img-box">
                            <img src="{{ asset('assets/images/w6.png') }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h6>
                                Smartwatch
                            </h6>
                            <h6>
                                Price:
                                <span>
                                    $170
                                </span>
                            </h6>
                        </div>
                        <div class="new">
                            <span>
                                New
                            </span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="box">
                    <a href="">
                        <div class="img-box">
                            <img src="{{ asset('assets/images/w1.png')}}" alt="">
                        </div>
                        <div class="detail-box">
                            <h6>
                                Smartwatch
                            </h6>
                            <h6>
                                Price:
                                <span>
                                    $230
                                </span>
                            </h6>
                        </div>
                        <div class="new">
                            <span>
                                New
                            </span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="btn-box">
            <a href="">
                View All
            </a>
        </div>
    </div>
</section>
@endsection