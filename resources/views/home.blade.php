@extends('layouts.app')

@section('title', 'Call energie vert - Accueil')

@section('content')

<style>
    /* ====== BLOG EXACT DESIGN ====== */
.av-blog-section{
    background:#ffffff;
    padding:40px 0 0;
}

.av-blog-wrapper{
    position:relative;
    border:1.5px solid #39d12f;
    padding:40px 28px 28px;
    margin-top:40px;
}

.av-blog-title{
    position:absolute;
    top:-34px;
    left:50%;
    transform:translateX(-50%);
    background:#ffffff;
    color:#39d12f;
    font-size:42px;
    font-weight:800;
    text-transform:uppercase;
    line-height:1;
    padding:0 48px;
    margin:0;
    letter-spacing:1px;
}

.av-blog-grid{
    display:grid;
    grid-template-columns: 360px 1fr;
    gap:10px;
    align-items:stretch;
}

/* image verticale gauche */
.av-blog-left{
    height:640px;
    overflow:hidden;
}

.av-blog-left img{
    width:100%;
    height:100%;
    object-fit:cover;
    display:block;
}

/* colonne droite */
.av-blog-right{
    display:flex;
    flex-direction:column;
    gap:18px;
}

.av-blog-item{
    display:grid;
    grid-template-columns: 470px 1fr;
    background:#e9e9e9;
    min-height:311px;
    overflow:hidden;
}

.av-blog-item-image{
    height:311px;
}

.av-blog-item-image img{
    width:100%;
    height:100%;
    object-fit:cover;
    display:block;
}

.av-blog-item-content{
    padding:42px 40px 28px 40px;
    display:flex;
    flex-direction:column;
    justify-content:space-between;
}

.av-blog-item-title{
    margin:0 0 24px;
    color:#54bf48;
    font-size:22px;
    font-weight:800;
    line-height:1.35;
}

.av-blog-item-text{
    margin:0;
    color:#222;
    font-size:15px;
    line-height:1.85;
    max-width:95%;
}

.av-blog-item-footer{
    display:flex;
    justify-content:flex-end;
    margin-top:28px;
}

.av-blog-readmore{
    display:inline-flex;
    align-items:center;
    justify-content:center;
    min-width:118px;
    height:40px;
    padding:0 18px;
    border:1.5px solid #54bf48;
    border-radius:12px;
    color:#54bf48;
    text-decoration:none;
    font-size:16px;
    font-weight:700;
    transition:all .2s ease;
    background:transparent;
}

.av-blog-readmore:hover{
    background:#54bf48;
    color:#fff;
}

/* Responsive */
@media (max-width: 1400px){
    .av-blog-item{
        grid-template-columns: 380px 1fr;
    }
}

@media (max-width: 1200px){
    .av-blog-grid{
        grid-template-columns:1fr;
    }

    .av-blog-left{
        height:360px;
    }
}

@media (max-width: 992px){
    .av-blog-item{
        grid-template-columns:1fr;
    }

    .av-blog-item-image{
        height:260px;
    }

    .av-blog-item-content{
        padding:26px 22px;
    }
}

@media (max-width: 576px){
    .av-blog-wrapper{
        padding:30px 14px 14px;
    }

    .av-blog-title{
        font-size:28px;
        top:-20px;
        padding:0 20px;
    }

    .av-blog-left{
        height:260px;
    }
}
    /* ====== Pourquoi nous choisir ====== */
/* ====== Pourquoi nous choisir ====== */
.av-why-section{
    background:#F9F9F9;
    padding:60px 0;
}

.av-why-title{
    text-align:center;
    color:#4CAF50;
    font-size:36px;
    font-weight:800;
    margin-bottom:30px;
}

.av-why-image{
    display:flex;
    justify-content:center;
    align-items:center;
    background:#F9F9F9;
    padding:20px;
    border-radius:20px;
}

.av-why-image img{
    max-width:100%;
    height:auto;
    display:block;
    background:#F9F9F9;
}
    /* ====== About text ====== */
    .av-about-text{
        max-width:900px;
        margin:auto;
        font-size:20px;
        color:#555;
        line-height:1.8;
    }

    /* ====== Global ====== */
    .av-section { padding: 60px 0; }

    .av-bg-dark{
        background:#fff;
        color:#000;
    }

    .av-title-top{
        text-align:center;
        font-weight:800;
        letter-spacing:1px;
        color:#4CAF50;
        margin-bottom:30px;
        text-transform:uppercase;
    }

    /* ====== Valeurs ====== */
    .av-values-wrap{
        background:#F8F8F8;
        padding:50px 0;
        border-top:2px solid #fff;
        border-bottom:2px solid #fff;
    }

    .av-values-title{
        text-align:center;
        color:#4CAF50;
        font-size:42px;
        font-weight:800;
        margin-bottom:30px;
    }

    .av-values-list{
        display:flex;
        gap:30px;
        justify-content:center;
        flex-wrap:wrap;
        margin:0;
        padding:0;
        list-style:none;
    }

    .av-values-list li{
        font-size:18px;
        color:#111;
        font-weight:600;
        display:flex;
        align-items:center;
        gap:10px;
        min-width:160px;
        justify-content:center;
    }

    .av-check{
        color:#4CAF50;
        font-weight:900;
        font-size:18px;
    }

    /* ====== Services ====== */
    .av-services-title{
        text-align:center;
        color:#4CAF50;
        font-size:42px;
        font-weight:800;
        margin-bottom:40px;
        text-transform:none;
    }

    .av-services-grid{
        display:grid;
        grid-template-columns:repeat(5, minmax(0, 1fr));
        gap:22px;
        max-width:1200px;
        margin:0 auto;
    }

    @media (max-width: 1200px){ .av-services-grid{ grid-template-columns:repeat(3, minmax(0, 1fr)); } }
    @media (max-width: 768px){ .av-services-grid{ grid-template-columns:repeat(2, minmax(0, 1fr)); } }
    @media (max-width: 480px){ .av-services-grid{ grid-template-columns:1fr; } }

    .av-service-card{
        border-radius:18px;
        border:2px solid #4CAF50;
        padding:18px;
        min-height:190px;
        background:transparent;
        position:relative;
        box-shadow:0 0 20px rgba(76,175,80,.25);
        transition:transform .2s ease, box-shadow .2s ease;
        display:flex;
        flex-direction:column;
        gap:10px;
        justify-content:center;
        text-align:center;
    }

    .av-service-card:hover{
        transform:translateY(-4px);
        box-shadow:0 0 35px rgba(76,175,80,.45);
    }

    .av-service-icon{
        font-size:34px;
        line-height:1;
        margin-bottom:4px;
    }

    .av-service-title{
        font-weight:800;
        font-size:18px;
        margin:0;
        color:#111;
    }

    .av-service-desc{
        font-size:14px;
        opacity:.85;
        margin:0;
        color:#333;
    }

    /* ====== Partenaires (inchangé, si tu veux le garder) ====== */
    .av-partners-title{
        text-align:center;
        color:#4CAF50;
        font-size:36px;
        font-weight:900;
        margin:60px 0 25px;
        text-transform:uppercase;
    }

    .av-partners-grid{
        display:grid;
        grid-template-columns:repeat(5, minmax(0, 1fr));
        gap:16px;
        max-width:1100px;
        margin:0 auto;
    }

    @media (max-width: 1200px){ .av-partners-grid{ grid-template-columns:repeat(4, minmax(0, 1fr)); } }
    @media (max-width: 768px){ .av-partners-grid{ grid-template-columns:repeat(2, minmax(0, 1fr)); } }

    .av-partner{
        border:1px solid rgba(76,175,80,.35);
        border-radius:14px;
        padding:16px;
        display:flex;
        align-items:center;
        justify-content:center;
        background:rgba(255,255,255,.03);
        min-height:90px;
    }

    .av-partner img{
        max-width:100%;
        max-height:55px;
        object-fit:contain;
        filter:grayscale(100%);
        opacity:.9;
        transition:.2s ease;
    }

    .av-partner:hover img{
        filter:grayscale(0%);
        opacity:1;
    }

    .av-sectors-card{
        background:#fff;
        border-radius:34px;               /* gros arrondi comme la capture */
        padding:30px 28px;
        box-shadow: 0 12px 35px rgba(0,0,0,.08);
        border: 1px solid #eee;
    }

    .av-sectors-grid{
        display:grid;
        grid-template-columns:repeat(5, minmax(0, 1fr));
        gap:26px;
        align-items:start;
        text-align:center;
    }

    @media (max-width: 1200px){ .av-sectors-grid{ grid-template-columns:repeat(3, minmax(0, 1fr)); } }
    @media (max-width: 768px){ .av-sectors-grid{ grid-template-columns:repeat(2, minmax(0, 1fr)); } }
    @media (max-width: 480px){ .av-sectors-grid{ grid-template-columns:1fr; } }

    .av-sector-item{
        display:flex;
        flex-direction:column;
        align-items:center;
        gap:14px;
        padding:10px 6px;
    }

    .av-sector-icon{
        width:54px;
        height:54px;
        display:flex;
        align-items:center;
        justify-content:center;
    }

    .av-sector-icon svg{
        width:54px;
        height:54px;
        stroke:#111;
        fill:none;
        stroke-width:2.2;
        stroke-linecap:round;
        stroke-linejoin:round;
    }

    .av-sector-title{
        font-size:18px;
        font-weight:700;
        color:#2b2b2b;
        line-height:1.25;
        margin:0;
        max-width:180px; /* pour forcer les retours à la ligne comme la capture */
    }
    /* ===== PARTNERS SLIDER ===== */

.partners-av{
    background:#ffffff;
}

.partners-title{
    color:#5ac14a;
    font-weight:700;
    font-size:32px;
}

/* bande */
.partners-slider{
    overflow:hidden;
    position:relative;
    width:100%;
    background:#f5f5f5;
    padding:40px 0;
}

/* track animation */
.partners-track{
    display:flex;
    align-items:center;
    gap:80px;
    width:max-content;
    animation:scrollPartners 25s linear infinite;
}

/* logo item */
.partner-item{
    flex:0 0 auto;
}

.partner-item img{
    height:90px;
    width:auto;
    object-fit:contain;
    transition:.3s;
}

.partner-item img:hover{
    transform:scale(1.1);
}

/* animation */
@keyframes scrollPartners{
    from{
        transform:translateX(0);
    }
    to{
        transform:translateX(-50%);
    }
}
</style>

@php
    // Valeurs
    $values = ['Agilité','Transparence','Engagement','Performance'];

    // Services
    $services = [
        ['icon' => '📞', 'title' => 'Service Client', 'desc' => 'Gestion des appels entrants et assistance client.'],
        ['icon' => '💬', 'title' => 'Support Technique', 'desc' => 'Accompagnement et résolution des problèmes techniques.'],
        ['icon' => '📈', 'title' => 'Télévente', 'desc' => 'Développement des ventes et acquisition de clients.'],
        ['icon' => '🧾', 'title' => 'Back Office', 'desc' => 'Traitement administratif et gestion des dossiers.'],
        ['icon' => '🤝', 'title' => 'Gestion de la Relation Client', 'desc' => 'Suivi et fidélisation des clients.'],
    ];


    // Secteurs d’activité (comme la capture)
    $sectors = [
        ['title' => "Énergie & efficacité\nénergétique", 'icon' => 'energy'],
        ['title' => "Fintech & Services\nfinancier", 'icon' => 'fintech'],
        ['title' => "E-commerce &\nvente aux\ndétails", 'icon' => 'ecommerce'],
        ['title' => "Télécommunications", 'icon' => 'telecom'],
        ['title' => "Tourisme &\nhospitalité", 'icon' => 'tourism'],
    ];
@endphp

<!-- ====== A PROPOS ====== -->
<section class="av-section av-bg-dark" style="padding-top:40px; padding-bottom:40px;">
    <div class="container text-center">
        <h2 class="av-title-top">À PROPOS</h2>
        <p class="av-about-text">
            Fondé en 2022, Call Énergie Vert est un centre de contact offshore et acteur BPO,
            disposant de deux sites opérationnels en Tunisie et au Maroc, totalisant 100 positions.
            Nous combinons expertise, flexibilité opérationnelle et orientation résultats afin de
            répondre efficacement aux exigences du marché européen.
        </p>
    </div>
</section>

<!-- ====== NOS VALEURS ====== -->
<section class="av-values-wrap">
    <div class="container">
        <h2 class="av-values-title">Nos Valeurs</h2>
        <ul class="av-values-list">
            @foreach($values as $v)
                <li><span class="av-check">✓</span> {{ $v }}</li>
            @endforeach
        </ul>
    </div>
</section>

<!-- ====== NOS SERVICES ====== -->
<section class="av-section av-bg-dark">
    <div class="container">
        <h2 class="av-services-title">Nos services</h2>

        <div class="av-services-grid">
            @foreach($services as $s)
                <div class="av-service-card">
                    <div class="av-service-icon">{{ $s['icon'] }}</div>
                    <p class="av-service-title">{{ $s['title'] }}</p>
                    <p class="av-service-desc">{{ $s['desc'] }}</p>
                </div>
            @endforeach
        </div>

        <!-- ====== SECTEURS D’ACTIVITÉ  ====== -->
        <div class="av-sectors-wrap">
            <h2 class="av-partners-title" style="margin-top: 60px;">Secteurs d’activité</h2>

            <div class="av-sectors-card">
                <div class="av-sectors-grid">
                    @foreach($sectors as $sec)
                        <div class="av-sector-item">
                            <div class="av-sector-icon">
                                @if($sec['icon'] === 'energy')
                                    <!-- Energy icon -->
                                    <svg viewBox="0 0 64 64" aria-hidden="true">
                                        <path d="M24 6h16l-6 22h10L26 58l6-24H22z"/>
                                        <path d="M14 42h10"/>
                                        <path d="M40 18h10"/>
                                    </svg>
                                @elseif($sec['icon'] === 'fintech')
                                    <!-- Fintech icon -->
                                    <svg viewBox="0 0 64 64" aria-hidden="true">
                                        <path d="M12 36c8-10 32-10 40 0"/>
                                        <path d="M20 30v-8a12 12 0 0 1 24 0v8"/>
                                        <circle cx="32" cy="26" r="6"/>
                                        <path d="M32 20v12"/>
                                        <path d="M28 26h8"/>
                                    </svg>
                                @elseif($sec['icon'] === 'ecommerce')
                                    <!-- E-commerce icon -->
                                    <svg viewBox="0 0 64 64" aria-hidden="true">
                                        <rect x="16" y="8" width="32" height="48" rx="4"/>
                                        <path d="M24 20h16"/>
                                        <path d="M22 28h20"/>
                                        <path d="M24 40h16"/>
                                        <path d="M26 44l4 4 8-10"/>
                                    </svg>
                                @elseif($sec['icon'] === 'telecom')
                                    <!-- Telecom icon -->
                                    <svg viewBox="0 0 64 64" aria-hidden="true">
                                        <rect x="18" y="10" width="20" height="40" rx="3"/>
                                        <path d="M24 16h8"/>
                                        <path d="M28 44h0"/>
                                        <path d="M44 44c6-6 6-18 0-24"/>
                                        <path d="M50 50c10-10 10-30 0-40"/>
                                    </svg>
                                @else
                                    <!-- Tourism icon -->
                                    <svg viewBox="0 0 64 64" aria-hidden="true">
                                        <rect x="18" y="12" width="28" height="38" rx="4"/>
                                        <path d="M26 12v38"/>
                                        <path d="M38 18h6"/>
                                        <circle cx="46" cy="18" r="3"/>
                                        <path d="M40 46h6"/>
                                        <circle cx="46" cy="46" r="3"/>
                                    </svg>
                                @endif
                            </div>

                            <p class="av-sector-title">{!! nl2br(e($sec['title'])) !!}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</section>
<!-- ====== POURQUOI NOUS CHOISIR ====== -->
<section class="av-why-section">
    <div class="container">
        <h2 class="av-why-title">Pourquoi nous choisir ?</h2>

        <div class="av-why-image">
            <img src="{{ asset('img/pourq.png') }}" alt="Pourquoi nous choisir">
        </div>
    </div>
</section>
<section class="partners-av py-5">
    <div class="container">
        <h2 class="partners-title text-center mb-5">Nos Partenaires</h2>

        <div class="partners-slider">

            <div class="partners-track">

                @foreach($partners as $partner)
                    <div class="partner-item">
                        <img src="{{ asset('storage/' . ltrim($partner->logo, '/')) }}"
                             alt="{{ $partner->name }}">
                    </div>
                @endforeach

                {{-- duplication pour boucle infinie --}}
                @foreach($partners as $partner)
                    <div class="partner-item">
                        <img src="{{ asset('storage/' . ltrim($partner->logo, '/')) }}"
                             alt="{{ $partner->name }}">
                    </div>
                @endforeach

            </div>

        </div>
    </div>
</section>
<!-- ====== BLOG ====== -->
<section class="av-blog-section">
    <div class="av-blog-wrapper">
        <h2 class="av-blog-title">BLOG</h2>

        <div class="av-blog-grid">
            {{-- Grande image verticale à gauche --}}
            <div class="av-blog-left">
                <img src="{{ asset('imG/blog-left.png') }}" alt="Blog image">
            </div>

            {{-- Blogs à droite --}}
            <div class="av-blog-right">
                @foreach($blogs->take(2) as $blog)
                    <article class="av-blog-item">
                        <div class="av-blog-item-image">
                            <img src="{{ asset('storage/' . ltrim($blog->image, '/')) }}" alt="{{ $blog->title }}">
                        </div>

                        <div class="av-blog-item-content">
                            <div>
                                <h3 class="av-blog-item-title">{{ $blog->title }}</h3>

                                <p class="av-blog-item-text">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($blog->content), 320) }}
                                </p>
                            </div>

                            <div class="av-blog-item-footer">
                                <a href="{{ route('blog.show', $blog->slug) }}" class="av-blog-readmore">
                                    Lire la suite
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection