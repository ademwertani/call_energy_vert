@extends('layouts.app')

@section('title', 'Contactez-nous')

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

/* ================= FORM TOP ================= */
.offer-form-section,
.partner-form-section{
    display:none;
    background:#fff;
    padding:20px 20px 60px;
}

.offer-form-section.show,
.partner-form-section.show{
    display:block;
}

.offer-form-box,
.partner-form-box{
    max-width:980px;
    margin:0 auto;
    background:#000;
    border:1.5px solid var(--gold);
    border-radius:34px;
    padding:38px 34px 36px;
    box-shadow:0 10px 30px rgba(0,0,0,0.08);
}

.offer-close-wrap,
.partner-close-wrap{
    text-align:right;
    margin-bottom:16px;
}

.offer-close,
.partner-close{
    background:transparent;
    color:#fff;
    border:1px solid rgba(255,255,255,0.25);
    border-radius:999px;
    width:42px;
    height:42px;
    display:inline-flex;
    align-items:center;
    justify-content:center;
    font-size:1.1rem;
    cursor:pointer;
    transition:.2s;
}

.offer-close:hover,
.partner-close:hover{
    background:rgba(255,255,255,0.08);
}

.offer-form-title,
.partner-form-title{
    color:var(--green);
    font-size:2rem;
    font-weight:800;
    margin:0 0 28px;
    line-height:1.3;
}

.offer-form-desc,
.partner-form-desc{
    color:#fff;
    font-size:1.08rem;
    line-height:1.55;
    max-width:820px;
    margin-bottom:28px;
}

.offer-grid,
.partner-grid{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:22px;
    margin-bottom:22px;
}

.offer-field-full,
.partner-field-full{
    grid-column:1 / -1;
}

.offer-input,
.partner-input,
.offer-textarea,
.partner-textarea{
    width:100%;
    border:1px solid #d8d8d8;
    background:#f1f1f1;
    color:#666;
    border-radius:999px;
    padding:18px 28px;
    font-size:1rem;
    outline:none;
    box-shadow:none;
}

.offer-input::placeholder,
.partner-input::placeholder,
.offer-textarea::placeholder,
.partner-textarea::placeholder{
    color:#757575;
}

.offer-textarea,
.partner-textarea{
    border-radius:28px;
    min-height:135px;
    resize:vertical;
    padding-top:22px;
}

.offer-input.input-error,
.partner-input.input-error,
.offer-textarea.input-error,
.partner-textarea.input-error{
    border:1px solid var(--danger);
}

.partner-documents{
    width:100%;
    border:1px solid #d8d8d8;
    background:#f1f1f1;
    color:#666;
    border-radius:28px;
    padding:20px 26px;
    font-size:1rem;
    min-height:90px;
}

.partner-documents p{
    margin:0 0 6px;
    color:#666;
}

.partner-documents ul{
    margin:0;
    padding-left:22px;
    color:#666;
}

.field-error{
    color:var(--danger);
    font-size:.88rem;
    margin-top:8px;
    padding-left:10px;
}

.offer-note,
.partner-note{
    color:#fff;
    font-size:1rem;
    margin:28px 0 34px;
    padding-left:14px;
}

.offer-submit,
.partner-submit{
    min-width:280px;
    padding:18px 30px;
    border-radius:999px;
    background:var(--green);
    color:#fff;
    font-weight:800;
    font-size:1.1rem;
    border:none;
    cursor:pointer;
    transition:0.25s;
}

.offer-submit:hover,
.partner-submit:hover{
    background:var(--green-dark);
    transform:translateY(-2px);
}

.offer-alert-success,
.partner-alert-success{
    background:var(--success-bg);
    color:var(--success-text);
    border:1px solid var(--success-border);
    padding:14px 18px;
    border-radius:14px;
    font-weight:600;
    margin-bottom:22px;
}

.offer-alert-error,
.partner-alert-error{
    background:#2b1111;
    color:#ffd6d6;
    border:1px solid rgba(255,107,107,.45);
    padding:14px 18px;
    border-radius:14px;
    margin-bottom:22px;
}

.offer-alert-error ul,
.partner-alert-error ul{
    margin:0;
    padding-left:18px;
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

/* ================= BUTTONS ================= */
.contact-actions{
    background:#fff;
    padding:30px 20px 40px;
    text-align:center;
}

.contact-actions-wrap{
    display:flex;
    justify-content:center;
    gap:18px;
    flex-wrap:wrap;
}

.contact-btn{
    min-width:190px;
    padding:14px 28px;
    border-radius:999px;
    background:var(--green);
    color:#fff;
    font-weight:700;
    text-decoration:none;
    transition:0.25s;
    border:none;
    cursor:pointer;
    display:inline-flex;
    align-items:center;
    justify-content:center;
}

.contact-btn:hover{
    background:var(--green-dark);
    transform:translateY(-2px);
    color:#fff;
}

/* ================= WHITE SPACE ================= */
.contact-space{
    height:180px;
    background:#fff;
}

/* ================= MOBILE ================= */
@media (max-width:991px){
    .offer-grid,
    .partner-grid{
        grid-template-columns:1fr;
    }

    .offer-field-full,
    .partner-field-full{
        grid-column:auto;
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

    .contact-space{
        height:120px;
    }

    .offer-form-box,
    .partner-form-box{
        padding:24px 18px 24px;
        border-radius:24px;
    }

    .offer-form-title,
    .partner-form-title{
        font-size:1.55rem;
        margin-bottom:18px;
    }

    .offer-form-desc,
    .partner-form-desc{
        font-size:1rem;
        margin-bottom:20px;
    }

    .offer-input,
    .partner-input,
    .offer-textarea,
    .partner-textarea{
        padding:16px 20px;
        font-size:.95rem;
    }

    .offer-submit,
    .partner-submit{
        width:100%;
        min-width:auto;
    }
}
</style>

<section class="contact-page">

    {{-- FORMULAIRE DEMANDE D'OFFRE --}}
    <section class="offer-form-section {{ ($errors->offer->any() || session('offer_success')) ? 'show' : '' }}" id="offerFormSection">
        <div class="offer-form-box">
            <div class="offer-close-wrap">
                <button type="button" class="offer-close" id="closeOfferForm">×</button>
            </div>

            <h2 class="offer-form-title">Demande d’offre</h2>

            <p class="offer-form-desc">
                Vous souhaitez externaliser tout ou une partie de vos opérations ?<br>
                Remplissez ce formulaire afin que notre équipe puisse étudier votre besoin
                et vous proposer une solution adaptée.
            </p>

            @if(session('offer_success'))
                <div class="offer-alert-success">
                    {{ session('offer_success') }}
                </div>
            @endif

            @if($errors->offer->any())
                <div class="offer-alert-error">
                    <ul>
                        @foreach($errors->offer->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('contact.store') }}">
                @csrf

                <div class="offer-grid">
                    <div>
                        <input type="text" name="company_name" class="offer-input @error('company_name', 'offer') input-error @enderror" placeholder="Nom de l’entreprise" value="{{ old('company_name') }}" required>
                        @error('company_name', 'offer') <div class="field-error">{{ $message }}</div> @enderror
                    </div>

                    <div>
                        <input type="text" name="contact_name" class="offer-input @error('contact_name', 'offer') input-error @enderror" placeholder="Nom et prénom du contact" value="{{ old('contact_name') }}" required>
                        @error('contact_name', 'offer') <div class="field-error">{{ $message }}</div> @enderror
                    </div>

                    <div>
                        <input type="email" name="email" class="offer-input @error('email', 'offer') input-error @enderror" placeholder="Email professionnel" value="{{ old('email') }}" required>
                        @error('email', 'offer') <div class="field-error">{{ $message }}</div> @enderror
                    </div>

                    <div>
                        <input type="text" name="phone" class="offer-input @error('phone', 'offer') input-error @enderror" placeholder="Téléphone" value="{{ old('phone') }}">
                        @error('phone', 'offer') <div class="field-error">{{ $message }}</div> @enderror
                    </div>

                    <div>
                        <input type="text" name="activity_sector" class="offer-input @error('activity_sector', 'offer') input-error @enderror" placeholder="Secteur d’activité(cases à cocher)" value="{{ old('activity_sector') }}">
                        @error('activity_sector', 'offer') <div class="field-error">{{ $message }}</div> @enderror
                    </div>

                    <div>
                        <input type="text" name="service_type" class="offer-input @error('service_type', 'offer') input-error @enderror" placeholder="Type de service souhaité(cases à cocher)" value="{{ old('service_type') }}">
                        @error('service_type', 'offer') <div class="field-error">{{ $message }}</div> @enderror
                    </div>

                    <div class="offer-field-full">
                        <input type="text" name="hear_about_us" class="offer-input @error('hear_about_us', 'offer') input-error @enderror" placeholder="How did you hear of us?" value="{{ old('hear_about_us') }}">
                        @error('hear_about_us', 'offer') <div class="field-error">{{ $message }}</div> @enderror
                    </div>

                    <div class="offer-field-full">
                        <textarea name="message" class="offer-textarea @error('message', 'offer') input-error @enderror" placeholder="Description de votre projet / besoins spécifiques" required>{{ old('message') }}</textarea>
                        @error('message', 'offer') <div class="field-error">{{ $message }}</div> @enderror
                    </div>
                </div>

                <p class="offer-note">
                    Un conseiller Call Énergie Vert vous contactera rapidement.
                </p>

                <button type="submit" class="offer-submit">Envoyer la demande</button>
            </form>
        </div>
    </section>

    {{-- FORMULAIRE PARTENARIAT --}}
    <section class="partner-form-section {{ ($errors->partner->any() || session('partner_success')) ? 'show' : '' }}" id="partnerFormSection">
        <div class="partner-form-box">
            <div class="partner-close-wrap">
                <button type="button" class="partner-close" id="closePartnerForm">×</button>
            </div>

            <h2 class="partner-form-title">Prestataires de services & demandes de partenariat</h2>

            <p class="partner-form-desc">
                Call Énergie Vert développe des partenariats durables avec des acteurs
                partageant les mêmes exigences de qualité et de performance.<br>
                Soumettez votre proposition et explorons ensemble les opportunités de collaboration.
            </p>

            @if(session('partner_success'))
                <div class="partner-alert-success">
                    {{ session('partner_success') }}
                </div>
            @endif

            @if($errors->partner->any())
                <div class="partner-alert-error">
                    <ul>
                        @foreach($errors->partner->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('partner.store') }}">
                @csrf

                <div class="partner-grid">
                    <div>
                        <input type="text" name="company_name" class="partner-input @error('company_name', 'partner') input-error @enderror" placeholder="Nom de l’entreprise" value="{{ old('company_name') }}" required>
                        @error('company_name', 'partner') <div class="field-error">{{ $message }}</div> @enderror
                    </div>

                    <div>
                        <input type="text" name="contact_name" class="partner-input @error('contact_name', 'partner') input-error @enderror" placeholder="Nom et prénom du contact" value="{{ old('contact_name') }}" required>
                        @error('contact_name', 'partner') <div class="field-error">{{ $message }}</div> @enderror
                    </div>

                    <div>
                        <input type="email" name="email" class="partner-input @error('email', 'partner') input-error @enderror" placeholder="Email professionnel" value="{{ old('email') }}" required>
                        @error('email', 'partner') <div class="field-error">{{ $message }}</div> @enderror
                    </div>

                    <div>
                        <input type="text" name="phone" class="partner-input @error('phone', 'partner') input-error @enderror" placeholder="Téléphone" value="{{ old('phone') }}">
                        @error('phone', 'partner') <div class="field-error">{{ $message }}</div> @enderror
                    </div>

                    <div>
                        <input type="text" name="business_domain" class="partner-input @error('business_domain', 'partner') input-error @enderror" placeholder="Domaine d’activité(cases à cocher)" value="{{ old('business_domain') }}">
                        @error('business_domain', 'partner') <div class="field-error">{{ $message }}</div> @enderror
                    </div>

                    <div>
                        <input type="text" name="service_type" class="partner-input @error('service_type', 'partner') input-error @enderror" placeholder="Type de service souhaité(cases à cocher)" value="{{ old('service_type') }}">
                        @error('service_type', 'partner') <div class="field-error">{{ $message }}</div> @enderror
                    </div>

                    <div class="partner-field-full">
                        <div class="partner-documents">
                            <p>Documents (optionnel)</p>
                            <ul>
                                <li>Site web</li>
                                <li>Brochure ou présentation</li>
                            </ul>
                        </div>
                    </div>

                    <div class="partner-field-full">
                        <textarea name="proposal_description" class="partner-textarea @error('proposal_description', 'partner') input-error @enderror" placeholder="Description de votre offre ou proposition" required>{{ old('proposal_description') }}</textarea>
                        @error('proposal_description', 'partner') <div class="field-error">{{ $message }}</div> @enderror
                    </div>
                </div>

                <p class="partner-note">
                    Notre équipe étudiera votre proposition et vous contactera si une collaboration est envisageable.
                </p>

                <button type="submit" class="partner-submit">Envoyer la demande</button>
            </form>
        </div>
    </section>

    {{-- HERO --}}
    <section class="contact-hero">
        <div class="contact-hero-overlay">
            <div class="contact-hero-content">
                <h1>
                    Chez Call Énergie Vert, nous analysons vos besoins afin de
                    vous proposer <span class="highlight">une solution sur mesure</span>,
                    adaptée à votre secteur d’activité, et à vos objectifs.
                </h1>
            </div>
        </div>
    </section>

    {{-- BUTTONS --}}
    <section class="contact-actions">
        <div class="container">
            <div class="contact-actions-wrap">
                <button type="button" class="contact-btn" id="openOfferForm">Demande d’offre</button>
                <button type="button" class="contact-btn" id="openPartnerForm">Partenariat</button>
            </div>
        </div>
    </section>

    <div class="contact-space"></div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const openOfferBtn = document.getElementById('openOfferForm');
    const closeOfferBtn = document.getElementById('closeOfferForm');
    const offerSection = document.getElementById('offerFormSection');

    const openPartnerBtn = document.getElementById('openPartnerForm');
    const closePartnerBtn = document.getElementById('closePartnerForm');
    const partnerSection = document.getElementById('partnerFormSection');

    if (openOfferBtn && offerSection) {
        openOfferBtn.addEventListener('click', function () {
            offerSection.classList.add('show');
            if (partnerSection) partnerSection.classList.remove('show');
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    if (closeOfferBtn && offerSection) {
        closeOfferBtn.addEventListener('click', function () {
            offerSection.classList.remove('show');
        });
    }

    if (openPartnerBtn && partnerSection) {
        openPartnerBtn.addEventListener('click', function () {
            partnerSection.classList.add('show');
            if (offerSection) offerSection.classList.remove('show');
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    if (closePartnerBtn && partnerSection) {
        closePartnerBtn.addEventListener('click', function () {
            partnerSection.classList.remove('show');
        });
    }

    @if($errors->offer->any() || session('offer_success'))
        if (offerSection) {
            offerSection.classList.add('show');
            if (partnerSection) partnerSection.classList.remove('show');
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    @endif

    @if($errors->partner->any() || session('partner_success'))
        if (partnerSection) {
            partnerSection.classList.add('show');
            if (offerSection) offerSection.classList.remove('show');
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    @endif
});
</script>
@endsection