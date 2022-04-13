@extends('layouts.default')

@section('meta')
    @include('components.meta',[
    'title'=>$drug->title(),
    'description'=>$drug->description(),
    'link'=>$drug->route(),
    'image'=>$drug->image
    ])
@endsection

@section("content")

    <!-- breadcrumb-area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Accueil</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a href="{{routes("search")}}">Recherche</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{$drug->label}}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area-end -->

    <!-- shop-details-area -->
    <div class="shop-details-area shop-inner-page pt-100 pb-95">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-3 order-2 order-lg-0">
                    @include("components.shop-aside")
                </div>
                <div class="col-9">
                    <div class="shop-details-wrap">
                        <div class="row">
                            <div class="col-7">
                                <div class="shop-details-img-wrap">
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane show active" id="item-one" role="tabpanel"
                                             aria-labelledby="item-one-tab">
                                            <div class="shop-details-img">
                                                <amp-img src="{{$drug->image}}" height="150" width="150"
                                                         layout="responsive" alt="{{$drug->label}}"></amp-img>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="shop-details-nav-wrap" hidden>
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" id="item-one-tab" data-toggle="tab"
                                               href="#item-one" role="tab" aria-controls="item-one"
                                               aria-selected="true">
                                                <amp-img src="{{$drug->image}}" height="100" width="100" layout="responsive"
                                                         alt="{{$drug->label}}"></amp-img>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="shop-details-content">
                                    <span>{{$drug->conditioning}}</span>
                                    <h2 class="title">{{$drug->label}}</h2>
                                    <div class="shop-details-review">
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <span>( 01 Review )</span>
                                    </div>
                                    <p>{{$drug->shape->label}}</p>
                                    <div class="shop-details-dimension">
                                        <span>Molecule :</span>
                                        <ul>
                                            <li class="active"><a href="#">{{$drug->molecule->label}}</a></li>
                                        </ul>
                                    </div>
                                    <div class="shop-details-color" hidden>
                                        <span>Color :</span>
                                        <ul>
                                            <li class="active"></li>
                                            <li class="black"></li>
                                            <li class="green"></li>
                                            <li class="blue"></li>
                                        </ul>
                                    </div>

                                    <div class="shop-details-bottom">
                                        <ul>
                                            <li class="sd-category">
                                                <span class="title">Catégories :</span>
                                                @foreach($drug->categories as $category)
                                                    <a href="{{$category->route()}}">{{$category->label}}</a>
                                                @endforeach
                                            </li>
                                            <li class="sd-sku">
                                                <span class="title">Spécialité :</span>
                                                <a href="{{$drug->specialty->route()}}">{{$drug->specialty->label}}</a>
                                            </li>
                                            <li class="sd-share">
                                                <span class="title">Share Now :</span>
                                                <a target="_blank"
                                                   href="https://www.facebook.com/sharer/sharer.php?u={{$drug->route()}}"><i
                                                        class="fab fa-facebook-f"></i></a>
                                                <a target="_blank"
                                                   href="https://twitter.com/intent/tweet?text={{urlencode($drug->label)}}&url={{$drug->route()}}"><i
                                                        class="fab fa-twitter"></i></a>
                                                <a target="_blank"
                                                   href="https://www.linkedin.com/shareArticle?mini=true&url={{$drug->route()}}&title={{urlencode($drug->label)}}&summary="><i
                                                        class="fab fa-linkedin-in"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-desc-wrap">
                            <ul class="nav nav-tabs" id="myTabTwo" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="details-tab" data-toggle="tab" href="#details"
                                       role="tab" aria-controls="details" aria-selected="true">Posologie</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="val-tab" data-toggle="tab" href="#val" role="tab"
                                       aria-controls="val" aria-selected="false">Information</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab"
                                       aria-controls="review" aria-selected="false">Reviews (0)</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContentTwo">
                                <div class="tab-pane fade show active" id="details" role="tabpanel"
                                     aria-labelledby="details-tab">
                                    <div class="product-desc-content">
                                        <p> {!! \Illuminate\Support\Str::replace(["\r"],"<br>",$drug->dosage) !!}</p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="val" role="tabpanel" aria-labelledby="val-tab">
                                    <div class="product-desc-info">
                                        <div class="row">
                                            <div class="col-xl-4 col-md-5">
                                                <div class="product-desc-img">
                                                    <amp-img src="{{$drug->image}}" height="200" width="200"
                                                             layout="responsive" alt="{{$drug->label}}"></amp-img>
                                                </div>
                                            </div>
                                            <div class="col-xl-8 col-md-7">
                                                <h5 class="small-title">{{$drug->molecule->label}}</h5>
                                                <p>{{$drug->shape->label}}</p>
                                                <p>{{$drug->specialty->label}}</p>
                                                <ul class="product-desc-list">
                                                    @foreach($drug->categories as $category)
                                                        <li>{{$category->label}}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                                    <div class="product-desc-review">
                                        <div class="review-title mb-20">
                                            <h4 class="title">Customer Reviews (0)</h4>
                                        </div>
                                        <div class="left-rc">
                                            <p>No reviews yet</p>
                                        </div>
                                        <div class="right-rc">
                                            <a href="#">Write a review</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="related-products-wrap shop-wrap">
                            <h4 class="title">Médicament ayant la même molécule</h4>
                            <div class="row related-product-active shop-active">
                                @foreach($similar as $drug)
                                    @include("components.drug-item",["drug"=>$drug,"mb"=>""])
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- shop-details-area-end -->

    <!-- core-features-area -->
    <section class="core-features-area">
        <div class="container">
            {{--            @include("components.core-feat")--}}
        </div>
    </section>
    <!-- core-features-area-end -->
@endsection
