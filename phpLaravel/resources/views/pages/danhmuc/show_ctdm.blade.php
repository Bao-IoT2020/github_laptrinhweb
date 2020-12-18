@extends('index')
@section('content')

<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
					<!--danhmuc-->
					<div class="brands_products"><!--brands_products-->
							<h2>Danh Mục Sản Phẩm (<?php echo count($danhmuc); ?>) </h2>
							@foreach($danhmuc as $keys => $dm)
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									<li>
										<a href="{{URL::to('/danh-muc-san-pham/'.$dm->sanpham_id)}}"> 
											<span class="pull-right"></span>{{$dm->sanpham_name}}
										</a>
									</li>
								</ul>
							</div>
							@endforeach
						</div><!--/brands_products-->
					<!--thuonghieu-->
						<div class="brands_products"><!--brands_products-->
							<h2>Thương Hiệu Sản Phẩm  (<?php echo count($thuonghieu); ?>) </h2>
							@foreach($thuonghieu as $keys => $th)
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									<li>
										<a href="{{URL::to('/thuong-hieu-san-pham/'.$th->thuonghieu_id)}}"> 
											<span class="pull-right"></span>{{$th->thuonghieu_name}}
										</a>
									</li>
								</ul>
							</div>
							@endforeach
						</div><!--/brands_products-->
						
					</div>
				</div>
				
                <div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
					@foreach($category_by_id as $keys => $sp)@endforeach
					<h2 class="title text-center"> <?php echo ($sp->sanpham_name); ?> (<?php echo count($category_by_id); ?>) </h2>
					
					@foreach($category_by_id as $keys => $sp)
					<a href="{{URL::to('/chi-tiet-san-pham/'.$sp->sanpham_chinh_id)}}">
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{asset('public/image/sanpham/'.$sp->sanpham_chinh_image)}}" alt="" />
											<h2>{{number_format($sp->sanpham_chinh_price) . ' VNĐ'}}</h2>
											<p>{{$sp->sanpham_chinh_name}}</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Yêu Thích</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>So Sánh</a></li>
									</ul>
								</div>
							</div>
                        </div>
					</a>
                    @endforeach
					
                    </div>	
                </div>
           
            </div>
		</div>
    </section>
    
@endsection