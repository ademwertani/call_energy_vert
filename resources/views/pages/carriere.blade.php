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
}

.career-card{
    background:#000;
    border-radius:24px;
    overflow:hidden;
    box-shadow:0 8px 25px rgba(0,0,0,.12);
}

.career-image{
    width:100%;
    height:420px;
    object-fit:cover;
    display:block;
}

.career-card-title{
    background:#61c646;
    color:#fff;
    text-align:center;
    font-size:1.45rem;
    font-weight:800;
    padding:18px 20px;
}

.career-card-body{
    padding:28px 30px 35px;
    color:#fff;
}

.career-card-body h4{
    color:#61c646;
    margin-bottom:14px;
    font-weight:800;
}

.career-card-body p{
    line-height:1.7;
}

.career-card-body ul{
    padding-left:20px;
    margin-bottom:24px;
}

.career-card-body li{
    margin-bottom:8px;
    line-height:1.5;
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
}

.apply-btn:hover{
    background:#4baa33;
}

.apply-form-wrap{
    margin-top:25px;
    background:#111;
    border:1px solid rgba(255,255,255,.12);
    border-radius:18px;
    padding:20px;
}

.apply-form-wrap input,
.apply-form-wrap textarea{
    width:100%;
    margin-bottom:14px;
    border:none;
    border-radius:12px;
    padding:14px 16px;
    background:#f3f3f3;
    color:#222;
    outline:none;
}

.apply-form-wrap input[type="file"]{
    padding:12px;
}

.apply-form-wrap button{
    background:#61c646;
    color:#fff;
    border:none;
    border-radius:999px;
    padding:12px 28px;
    font-weight:700;
    cursor:pointer;
}

.alert-success-career{
    max-width:1250px;
    margin:25px auto 0;
    background:#d1fae5;
    color:#065f46;
    border:1px solid #a7f3d0;
    padding:15px 18px;
    border-radius:12px;
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
        font-size:1.15rem;
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
}
</style>

<section class="contact-page">

    {{-- HEADER / HERO --}}
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

    @if(session('career_success'))
        <div class="alert-success-career">
            {{ session('career_success') }}
        </div>
    @endif

    {{-- CONTENU --}}
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
                            <p>{{ $career->short_description }}</p>
                        @endif

                        @if(count($career->missions_list))
                            <h4>Missions :</h4>
                            <ul>
                                @foreach($career->missions_list as $mission)
                                    <li>{{ $mission }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <button type="button" class="apply-btn" onclick="toggleApplyForm({{ $career->id }})">
                            Postuler
                        </button>

                        <div class="apply-form-wrap" id="applyForm{{ $career->id }}" style="display:none;">
                            <form action="{{ route('carriere.apply', $career->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="text" name="full_name" placeholder="Nom et prénom" required>
                                <input type="email" name="email" placeholder="Email" required>
                                <input type="text" name="phone" placeholder="Téléphone">
                                <input type="file" name="cv" accept=".pdf,.doc,.docx">
                                <textarea name="message" rows="4" placeholder="Message"></textarea>
                                <button type="submit">Envoyer ma candidature</button>
                            </form>
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

<script>
function toggleApplyForm(id) {
    const form = document.getElementById('applyForm' + id);
    if (form) {
        form.style.display = form.style.display === 'none' ? 'block' : 'none';
    }
}
</script>
@endsection