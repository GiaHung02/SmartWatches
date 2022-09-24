@extends('layouts.master')
@section('mycss')
    
@endsection
@section('content')
<div class="container">

    <div class="wrap-breadcrumb">
        <ul>
            <li class="item-link"><a href="{{ route('home') }}" class="link">home</a></li>
            <li class="item-link"><span>View Cart</span></li>
        </ul>
    </div>
    <div class=" main-content-area">

        <div class="wrap-iten-in-cart">
            <h3 class="box-title">Products Name</h3>
            <ul class="products-cart">
                @php
                    $total = 0;
                @endphp
                @if (Session::has('cart') != null)
                    @foreach (Session::get('cart') as $key => $item)
                     
                        <li class="pr-cart-item">
                            <div class="product-image">
                                <figure><img src="{{ asset('assets/images/products') . '/' . $item->products->photo }}" alt="{{ $item->products->name }}"></figure>
                            </div>
                            <div class="product-name">
                                <a class="link-to-product"
                                    href="{{ route('product.detail', $item->products->name) }}">{{ $item->products->name }}</a>
                            </div>
                            <div class="price-field produtc-price">
                                <p class="price">$ {{ $item->products->price }}</p>
                            </div>
                            <div class="quantity">
                                <div class="quantity-input">
                                    <input data-pid="{{ $item->products->id }}" type="text" name="product-quatity" value="{{ $item->quantity }}" data-max="120" class="number"
                                        pattern="[0-9]*">
                                    <a class="btn btn-increase"  href="#"></a>
                                    <a class="btn btn-reduce"  href="#"></a>
                                </div>
                            </div>
                            <div class="price-field sub-total">
                                <p class="price">$ {{ $item->products->price * $item->quantity }}</p>
                            </div>
                            <div class="delete">
                                <a href="#" class="btn btn-delete" title="">
                                    <span>Delete from your cart</span>
                                    <i class="fa fa-times-circle" aria-hidden="true"></i>
                                </a>
                            </div>
                        </li>
                @php
                    $total += $item->products->price * $item->quantity
                    
                @endphp
                    @endforeach
                @endif

            </ul>
        </div>

        <div class="summary">
            <div class="order-summary">
                <h4 class="title-box">Order Summary</h4>
                <p class="summary-info"><span class="title">Subtotal</span><b class="index">${{ $total }}</b></p>
                <p class="summary-info"><span class="title">Shipping</span><b class="index">Free Shipping</b></p>
                <p class="summary-info total-info "><span class="title">Total</span><b class="index">${{ $total }}</b></p>
            </div>
            <div class="checkout-info">
                <label class="checkbox-field">
                    <input class="frm-input " name="have-code" id="have-code" value="" type="checkbox"><span>I have
                        promo code</span>
                </label>
                <a class="btn btn-checkout" href="{{ route('checkout') }}">Check out</a>
                <a class="link-to-shop" href="{{ route('home') }}">Continue Shopping<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
            </div>
            <div class="update-clear">
                <a class="btn btn-clear" href="{{ route('clearCart') }}">Clear Shopping Cart</a>
                <a class="btn btn-update" href="#">Update Shopping Cart</a>
            </div>
        </div>
    </div>
    <!--end main content area-->
</div>
<!--end container-->
@endsection

@section('myjs')
    <script>
    
        // $(document).on('click', '.btn-update', function(e){
        //     e.preventDefault();
        //     let elem = $('inputp[name="product-quatity"]');


        //     ids=[];
        //     quantities = [];
        //     $.each(elem, function(index, value){
        //         ids.push($(this).data('pid'));
        //         quantities.push($(value).val());
        //     });
        //     // console.log(ids);
        //     // console.log(quantities);

        //     $.ajax({
        //         type: "post",
        //         url: "{{ route('updateCart') }}",
        //         data: {
        //             ids: ids,
        //             quantities: quantities,
        //             _token: '{{ csrf_token() }}',
        //         },
        //         success: function (data) {
        //             alert('add product to cart successfully.');
        //             location.reload();
        //         }
        //     });
        // });

        $(document).on('click', '.btn-update', function(e){
		e.preventDefault();
		let elem = $('input[name="product-quatity"]');

		ids = [];
		quantities = [];
		$.each(elem,function(index, value){
			ids.push($(this).data('pid'));
			quantities.push($(value).val());
		});
		$.ajax({
			type: 'post',
			url: "{{ route('updateCart') }}",
			data: {
				ids: ids,
				quantities: quantities,
				_token : '{{ csrf_token() }}',

			}, success: function(data) {
				alert('update product cart successful.');
				location.reload();
			}
		});
	});

    // let minus = document.querySelector('.btn-reduce');
    // let increase = document.querySelector('.btn-increase');
    // increase.addEventListener('click',() => document.getElementById("number").textContent++);
    // minus.addEventListener('click',() => document.getElementById("number").textContent--);
    let number = document.querySelector('.number').textContent;
    let plus = document.querySelector('.btn-increase');
    let minus = document.querySelector('.btn-decrease');
    plus.addEventListener('click',() => {
     number++ ;
     document.querySelector('.number').textContent = number;
     console.log(number);
    });

    minus.addEventListener('click',() => {
     number--;
     document.querySelector('.number').textContent = number;
    }); 
    

    </script>
    
@endsection