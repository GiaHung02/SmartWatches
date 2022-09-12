@extends('layouts.master')

@section('title')
<title>XIAOMI</title>

    
@endsection

@section('content')
<!-- shop section -->

<section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          XIAOMI
        </h2>
      </div>
      <div class="row">
        @foreach ($products as $product)
        <div class="col-md-6 ">
          <div class="box">
            <a href={{route('detail')}}>
              <div class="img-box">
                <a href={{route('detail', ['id'=>$product->id])}}>
                <img src="timups-html/timups-html/images/xiaomi1.png" alt="">
              </div>
              <div class="detail-box">
                <h6>
                  {{$product->name}}
                </h6>
                <h6>
                  Price:
                  <span>
                    $${{$product->price}}
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
        @endforeach
  
            {{-- CATEGORY --}}
<section class="feature_section layout_padding">
  <div class="container">
    <div class="heading_container">
      <h2>
       CATEGORY
      </h2>
      <p>
        Best brand in the segment
      </p>
    </div>
    <div class="row">
      <div class="col-sm-6 col-lg-3">
        <div class="box">
          <div class="img-box">
            <img src="timups-html/timups-html/images/samsung.png" alt="">
            
          </div>
          <div class="detail-box">
            <h5>
              SAMSUNG
            </h5>
            <p>
              
            </p>
            <a href="{{route('samsung')}}">
              <span>
                Read More
              </span>
              <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
            </a>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-3">
        <div class="box">
          <div class="img-box">
            <img src="timups-html/timups-html/images/apple.png" alt="">
          </div>
          <div class="detail-box">
            <h5>
              APPLE
            </h5>
            <p>
             
            </p>
            <a href="{{route('apple')}}">
              <span>
                Read More
              </span>
              <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
            </a>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-3">
        <div class="box">
          <div class="img-box">
            <img src="timups-html/timups-html/images/xiaomi.png" alt="">
          </div>
          <div class="detail-box">
            <h5>
              XIAOMI
            </h5>
            <p>
             
            </p>
            <a href="{{route('xiaomi')}}">
              <span>
                Read More
              </span>
              <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
            </a>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-3">
        <div class="box">
          <div class="img-box">
            <img src="timups-html/timups-html/images/garmin.png" alt="">
          </div>
          <div class="detail-box">
            <h5>
              GARMIN
            </h5>
            <p>
              
            </p>
            <a href="{{route('garmin')}}">
              <span>
                Read More
              </span>
              <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="btn-box">
      <a href="">
        View More
      </a>
    </div>
  </div>
</section>

{{-- end CATEGORY --}}
    </div>
  </section>
  
  <!-- end shop section -->
    
@endsection