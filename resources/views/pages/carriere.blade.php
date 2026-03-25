@extends('layouts.app')

@section('title', 'Carrière')

@section('content')
<style>
.contact-page{
    --green:#10a545;
    --green-dark:#0d8d3b;
    --black:#000000;
    --white:#ffffff;
    --soft-white:#f3f3f3;
    --text:#111111;
    --gold:#d8b43c;
    --danger:#ff6b6b;
    --success-bg:#d1fae5;
    --success-text:#065f46;
    --success-border:#a7f3d0;
    background:#efefef;
}

/* ================= HERO ================= */
.contact-hero{
    position:relative;
    height:520px;
    background:url('{{ asset("img/contact-hero.png") }}') center/cover no-repeat;
    overflow:hidden;
}

.contact-hero-overlay{
    position:absolute;
    bottom:0;
    left:0;
    width:100%;
    height:50%;
    background:rgba(255,255,255,0.65);
    display:flex;
    align-items:center;
    justify-content:center;
    text-align:center;
    padding:20px;
}

.contact-hero-content{
    max-width:850px;
}

.contact-hero-content h1{
    font-size:clamp(1.35rem, 2vw, 1.95rem);
    line-height:1.5;
    font-weight:700;
    color:#111;
    margin:0;
}

.contact-intro-bar{
    background:#d9d9d9;
    padding:14px 20px;
}

.contact-intro-bar .container{
    max-width:1250px;
    margin:0 auto;
}

.contact-intro-bar span{
    color:var(--green);
    font-weight:700;
    font-size:1rem;
}

/* ================= CAREER CONTENT ================= */
.career-section{
    max-width:1250px;
    margin:0 auto;
    padding:50px 20px 90px;
}

.career-title{
    font-size:2.2rem;
    font-weight:800;
    color:#4db53c;
    margin-bottom:10px;
}

.career-subtitle{
    font-size:1.1rem;
    color:#222;
    margin-bottom:50px;
}

.career-grid{
    display:grid;
    grid-template-columns:repeat(2, 1fr);
    gap:30px;
    align-items:stretch;
}

.career-card{
    background:#000;
    border-radius:24px;
    overflow:hidden;
    box-shadow:0 8px 25px rgba(0,0,0,.12);
    display:flex;
    flex-direction:column;
    height:100%;
}

.career-image{
    width:100%;
    height:360px;
    object-fit:cover;
    display:block;
    flex-shrink:0;
}

.career-card-title{
    background:#61c646;
    color:#fff;
    text-align:center;
    font-size:1.35rem;
    font-weight:800;
    padding:18px 20px;
    min-height:90px;
    display:flex;
    align-items:center;
    justify-content:center;
    line-height:1.35;
    flex-shrink:0;
}

.career-card-body{
    padding:28px 30px 35px;
    color:#fff;
    display:flex;
    flex-direction:column;
    flex:1;
    min-height:520px;
}

.career-short-desc{
    min-height:90px;
    max-height:90px;
    overflow:hidden;
    line-height:1.7;
    margin-bottom:20px;
}

.career-card-body h4{
    color:#61c646;
    margin-bottom:14px;
    font-weight:800;
    flex-shrink:0;
}

.career-missions{
    min-height:210px;
    max-height:210px;
    overflow:auto;
    margin-bottom:20px;
    padding-right:8px;
}

.career-missions ul{
    padding-left:20px;
    margin-bottom:0;
}

.career-missions li{
    margin-bottom:8px;
    line-height:1.5;
}

.career-missions::-webkit-scrollbar{
    width:6px;
}

.career-missions::-webkit-scrollbar-thumb{
    background:rgba(255,255,255,.25);
    border-radius:10px;
}

.apply-btn-wrap{
    margin-top:auto;
    padding-top:18px;
    text-align:left;
    flex-shrink:0;
}

.apply-btn{
    display:inline-block;
    background:#61c646;
    color:#fff;
    border:none;
    border-radius:999px;
    padding:12px 38px;
    font-weight:700;
    cursor:pointer;
    transition:.2s;
    text-decoration:none;
}

.apply-btn:hover{
    background:#4baa33;
    color:#fff;
}

.empty-careers{
    font-size:1.05rem;
    color:#222;
    background:#fff;
    padding:25px;
    border-radius:16px;
}

@media (max-width:991px){
    .career-grid{
        grid-template-columns:1fr;
    }

    .career-image{
        height:320px;
    }

    .career-card-title{
        min-height:80px;
        font-size:1.15rem;
    }

    .career-card-body{
        min-height:auto;
    }

    .career-short-desc{
        min-height:auto;
        max-height:none;
    }

    .career-missions{
        min-height:auto;
        max-height:none;
        overflow:visible;
    }
}

@media (max-width:768px){
    .contact-hero{
        height:420px;
    }

    .contact-hero-overlay{
        height:50%;
        padding:18px;
    }

    .contact-hero-content h1{
        font-size:1.2rem;
        line-height:1.45;
    }

    .career-section{
        padding:35px 15px 70px;
    }

    .career-title{
        font-size:1.8rem;
    }

    .career-subtitle{
        font-size:1rem;
    }

    .career-image{
        height:280px;
    }
}
</style>

<section class="contact-page">

    <section class="contact-hero">
        <div class="contact-hero-overlay">
            <div class="contact-hero-content">
                <h1>
                    Chez Call Énergie Vert, nous croyons que la performance passe avant tout par des équipes engagées et bien accompagnées
                </h1>
            </div>
        </div>
    </section>

    <section class="contact-intro-bar">
        <div class="container">
            <span>Rejoignez Call Énergie Vert</span>
        </div>
    </section>

    <section class="career-section">
        <h2 class="career-title">Nos opportunités</h2>
        <p class="career-subtitle">Nous recrutons principalement pour les postes suivants</p>

        <div class="career-grid">
            @forelse($careers as $career)
                <div class="career-card">
                    <img
                        src="{{ $career->image ? asset('storage/' . $career->image) : asset('img/default-career.jpg') }}"
                        alt="{{ $career->title }}"
                        class="career-image"
                    >

                    <div class="career-card-title">
                        {{ $career->title }}
                    </div>

                    <div class="career-card-body">
                        @if($career->short_description)
                            <div class="career-short-desc">
                                {{ $career->short_description }}
                            </div>
                        @else
                            <div class="career-short-desc"></div>
                        @endif

                        <h4>Missions :</h4>

                        @if(count($career->missions_list))
                            <div class="career-missions">
                                <ul>
                                    @foreach($career->missions_list as $mission)
                                        <li>{{ $mission }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @else
                            <div class="career-missions"></div>
                        @endif

                        <div class="apply-btn-wrap">
                            <a href="{{ route('carriere.show', $career->id) }}" class="apply-btn">
                                Postuler
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="empty-careers">
                    Aucun poste disponible pour le moment.
                </div>
            @endforelse
        </div>
    </section>

</section>
@endsection