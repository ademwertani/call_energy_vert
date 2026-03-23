@extends('layouts.app')

@section('title', 'Nouvelle page')

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

.contact-hero-content .highlight{
    color:var(--green);
    font-weight:800;
}

/* ================= CONTENU VIDE ================= */
.empty-page-content{
    min-height:400px;
    background:#fff;
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

    .empty-page-content{
        min-height:250px;
    }
}
</style>

<section class="contact-page">
    <section class="contact-hero">
        <div class="contact-hero-overlay">
            <div class="contact-hero-content">
                <h1>
                    
Chez Call Énergie Vert,
 nous croyons que la performance passe avant tout par des équipes engagées et bien accompagnées

                </h1>
            </div>
        </div>
    </section>

    <section class="empty-page-content">
    </section>
</section>
@endsection