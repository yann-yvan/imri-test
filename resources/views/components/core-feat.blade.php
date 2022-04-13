<div class="row category-active mb-70 slick-initialized slick-slider">
    <div class="slick-list draggable">
        <div class="slick-track" style="opacity: 1; width: 1184px; transform: translate3d(0px, 0px, 0px);">
            @foreach(\App\Models\Drug::inRandomOrder()->limit(8)->get() as $key=>$drug)
            <div class="col slick-slide slick-active" style="width: 148px;" tabindex="0" data-slick-index="{{$key}}"
                 aria-hidden="false">
                <div class="category-item">
                    <a href="{{$drug->route()}}" tabindex="0">
                        <amp-img src="{{$drug->img}}" height="50" width="50" alt="{{$drug->label}}" layout="responsive"></amp-img>
                        <span class="content">{{$drug->label}}</span>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
