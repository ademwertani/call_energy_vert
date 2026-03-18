@php
use App\Models\Banner;
use Illuminate\Support\Str;

$banners = Banner::orderBy('created_at')->take(10)->get();

if ($banners->isEmpty()) {
    $banners = collect([
        (object)[
            'title' => 'Call Énergie Vert',
            'image' => 'img/hero-bg-energy.png',
            'summary' => 'Votre partenaire de confiance en relation client & externalisation',
            'description' => 'Centre de contact offshore et acteur BPO spécialisé dans la gestion de la relation client et les services liés à l’énergie.',
        ]
    ]);
}

$homeBanner = $banners->first();
$secteurBanners = $banners->slice(1)->values();

if ($secteurBanners->isEmpty()) {
    $secteurBanners = collect([$homeBanner]);
}

function heroImage($image) {
    if (!$image) {
        return asset('img/hero-bg-energy.png');
    }

    if (Str::startsWith($image, ['http://','https://'])) {
        return $image;
    }

    if (Str::startsWith($image,'img/')) {
        return asset($image);
    }

    return asset('storage/' . ltrim($image,'/'));
}
@endphp

<style>
.pb-hero,
.pb-slide{
    width:100%;
    height:680px;
    min-height:600px;
    display:flex;
    align-items:center;
    justify-content:center;
    color:#fff;
    background-size:cover;
    background-position:center;
    background-repeat:no-repeat;
}

.pb-hero__inner{
    max-width:900px;
    padding:0 24px;
}

/* HOME */
.pb-hero__inner--home{
    text-align:center;
}

.pb-title-home{
    font-size:72px;
    font-weight:900;
    line-height:1.05;
    margin-bottom:18px;
    color:#fff;
    text-shadow:0 4px 30px rgba(0,0,0,.6);
}

.pb-summary-home{
    font-size:18px;
    font-weight:500;
    line-height:1.6;
    margin-bottom:28px;
    color:#fff;
    text-shadow:0 2px 18px rgba(0,0,0,.45);
}

.pb-desc-home{
    font-size:16px;
    line-height:1.7;
    margin-bottom:35px;
    color:#f7f7f7;
}

/* SECTEURS */
.pb-hero__inner--secteurs{
    text-align:left;
    margin-left:0;
    margin-right:auto;
    max-width:860px;
}

.pb-title-secteur{
    font-size:70px;
    font-weight:900;
    line-height:1.02;
    margin:0 0 14px 0;
    color:#fff;
    text-shadow:0 4px 30px rgba(0,0,0,.6);
}

.pb-summary-secteur{
    font-size:20px;
    font-weight:500;
    line-height:1.6;
    margin:0;
    color:#d1d5db;
    text-shadow:0 2px 14px rgba(0,0,0,.35);
}

.pb-hero__buttons{
    display:flex;
    justify-content:center;
    gap:20px;
    flex-wrap:wrap;
}

.pb-btn{
    padding:16px 40px;
    border-radius:40px;
    text-decoration:none;
    font-weight:700;
    background:#fff;
    color:#7CAE2A;
    transition:.3s;
    display:inline-block;
}

.pb-btn:hover{
    transform:translateY(-3px);
    color:#7CAE2A;
}

#secteursCarousel .carousel-item{
    transition:opacity 1s ease-in-out;
}

@media(max-width:992px){
    .pb-title-home{
        font-size:56px;
    }

    .pb-title-secteur{
        font-size:54px;
    }

    .pb-summary-secteur{
        font-size:18px;
    }
}

@media(max-width:768px){
    .pb-title-home{
        font-size:40px;
    }

    .pb-summary-home{
        font-size:16px;
    }

    .pb-desc-home{
        font-size:14px;
    }

    .pb-title-secteur{
        font-size:40px;
    }

    .pb-summary-secteur{
        font-size:16px;
    }

    .pb-hero,
    .pb-slide{
        height:500px;
        min-height:460px;
    }

    .pb-hero__buttons{
        gap:12px;
    }

    .pb-btn{
        padding:14px 28px;
    }
}

@media(max-width:576px){
    .pb-title-home{
        font-size:32px;
    }

    .pb-title-secteur{
        font-size:32px;
    }

    .pb-summary-home,
    .pb-summary-secteur{
        font-size:14px;
    }
}
</style>

<section class="page-blog">

{{-- ================= HOME ================= --}}
@if(request()->routeIs('home'))
<header class="pb-hero" style="background-image:url('{{ heroImage($homeBanner->image) }}')">
    <div class="pb-hero__inner pb-hero__inner--home">

        <h1 class="pb-title-home">{{ $homeBanner->title }}</h1>

        @if($homeBanner->summary)
            <p class="pb-summary-home">{{ $homeBanner->summary }}</p>
        @endif

        <div class="pb-hero__buttons">
            <a href="{{ route('contact.create') }}" class="pb-btn">Nous contacter</a>
            <a href="{{ route('services.index') }}" class="pb-btn">Nos services</a>
        </div>

    </div>
</header>
@endif

{{-- ================= SECTEURS ================= --}}
@if(request()->routeIs('projects.sectors'))
<div id="secteursCarousel"
class="carousel slide carousel-fade"
data-bs-ride="carousel"
data-bs-interval="5000"
data-bs-pause="false">

    <div class="carousel-inner">
        @foreach($secteurBanners as $index => $banner)
            <div class="carousel-item {{ $index==0 ? 'active' : '' }}">
                <div class="pb-slide" style="background-image:url('{{ heroImage($banner->image) }}')">
                    <div class="pb-hero__inner pb-hero__inner--secteurs">

                        <h1 class="pb-title-secteur">{{ $banner->title }}</h1>

                        @if($banner->summary)
                            <p class="pb-summary-secteur">{{ $banner->summary }}</p>
                        @endif

                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>
@endif

</section>