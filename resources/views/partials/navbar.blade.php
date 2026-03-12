{{-- ================== UNIFIED HEADER ================== --}}
@php
  $about = $about ?? (object) [];
  $social = $social ?? (object) [];
@endphp

{{-- ================== HEADER PREMIUM ================== --}}
<header class="header-premium sticky-top">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark">

            {{-- LOGO --}}
            <a href="{{ url('/') }}" class="navbar-brand d-flex align-items-center">
                @if(!empty($about->logo))
                    <img src="{{ asset('storage/' . ltrim($about->logo, '/')) }}" 
                         alt="Energie Vert"
                         class="logo-premium">
                @else
                    <img src="{{ asset('img/logo.png') }}" 
                         alt="Energie Vert"
                         class="logo-premium">
                @endif
            </a>

            {{-- TOGGLER MOBILE --}}
            <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarPremium"
                aria-controls="navbarPremium"
                aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            {{-- MENU --}}
            <div class="collapse navbar-collapse justify-content-center" id="navbarPremium">
                <ul class="navbar-nav gap-lg-5 text-center">

                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('/') ? 'active' : '' }}"
                           href="{{ url('/') }}">
                            Accueil
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('about') ? 'active' : '' }}"
                           href="{{ url('/about') }}">
                            À propos
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('services') ? 'active' : '' }}"
                           href="{{ url('/services') }}">
                            Services
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('secteurs') ? 'active' : '' }}"
                           href="{{ url('/secteurs') }}">
                            Secteurs d’activité
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('contact') ? 'active' : '' }}"
                           href="{{ url('/contact') }}">
                            Contact
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('carriere') ? 'active' : '' }}"
                           href="{{ url('/carriere') }}">
                            Carrière
                        </a>
                    </li>

                </ul>
            </div>

        </nav>
    </div>
</header>

{{-- ================== MODAL IMAGE CERTIFICATION ================== --}}
<div id="certifModal" class="certif-modal">
    <div class="certif-overlay"></div>

    <div class="certif-content">
        <img src="{{ asset('img/certif.png') }}" alt="Certification AuditVision">
        <button class="certif-close">&times;</button>
    </div>
</div>

{{-- ================== STYLES PERSO ================== --}}
<style>
/* Supprimer l'espace blanc avant le navbar */
html, body {
    margin: 0;
    padding: 0;
    height: 100%;
}

/* LOGO PLUS GRAND */
.logo-navbar {
    height: 90px !important;
    width: auto;
}

/* Bouton bleu Contact */
.btn-contact-blue {
    background: #28327d !important;
    color: #ffffff !important;
    border-radius: 30px;
    padding: 8px 22px;
    font-weight: 600;
    border: none;
    transition: .2s ease;
}

.btn-contact-blue:hover {
    background: #1f265f !important;
    color: #fff;
}

/* Couleur du texte du menu */
.header-aisla .nav-link {
    color: #000 !important;
    font-weight: 500;
}
/* ===============================
   HEADER PREMIUM NOIR + DORÉ
   =============================== */

.header-premium {
    background: #000000;
    border-bottom: 2px solid #d4af37;
    padding: 20px 0; /* navbar plus grand */
}

/* Logo */
.logo-premium {
    height: 40px; /* logo plus visible */
}

/* Alignement navbar */
.navbar {
    align-items: center;
}

/* Liens menu */
.header-premium .nav-link {
    color: #ffffff !important;
    font-weight: 500;
    font-size: 15px;
    letter-spacing: 0.4px;
    transition: all 0.3s ease;
    position: relative;
}

/* Hover doré */
.header-premium .nav-link:hover {
    color: #d4af37 !important;
}

/* Lien actif */
.header-premium .nav-link.active {
    color: #d4af37 !important;
}

/* Animation underline dorée */
.header-premium .nav-link::after {
    content: "";
    position: absolute;
    bottom: -6px;
    left: 0;
    width: 0%;
    height: 2px;
    background: #d4af37;
    transition: width 0.3s ease;
}

.header-premium .nav-link:hover::after {
    width: 100%;
}

/* Centrage menu */
.navbar-nav {
    align-items: center;
}

/* Responsive mobile */
@media (max-width: 991px) {
    .navbar-collapse {
        background: #000;
        padding: 20px 0;
    }

    .navbar-nav {
        gap: 15px;
    }
}
.header-aisla .nav-link.active {
    color: #28327d !important;
}

/* Sous-menus */
.header-aisla .dropdown-menu .dropdown-item {
    color: #000 !important;
    font-size: .9rem;
}

.header-aisla .dropdown-menu .dropdown-item.active {
    background: #e5edff;
    color: #28327d !important;
    font-weight: 600;
}

/* ===============================
   PILL CERTIFICATION – IMAGE MISE EN VALEUR
   =============================== */
.brochure-pill {
    padding: 4px 14px;
    border-radius: 999px;
    background: #ffffff;
    border: 1px solid rgba(15, 23, 42, 0.12);
    text-decoration: none;
    cursor: pointer;
    gap: 10px;
    box-shadow: 0 8px 20px rgba(15,23,42,0.10);
    transform: translateY(0) scale(1);
    transition: 
        background-color 0.20s ease,
        box-shadow 0.20s ease,
        transform 0.20s ease,
        border-color 0.20s ease;
}

.brochure-pill:hover {
    background: #f1f5f9;
    border-color: rgba(15, 23, 42, 0.28);
    box-shadow: 0 14px 32px rgba(15,23,42,0.18);
    transform: translateY(-1px) scale(1.01);
}

.brochure-thumb {
    width: 40px;
    height: 40px;
    border-radius: 14px;
    overflow: hidden;
    background: radial-gradient(circle at 30% 0%, #e0f2fe 0, #ffffff 55%);
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid rgba(148, 163, 184, 0.4);
    box-shadow: 0 8px 18px rgba(15,23,42,0.18);
}

.brochure-thumb img {
    width: 85%;
    height: 85%;
    object-fit: contain;
}

/* Texte à côté de l'image (caché sur très petit écran) */
.brochure-label {
    font-size: 0.82rem;
    font-weight: 600;
    color: #0f172a;
    white-space: nowrap;
}
/* ===============================
   HEADER VERSION NOIR PREMIUM
   =============================== */

.header-dark {
    background: #000000;
    border-bottom: 1px solid #d4af37; /* ligne dorée fine */
}

/* Liens menu */
.header-dark .nav-link {
    color: #ffffff !important;
    font-weight: 500;
    transition: .2s ease;
}

.header-dark .nav-link:hover {
    color: #d4af37 !important; /* doré au hover */
}

.header-dark .nav-link.active {
    color: #d4af37 !important;
}

/* Dropdown */
.header-dark .dropdown-menu {
    background: #111;
    border: 1px solid #222;
}

.header-dark .dropdown-menu .dropdown-item {
    color: #fff !important;
}

.header-dark .dropdown-menu .dropdown-item:hover {
    background: #1a1a1a;
    color: #d4af37 !important;
}

/* Logo un peu plus propre */
.logo-navbar {
    height: 70px !important;
    width: auto;
}

/* Bouton Contact en blanc bordé */
.btn-contact-blue {
    background: transparent !important;
    color: #fff !important;
    border: 1px solid #d4af37;
    border-radius: 30px;
    padding: 8px 22px;
    font-weight: 600;
    transition: .2s ease;
}

.btn-contact-blue:hover {
    background: #d4af37 !important;
    color: #000 !important;
}

/* Légères adaptations sur mobile */
@media (max-width: 575.98px) {
    .brochure-pill {
        padding: 3px 10px;
        box-shadow: 0 6px 16px rgba(15,23,42,0.12);
    }
    .brochure-thumb {
        width: 34px;
        height: 34px;
    }
}

/* =============================
   LIGHTBOX CERTIFICATION
   ============================= */

.certif-modal {
    position: fixed;
    inset: 0;
    display: none;
    justify-content: center;
    align-items: center;
    z-index: 999999;
}

.certif-modal.active {
    display: flex;
}

/* Fond sombre flouté */
.certif-overlay {
    position: absolute;
    inset: 0;
    background: rgba(15, 23, 42, 0.65);
    backdrop-filter: blur(6px);
    opacity: 0;
    transition: opacity .35s ease;
}

.certif-modal.active .certif-overlay {
    opacity: 1;
}

/* Boîte contenant l'image */
.certif-content {
    position: relative;
    z-index: 10;
    background: #ffffff;
    border-radius: 20px;
    padding: 18px;
    box-shadow: 0 28px 90px rgba(0,0,0,.35);
    transform: scale(.75) translateY(40px);
    opacity: 0;
    transition: transform .35s ease, opacity .35s ease;
}

/* Animation d'apparition */
.certif-modal.active .certif-content {
    transform: scale(1) translateY(0);
    opacity: 1;
}

/* Image */
.certif-content img {
    max-width: 88vw;
    max-height: 78vh;
    border-radius: 12px;
    object-fit: contain;
}

/* Bouton X */
.certif-close {
    position: absolute;
    top: -12px;
    right: -12px;
    background: #fff;
    border: none;
    font-size: 32px;
    width: 42px;
    height: 42px;
    border-radius: 50%;
    line-height: 0;
    box-shadow: 0 10px 34px rgba(0,0,0,.25);
    cursor: pointer;
    transition: transform .2s ease;
}

.certif-close:hover {
    transform: scale(1.15);
}
</style>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const openBtn = document.getElementById("openCertifModal");
    const modal   = document.getElementById("certifModal");
    const closeBtn = modal ? modal.querySelector(".certif-close") : null;
    const overlay = modal ? modal.querySelector(".certif-overlay") : null;

    if (!openBtn || !modal || !closeBtn || !overlay) return;

    openBtn.addEventListener("click", () => {
        modal.classList.add("active");
    });

    closeBtn.addEventListener("click", () => {
        modal.classList.remove("active");
    });

    overlay.addEventListener("click", () => {
        modal.classList.remove("active");
    });
});
</script>