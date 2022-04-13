@extends('layouts.default')

@section("script")
{!! \App\Models\Drug::filAriane($drugs) !!}
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
                                <li class="breadcrumb-item active" aria-current="page">Recherche</li>
                                <li class="breadcrumb-item active" aria-current="page">{{request()->get("label")}}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area-end -->

    <!-- shop-area -->
    <div class="shop-area shop-inner-page pt-100 pb-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-3 order-2 order-lg-0">
                    @include("components.shop-aside")
                </div>
                <div class="col-9">
                    <div class="shop-wrap">
                        <div class="shop-page-meta mb-30">
                            <div class="shop-grid-menu">
                                <ul>
                                    <li class="active"><a href="#"><i class="fas fa-th"></i></a></li>
                                </ul>
                            </div>
                            <div class="shop-showing-result">
                                <p>Environ {{$drugs->total()}} résultats</p>
                            </div>
                            <div class="shop-show-list" hidden>
                                <form action="{{routes("search")}}" method="get"  target="_top">
                                    <label for="show">Show</label>
                                    <select id="show" class="selected" name="perPage">
                                        <option value="">50</option>
                                        <option value="">12</option>
                                        <option value="">16</option>
                                        <option value="">18</option>
                                        <option value="">20</option>
                                    </select>
                                </form>
                            </div>
                            <div class="shop-short-by">
                                <form action="{{routes("search")}}" method="get"   target="_top">
                                    <label for="shortBy">Sort By</label>
                                    <select id="shortBy" class="selected">
                                        <option value="">Sort by latest</option>
                                        <option value="">Low to high</option>
                                        <option value="">High to low</option>
                                        <option value="">Popularity</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            @forelse($drugs->items() as $drug)
                                @include("components.drug-item",["drug"=>$drug,"mb"=>45])
                            @empty

                            @endforelse
                        </div>
                        <div class="shop-page-meta">
                            <div class="shop-grid-menu">
                                <ul>
                                    <li class="active"><a href="#"><i class="fas fa-th"></i></a></li>
                                </ul>
                            </div>
                            <div class="shop-showing-result">
                                <p>Total résultats {{$drugs->total()}}</p>
                            </div>


                            <div class="shop-pagination" hidden>
                                {{$drugs->appends(['label' => request()->query("label")])->render()}}
                                <ul>
                                    <li class="active"><a href="shop.html">1</a></li>
                                    <li><a href="shop.html">2</a></li>
                                    <li><a href="shop.html"><i class="fas fa-angle-double-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- shop-area-end -->

    <!-- core-features-area -->
    <section class="core-features-area">
        <div class="container">
{{--            @include("components.core-feat")--}}
        </div>
    </section>
    <!-- core-features-area-end -->

@endsection
