@extends('master')
@section('content')
<div class="inner-header">
	<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản Phẩm {{route('chitiet_sanpham',$sanpham->name)}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trang_chu')}}">Trang Chủ</a> / <span>Thông tin chi tiết sản phẩm </span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">
					<div class="row">
						<div class="col-sm-4">
							<img src="source/image/product/{{$sanpham->image}}" alt="">
						</div>
						<div class="col-sm-8">
							<div class="single-item-body">
								<p class="single-item-title">{{$sanpham->name}}</p>
								<p class="single-item-price">
									@if($sanpham->promotion_price==0)
										<span class="flash-sale">{{number_format($sanpham->unit_price)}} dong </span>
									@else
										<span class="flash-del">{{number_format($sanpham->unit_price)}} dong </span>
										<span class="flash-sale">{{number_format($sanpham->promotion_price)}} dong</span>
									@endif
								</p>
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>

							<div class="single-item-desc">
								<p>{{$sanpham->description}}</p>
							</div>
							<div class="space20">&nbsp;</div>

							<p>Options:</p>
							<div class="single-item-options">
								<p>{{$sanpham->description}}</p>
								<a class="add-to-cart" href="#"><i class="fa fa-shopping-cart"></i></a>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="#tab-description">Description</a></li>
							<li><a href="#tab-reviews">Reviews (0)</a></li>
						</ul>

						<div class="panel" id="tab-description">
							<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet.</p>
							<p>Consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequaturuis autem vel eum iure reprehenderit qui in ea voluptate velit es quam nihil molestiae consequr, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? </p>
						</div>
						<div class="panel" id="tab-reviews">
							<p>No Reviews</p>
						</div>
					</div>
					<div class="space50">&nbsp;</div>
					<div class="beta-products-list">
						<h4>Related Products -Sản Phẩm tương tự </h4>
						<div class="row">
							@foreach($sp_tuongtu as $sptt)
							<div class="col-sm-4">
								<div class="single-item">
									@if($sptt->promotion_price!=0)
										<div class="ribbon-wrapper">
											<div class="ribbon sale">
												I love you
											</div>
										</div>
										@endif
									<div class="single-item-header">
										<a href="{{route('chitiet_sanpham',$sptt->id)}}"><img src="source/image/product/{{$sptt->image}}" alt=""></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$sptt->name}}</p>
										<p class="single-item-price">
											@if($sptt->promotion_price==0)
											<span class="flash-sale">{{$sptt->unit_price}} dong </span>
											@else
											<span class="flash-del">{{$sptt->unit_price}} dong </span>
											<span class="flash-sale">{{$sptt->promotion_price}} dong</span>
											@endif
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="product.html"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
						<div class="row">{{$sp_tuongtu->links()}}</div>
					</div> <!-- .beta-products-list -->
				</div>
				<div class="col-sm-3 aside">
					<div class="widget">
						<h3 class="widget-title">Best Sellers</h3>
						<div class="widget-body">
							@foreach($sp_banchay as $spbc)
							<div class="col-sm-4">
								<div class="single-item">
									@if($spbc->promotion_price!=0)
										<div class="ribbon-wrapper">
											<div class="ribbon sale">
												I love you
											</div>
										</div>
										@endif
									<div class="single-item-header">
										<a href="{{route('chitiet_sanpham',$spbc->id)}}"><img src="source/image/product/{{$spbc->image}}" alt=""></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$spbc->name}}</p>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
					</div> <!-- best sellers widget -->
					<div class="widget">
						<h3 class="widget-title">New Products</h3>
						<div class="widget-body">
							@foreach($sp_new as $spn)
								<div class="col-sm-3">
									<div class="single-item">
										@if($spn->promotion_price!=0)
										<div class="ribbon-wrapper">
											<div class="ribbon sale">
												I love you
											</div>
										</div>
										@endif
										<div class="single-item-header">
											<a href="{{route('chitiet_sanpham',$spn->id)}}"><img src="source/image/product/{{$spn->image}}" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$spn->name}}</p>
										</div>
									</div>
								</div>
								@endforeach
						</div>
					</div> <!-- best sellers widget -->
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
	@endsection