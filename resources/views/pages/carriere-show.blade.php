@extends('layouts.app')

@section('title', $career->title)

@section('content')
<style>
.contact-page{
    --green:#59c248;
    --green-dark:#43a934;
    --black:#111111;
    --white:#ffffff;
    --light:#efefef;
    --text:#222222;
    --border:#8ed27f;
    --muted:#6f6f6f;
    --success-bg:#d1fae5;
    --success-text:#065f46;
    --success-border:#a7f3d0;
    --error-bg:#fff1f2;
    --error-text:#b42318;
    --error-border:#fda29b;
    background:var(--light);
    min-height:100vh;
}

.career-single-wrap{
    max-width:1150px;
    margin:0 auto;
    padding:80px 20px 120px;
}

.career-top-title{
    color:var(--green);
    font-size:clamp(2rem, 4vw, 3.3rem);
    font-weight:800;
    line-height:1.2;
    margin:0 0 55px;
    max-width:520px;
}

.career-layout{
    display:grid;
    grid-template-columns:1fr 520px;
    gap:55px;
    align-items:start;
}

.career-left{
    padding-top:8px;
}

.career-job-image{
    width:100%;
    height:280px;
    object-fit:cover;
    border-radius:28px;
    display:block;
    margin-bottom:30px;
    box-shadow:0 8px 24px rgba(0,0,0,.08);
}

.career-section-title{
    color:var(--green);
    font-size:1.05rem;
    font-weight:800;
    margin:0 0 8px;
}

.career-block{
    margin-bottom:26px;
}

.career-text{
    color:var(--text);
    font-size:1.02rem;
    line-height:1.75;
}

.career-list,
.career-ordered{
    margin:0;
    padding-left:22px;
    color:var(--text);
}

.career-list li,
.career-ordered li{
    margin-bottom:6px;
    line-height:1.6;
    font-size:1.02rem;
}

.career-form-box{
    border:1.5px solid var(--border);
    border-radius:38px;
    padding:34px 28px 30px;
    background:transparent;
}

.career-form-grid{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:18px 14px;
}

.form-group-full{
    grid-column:1 / -1;
}

.career-input,
.career-textarea,
.career-file{
    width:100%;
    background:transparent;
    border:1.5px solid var(--border);
    border-radius:22px;
    padding:18px 18px;
    font-size:1rem;
    color:var(--text);
    outline:none;
}

.career-input::placeholder,
.career-textarea::placeholder{
    color:#7c7c7c;
}

.career-textarea{
    min-height:120px;
    resize:vertical;
}

.career-choice-box{
    border:1.5px solid var(--border);
    border-radius:22px;
    padding:16px 18px 12px;
    color:var(--text);
    min-height:96px;
}

.career-choice-title{
    font-size:.98rem;
    color:#666;
    margin-bottom:6px;
}

.career-choice-box label{
    display:block;
    margin-bottom:4px;
    font-size:.98rem;
    cursor:pointer;
}

.career-choice-inline label{
    display:inline-block;
    margin-right:14px;
    margin-bottom:0;
}

.career-file{
    padding:14px 16px;
}

.career-note{
    margin:22px 0 18px;
    color:var(--text);
    font-size:.97rem;
    line-height:1.5;
}

.career-submit{
    display:inline-flex;
    align-items:center;
    justify-content:center;
    border:none;
    background:var(--green);
    color:#fff;
    font-size:1rem;
    font-weight:800;
    border-radius:999px;
    padding:16px 34px;
    min-width:255px;
    cursor:pointer;
    transition:.2s;
}

.career-submit:hover{
    background:var(--green-dark);
}

.alert-success-career{
    background:var(--success-bg);
    color:var(--success-text);
    border:1px solid var(--success-border);
    padding:14px 18px;
    border-radius:18px;
    margin-bottom:18px;
    font-weight:600;
}

.alert-error-career{
    background:var(--error-bg);
    color:var(--error-text);
    border:1px solid var(--error-border);
    padding:14px 18px;
    border-radius:18px;
    margin-bottom:18px;
}

.alert-error-career ul{
    margin:0;
    padding-left:18px;
}

.back-link{
    display:inline-block;
    margin-bottom:22px;
    color:var(--green);
    font-weight:700;
    text-decoration:none;
}

.back-link:hover{
    color:var(--green-dark);
}

@media (max-width:1100px){
    .career-layout{
        grid-template-columns:1fr;
        gap:35px;
    }

    .career-form-box{
        max-width:700px;
    }
}

@media (max-width:768px){
    .career-single-wrap{
        padding:45px 16px 80px;
    }

    .career-top-title{
        margin-bottom:30px;
        max-width:100%;
    }

    .career-job-image{
        height:220px;
        border-radius:22px;
    }

    .career-form-box{
        padding:24px 18px 22px;
        border-radius:26px;
    }

    .career-form-grid{
        grid-template-columns:1fr;
    }

    .form-group-full{
        grid-column:auto;
    }

    .career-submit{
        width:100%;
        min-width:auto;
    }
}
</style>

<section class="contact-page">
    <div class="career-single-wrap">
        <a href="{{ route('carriere') }}" class="back-link">← Retour aux postes</a>

        <h1 class="career-top-title">{{ $career->title }}</h1>

        <div class="career-layout">
            <div class="career-left">
                <img
                    src="{{ $career->image ? asset('storage/' . $career->image) : asset('img/default-career.jpg') }}"
                    alt="{{ $career->title }}"
                    class="career-job-image"
                >

                @if(count($career->requirements_list))
                    <div class="career-block">
                        <h3 class="career-section-title">Profil recherché :</h3>
                        <ul class="career-list">
                            @foreach($career->requirements_list as $requirement)
                                <li>{{ $requirement }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if($career->short_description)
                    <div class="career-block">
                        <h3 class="career-section-title">Ce que nous offrons</h3>
                        <div class="career-text">
                            {{ $career->short_description }}
                        </div>
                    </div>
                @endif

                @if(count($career->missions_list))
                    <div class="career-block">
                        <h3 class="career-section-title">Pourquoi nous rejoindre ?</h3>
                        <ul class="career-list">
                            @foreach($career->missions_list as $mission)
                                <li>{{ $mission }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="career-block">
                    <h3 class="career-section-title">Processus de recrutement</h3>
                    <ol class="career-ordered">
                        <li>Dépôt de candidature</li>
                        <li>Entretien téléphonique</li>
                        <li>Entretien avec l’équipe recrutement</li>
                        <li>Intégration et formation</li>
                    </ol>
                </div>
            </div>

            <div class="career-right">
                <div class="career-form-box">
                    @if(session('career_success'))
                        <div class="alert-success-career">
                            {{ session('career_success') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert-error-career">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('carriere.apply', $career->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="career-form-grid">
                            <div>
                                <input
                                    type="text"
                                    name="full_name"
                                    class="career-input"
                                    placeholder="Nom/Prénom"
                                    value="{{ old('full_name') }}"
                                    required
                                >
                            </div>

                            <div>
                                <input
                                    type="email"
                                    name="email"
                                    class="career-input"
                                    placeholder="Email"
                                    value="{{ old('email') }}"
                                    required
                                >
                            </div>

                            <div>
                                <input
                                    type="text"
                                    name="phone"
                                    class="career-input"
                                    placeholder="Téléphone"
                                    value="{{ old('phone') }}"
                                >
                            </div>

                            <div>
                                <div class="career-choice-box">
                                    <div class="career-choice-title">Niveau d’expérience</div>
                                    <label>
                                        <input type="radio" name="experience_level" value="Débutant" {{ old('experience_level') == 'Débutant' ? 'checked' : '' }}>
                                        Débutant
                                    </label>
                                    <label>
                                        <input type="radio" name="experience_level" value="1-2 ans" {{ old('experience_level') == '1-2 ans' ? 'checked' : '' }}>
                                        1-2 ans
                                    </label>
                                    <label>
                                        <input type="radio" name="experience_level" value="3 ans et plus" {{ old('experience_level') == '3 ans et plus' ? 'checked' : '' }}>
                                        3 ans et plus
                                    </label>
                                </div>
                            </div>

                            <div>
                                <div class="career-choice-box career-choice-inline">
                                    <div class="career-choice-title">Disponibilité immédiate</div>
                                    <label>
                                        <input type="radio" name="immediate_availability" value="Oui" {{ old('immediate_availability') == 'Oui' ? 'checked' : '' }}>
                                        Oui
                                    </label>
                                    <label>
                                        <input type="radio" name="immediate_availability" value="Non" {{ old('immediate_availability') == 'Non' ? 'checked' : '' }}>
                                        Non
                                    </label>
                                </div>
                            </div>

                            <div>
                                <input
                                    type="file"
                                    name="cv"
                                    class="career-file"
                                    accept=".pdf,.doc,.docx"
                                >
                            </div>

                            <div class="form-group-full">
                                <textarea
                                    name="message"
                                    class="career-textarea"
                                    placeholder="Présentez-vous brièvement (facultatif)"
                                >{{ old('message') }}</textarea>
                            </div>
                        </div>

                        <p class="career-note">
                            Vos informations seront utilisées uniquement dans le cadre du processus de recrutement et traitées en toute confidentialité.
                        </p>

                        <button type="submit" class="career-submit">Envoyer ma candidature</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection