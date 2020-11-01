<div class="side-bar col-md-3">
    <div class="search-hotel">
        <h3 class="agileits-sear-head">Search Here..</h3>
        <form action="#" method="post">
            <input type="search" placeholder="Product name..." name="search" required="">
            <input type="submit" value=" ">
        </form>
    </div>
    <!-- price range -->
    <div class="range">
        <h3 class="agileits-sear-head">Price range</h3>
        <ul class="dropdown-menu6">
            <li>

                <div id="slider-range"></div>
                <input type="text" id="amount" style="border: 0; color: #ffffff; font-weight: normal;" />
            </li>
        </ul>
    </div>
    <!-- //price range -->
    <!-- food preference -->
    <div class="left-side">
        <h3 class="agileits-sear-head">Food Preference</h3>
        <ul>
            <li>
                <input type="checkbox" class="checked">
                <span class="span">Vegetarian</span>
            </li>
            <li>
                <input type="checkbox" class="checked">
                <span class="span">Non-Vegetarian</span>
            </li>
        </ul>
    </div>
    <!-- //food preference -->
    <!-- discounts -->
    <div class="left-side">
        <h3 class="agileits-sear-head">Discount</h3>
        <ul>
            <li>
                <input type="checkbox" class="checked">
                <span class="span">5% or More</span>
            </li>
            <li>
                <input type="checkbox" class="checked">
                <span class="span">10% or More</span>
            </li>
            <li>
                <input type="checkbox" class="checked">
                <span class="span">20% or More</span>
            </li>
            <li>
                <input type="checkbox" class="checked">
                <span class="span">30% or More</span>
            </li>
            <li>
                <input type="checkbox" class="checked">
                <span class="span">50% or More</span>
            </li>
            <li>
                <input type="checkbox" class="checked">
                <span class="span">60% or More</span>
            </li>
        </ul>
    </div>
    <!-- //discounts -->
    <!-- reviews -->
    <div class="customer-rev left-side">
        <h3 class="agileits-sear-head">Customer Review</h3>
        <ul>
            <li>
                <a href="#">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <span>5.0</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                    <span>4.0</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star-half-o" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                    <span>3.5</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                    <span>3.0</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star-half-o" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                    <span>2.5</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- //reviews -->
    <!-- deals -->
    <div class="deal-leftmk left-side">
        <h3 class="agileits-sear-head">Special Deals</h3>
        @forelse ($products as $item)
            <div class="special-sec1">
                <div class="col-xs-4 img-deals">
                    <img src="{{ asset('storage/image/product/'.$item->image) }}" width="100%" alt="{{ $item->name }}">
                </div>
                <div class="col-xs-8 img-deal1">
                    <h3>{{ $item->name }}</h3>
                    <a href="single.html">Rp.  {{ number_format($item->price) }}</a>
                </div>
                <div class="clearfix"></div>
            </div>
        @empty
            
        @endforelse
    </div>
    <!-- //deals -->
</div>