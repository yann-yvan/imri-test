<div class="col">
    <div class="shop-item shop-item-border {{$mb??"mb-60"}}">
        <div class="shop-thumb">
            <a href="{{$drug->route()}}">
                <amp-img src="{{$drug->image}}" alt="{{$drug->label}}" height="200" layout="fixed-height"></amp-img>
            </a>
        </div>
        <div class="shop-content">
            <span class="cat">{{$drug->specialty->label}}</span>
            <h5 class="title"><a href="{{$drug->route()}}">{{$drug->label}}</a></h5>
            <div class="shop-item-rating">
                <span class="avg-rating">{{$drug->molecule->label}} </span>
            </div>
            <p class="shop-discount">{{$drug->conditioning}}</p>
            <div class="shop-bottom">
                <ul>
                    <li></li>
                    <li class="add"><a href="{{$drug->route()}}">VOIR +</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
