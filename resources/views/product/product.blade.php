

            @foreach($products as $key => $product)
            <div class="col-lg-3 col-md-4 col-sm-6 mix women">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="">
                        <img src="{{$product->image}}" alt="">
                        <div class="label new">New</div>
                        <ul class="product__hover">
                            <li><a href="template/img/product/product-1.jpg" class="image-popup"><span class="arrow_expand"></span></a></li>
                            <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                            <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="/san-pham/{{ $product->id }}-{{ Str::slug($product->name, '-') }}.html">{{$product ->name}}</a></h6>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="product__price">{{$product->price}} $</div>
                    </div>
                </div>
            </div>
            @endforeach
