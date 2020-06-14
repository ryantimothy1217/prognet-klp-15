<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Sublime project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>BooShoes.com</title>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
<link href="{{asset('assets/css/mdb.min.css')}}" rel="stylesheet">
<link rel="shortcut icon" href="{{asset('assets/User/images/logo.png')}}" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/User/styles/bootstrap4/bootstrap.min.css')}}">
<link href="{{ asset('assets/User/plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/User/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/User/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/User/plugins/OwlCarousel2-2.2.1/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/User/styles/main_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/User/styles/responsive.css')}}">	
</head>

<body>
<div class="super_container">

	<!-- Header -->

	@extends('layouts.navbar')

	
	<!-- Home -->

	<div class="home">
		<div class="home_slider_container">
			
			<!-- Home Slider -->
			<div class="owl-carousel owl-theme home_slider">
				
				<!-- Slider Item -->
				<div class="owl-item home_slider_item">
					<div class="home_slider_background" style="background-image:url(assets/User/images/image2.jpg)"></div>
					<div class="home_slider_content_container">
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="home_slider_content"  data-animation-in="fadeIn" data-animation-out="animate-out fadeOut">
										<div class="home_slider_title">BooShoes</div>
										<div class="home_slider_subtitle">Sepatu Brand Originial</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Slider Item -->
				<div class="owl-item home_slider_item">
					<div class="home_slider_background" style="background-image:url(assets/User/images/image1.jpg)"></div>
					<div class="home_slider_content_container">
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="home_slider_content"  data-animation-in="fadeIn" data-animation-out="animate-out fadeOut">
										<div class="home_slider_title">Nike Shoes</div>
										<div class="home_slider_subtitle">Beli Sepatu Murah Hanya disini</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Slider Item -->
				<div class="owl-item home_slider_item">
					<div class="home_slider_background" style="background-image:url(assets/User/images/image3.jpg)"></div>
					<div class="home_slider_content_container">
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="home_slider_content"  data-animation-in="fadeIn" data-animation-out="animate-out fadeOut">
										<div class="home_slider_title">Nike Shoes</div>
										<div class="home_slider_subtitle">Sepatu Murah di BooShoes</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

			<!-- Home Slider Dots -->
			
			<div class="home_slider_dots_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="home_slider_dots">
								<ul id="home_slider_custom_dots" class="home_slider_custom_dots">
									<li class="home_slider_custom_dot active">01.</li>
									<li class="home_slider_custom_dot">02.</li>
									<li class="home_slider_custom_dot">03.</li>
								</ul>
							</div>
						</div>
					</div>
				</div>	
			</div>

		</div>
	</div>	 
	<!-- Products -->
	<hr class="mb-5">
	<div class="container">
		<div class="row">
			<div class="col-sm d-flex justify-content-center">
				<div class="form-group">
					<input class="form-check-input radiobtn" name="group100" type="radio" id="radio100" selected checked value="0">
					<label for="radio100" class="form-check-label dark-grey-text">All</label>
				</div>
			</div>
			  <input id="signup-token" name="_token" type="hidden" value="{{csrf_token()}}">
		  @foreach ($category as $item)
			  @if ($item->product->count())
				  <div class="col-sm d-flex justify-content-center">
					<div class="form-group">
						  <input class="form-check-input radiobtn" name="group100" type="radio" id="radio10{{$loop->iteration}}" value="{{$item->id}}">
						  <label for="radio10{{$loop->iteration}}" class="form-check-label dark-grey-text">{{$item->category_name}}</label>
					  </div>
				  </div>
			  @else
				  <input type="hidden" id="radio10{{$loop->iteration}}" class="radiobtn">
			  @endif
		  @endforeach
		</div>
	</div>
	<hr class="mb-5">
	<div class="ganti">
	<div class="products">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="product_grid">
						@foreach ($product as $products)
						<!-- Product -->
						<div class="product">
							@foreach ($products->product_image as $image)
							<div class="product_image"><img style="width:250px;height:250px;" src="/uploads/product_images/{{$image->image_name}}" alt=""></div>
								@break
							@endforeach
							@php
								$home = new Home;
                            	$disc = $home->tampildiskon($products->discount);
							@endphp
							@if($disc!=0)
								<div style="background-color:red;"class="product_extra product_new"><a href="categories.html">-{{$disc}}%</a></div>
							@endif
							<div class="product_content">
							<div class="product_title"><a href="/product/{{$products->id}}">{{$products->product_name}}</a></div>
							<span class="badge badge-primary mb-2">Rating: {{$products->product_rate}} <i class="fa fa-star"></i></span>
							<ul class="rating">
							@for ($i = 0; $i < $products->product_rate; $i++)
							<li>
							<i class="fas fa-star blue-text"></i>
							</li>
							@endfor
							@if($products->product_rate < 5)
							@for ($i = 0; $i < 5 - $products->product_rate; $i++)
							<li>
							<i class="fas fa-star grey-text"></i>
							</li>
							@endfor
							@endif
							</ul>
								</div>
						</div>
						@endforeach
				</div>
			</div>
		</div>
	</div>
	</div>
	</div>
	<hr class="mb-5">

	<!-- Ad -->
	<div class="avds_xl">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="avds_xl_container clearfix">
						<div class="avds_xl_background" style="background-image:url(assets/User/images/product_5.jpg)"></div>
						<div class="avds_xl_content">
							<div class="avds_title" style="font-size: 40px">BooShoes.com</div>
							<div class="avds_text">BooShoes</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Newsletter -->

	<div class="newsletter">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="newsletter_border"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="footer_overlay"></div>
	<footer class="footer">
		<div class="footer_background" style="background-image:url(images/footer.jpg)"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="footer_content d-flex flex-lg-row flex-column align-items-center justify-content-lg-start justify-content-center">
						<div class="footer_logo"><a href="#">BooShoes.com</a></div>
						<div class="copyright ml-auto mr-auto"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy; All rights reserved | by Kelompok 15<a href="#" target="_blank"></a></div>
						<div class="footer_social ml-lg-auto">
							<ul>
								<li><a href="https://www.instagram.com/milliniautami/?hl=id"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
								<li><a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>

<footer>
<script src="{{ asset('assets/User/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{ asset('assets/User/styles/bootstrap4/popper.js')}}"></script>
<script src="{{ asset('assets/User/styles/bootstrap4/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/User/plugins/greensock/TweenMax.min.js')  }}"></script>
<script src="{{ asset('assets/User/plugins/greensock/TimelineMax.min.js')  }}"></script>
<script src="{{ asset('assets/User/plugins/scrollmagic/ScrollMagic.min.js')  }}"></script>
<script src="{{ asset('assets/User/plugins/greensock/animation.gsap.min.js')  }}"></script>
<script src="{{ asset('assets/User/plugins/greensock/ScrollToPlugin.min.js')  }}"></script>
<script src="{{ asset('assets/User/plugins/OwlCarousel2-2.2.1/owl.carousel.js')  }}"></script>
<script src="{{ asset('assets/User/plugins/Isotope/isotope.pkgd.min.js')  }}"></script>
<script src="{{ asset('assets/User/plugins/easing/easing.js')  }}"></script>
<script src="{{ asset('assets/User/plugins/parallax-js-master/parallax.min.js')  }}"></script>
<script src="{{ asset('assets/User/js/custom.js')  }}"></script>
</footer>
<script>
    jQuery(document).ready(function(e){
        jQuery('.radiobtn').click(function(e){
            var index = $('.radiobtn').index(this);
            console.log(jQuery('#radio10'+index).val());
            jQuery.ajax({
                url: "{{url('/show_categori')}}",
                method: 'post',
                data: {
                    _token: $('#signup-token').val(),
                    id: jQuery('#radio10'+index).val(),
                },
                success: function(result){
                    $('.ganti').html(result.hasil);
                }
            });
        });

        jQuery('#search').keyup(function(e){
          var isi = $('#search').val();
          jQuery.ajax({
                url: "{{url('/show_categori')}}",
                method: 'post',
                data: {
                    _token: $('#signup-token').val(),
                    id: -1,
                    cari: isi 
                },
                success: function(result){
                    $('.ganti').html(result.hasil);
                }
            });
        });
    });
	
</script>

</body>
</html>
