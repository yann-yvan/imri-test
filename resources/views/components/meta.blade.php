<!-- Primary Meta Tags -->
<title>{{$title??"The Drugs — ".seo('meta.title')}}</title>
<meta name="title" content="The Drugs — {{$title??seo('meta.title')}}">
<meta name="description" content="{{$description??seo('meta.seo-desc')}}">
<meta name="keywords" content="{{$keyword??seo('meta.seo-keyword')}}">

<link rel="shortlink" href="{{$link??env("APP_URL")}}">
<link rel="canonical" href="{{$link??env("APP_URL")}}">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="{{$link??env('APP_URL')}}">
<meta property="og:title" content="The Drugs — {{$title??seo('meta.title')}}">
<meta property="og:description" content="{{$description??seo('meta.seo-desc')}}">
<meta property="og:image" content="{{$image??asset('themes/img/cover.png')}}">
<meta property="fb:app_id" content="2377366382510311">
<meta property="fb:pages" content="362210741073502"/>

<!-- Twitter -->
<meta property="twitter:card" content="{{$image??asset('themes/img/cover.png')}}">
<meta property="twitter:url" content="{{$link??env("APP_URL")}}">
<meta property="twitter:title" content="The Drugs — {{$title??seo('meta.title')}}">
<meta property="twitter:description" content="{{$description??seo('meta.seo-desc')}}">
<meta property="twitter:image" content="{{$image??asset('themes/img/cover.png')}}">
<meta name="author" content="{{env("APP_NAME")}}">

<meta name="twitter:card" content="summary"/>
{{--<meta name="twitter:site" content="@nytimesbits" />
<meta name="twitter:creator" content="@nickbilton" />--}}
