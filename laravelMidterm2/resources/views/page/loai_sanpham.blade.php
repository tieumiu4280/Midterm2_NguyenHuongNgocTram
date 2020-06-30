@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản phẩm {{$loai_sp->name}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="index.html">Home</a>/<span>Sản phẩm </span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="aside-menu">
							@foreach($loai as $l)
								<li><a href="{{route('loai_sanpham',$l->id)}}">{{$l->name}}</a></li>
							@endforeach
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4>New Product</h4>
							<div class="beta-products-details">
								<p class="pull-left">{{count((array)$sp_theoloai)}}</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@foreach($sp_theoloai as $sptl)
								<div class="col-sm-3">
									<div class="single-item">
										@if($sptl->promotion_price!=0)
										<div class="ribbon-wrapper">
											<div class="ribbon sale">
												Sale
											</div>
										</div>
										@endif
										<div class="single-item-header">
											<a href="product.html"><img src="source/image/product/{{$sptl->image}}" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$sptl->name}}</p>
											<p class="single-item-price">
												@if($sptl->promotion_price==0)
												<span class="flash-sale">{{$sptl->unit_price}} dong </span>
												@else
												<span class="flash-del">{{$sptl->unit_price}} dong </span>
												<span class="flash-sale">{{$sptl->promotion_price}} dong</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
						<div class="space50">&nbsp;</div>
						<div class="beta-products-list">
							<h4>Top Product -San Pham Khac</h4>
							<div class="beta-products-details">
								<p class="pull-left">{{count((array)$sp_khac)}}</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@foreach($sp_khac as $spk)
								<div class="col-sm-3">
									<div class="single-item">
										@if($spk->promotion_price!=0)
										<div class="ribbon-wrapper">
											<div class="ribbon sale">
												I love you
											</div>
										</div>
										@endif
										<div class="single-item-header">
											<a href="product.html"><img src="source/image/product/{{$spk->image}}" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$spk->name}}</p>
											<p class="single-item-price">
												@if($spk->promotion_price==0)
												<span class="flash-sale">{{$spk->unit_price}} dong </span>
												@else
												<span class="flash-del">{{$spk->unit_price}} dong </span>
												<span class="flash-sale">{{$spk->promotion_price}} dong</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
							<div class="space40">&nbsp;</div>
							
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection