<aside class="shop-sidebar">
    <div class="widget">
        <div class="sidebar-search">
            <form action="{{routes("search")}}"  target="_top"  method="get">
                <input type="text" name="label" placeholder="Search ..." value="{{request()->get("label")}}">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>
    <div class="widget">
        <h4 class="sidebar-title">Spécialités</h4>
        <div class="shop-cat-list">
            <ul>
                @foreach(\App\Models\Specialty::all() as $specialty)
                    <li>
                        <a href="{{$specialty->route()}}">{{$specialty->label}}
                            <span>+</span></a></li>
                @endforeach
            </ul>
        </div>
    </div>
    {{--                        <div class="widget">--}}
    {{--                            <h4 class="sidebar-title">Categories</h4>--}}
    {{--                            <div class="shop-brand-list">--}}
    {{--                                <ul>--}}
    {{--                                    @foreach(\App\Models\Category::all() as $category)--}}
    {{--                                        <li><a href="{{$category->route()}}">{{$category->label}}</a></li>--}}
    {{--                                    @endforeach--}}
    {{--                                </ul>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    <div class="widget" hidden>
        <h4 class="sidebar-title">Filter by Price</h4>
        <div class="price_filter">
            <div id="slider-range"></div>
            <div class="price_slider_amount">
                <span>Price :</span>
                <input type="text" id="amount" name="price" placeholder="Add Your Price"/>
                <input type="submit" class="btn" value="Filter">
            </div>
        </div>
    </div>
    <div class="widget shop-widget-banner">
        {{--        TODO ADD GOES HERE--}}
    </div>
</aside>
