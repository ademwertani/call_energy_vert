@php
    use App\Models\Banner;
    use Illuminate\Support\Str;

    // Récupérer jusqu'à 4 bannières
    $banners = Banner::orderByDesc('created_at')
        ->take(4)
        ->get();

    // Fallback si aucune bannière
    if ($banners->isEmpty()) {
        $banners = collect([ 
            (object)[
                'title' => 'Call Énergie Vert',
                'image' => 'img/hero-bg-energy.png',
                'summary' => 'Votre partenaire de confiance en relation client & externalisation',
                'description' => 'Centre de contact offshore et acteur BPO, spécialisé dans la gestion de la relation client et les services dédiés au secteur de l\'énergie et de l\'efficacité énergétique.',
            ]
        ]);
    }

    // Première bannière
    $firstBanner = $banners->first();

    // Image du hero
    $heroImg = $firstBanner->image
        ? (Str::startsWith($firstBanner->image, ['http://','https://'])
            ? $firstBanner->image
            : asset('storage/' . ltrim($firstBanner->image, '/')))
        : asset('img/hero-bg-energy.png');

    // Titre, Summary et Description
    $heroTitle = $firstBanner->title ?: 'Notre blog';
    $heroSummary = $firstBanner->summary ?? '';
    $heroDescription = $firstBanner->description ?? '';

    // Payload pour JS
    $bannersPayload = $banners->map(function ($b) {
        $imgPath = $b->image
            ? (Str::startsWith($b->image, ['http://','https://'])
                ? $b->image
                : asset('storage/' . ltrim($b->image, '/')))
            : asset('img/hero-bg-energy.png');

        return [
            'title' => $b->title ?: 'Notre blog',
            'image' => $imgPath,
            'summary' => $b->summary ?? '',
            'description' => $b->description ?? '',
        ];
    })->values();

    $bannersJson = $bannersPayload->toJson();
@endphp

<style>
/* =========================================================
   France Isolation – Header Style (Grand, centré)
   ========================================================= */
   
.page-blog{
  --navy:#242958;
  --navyDark:#1d2760;
  --sky:#7CAE2A;
  --accent:#7CAE2A;
  --ink:#020617;
  --muted:#6b7280;
  --card:#ffffff;
}
.page-blog *{box-sizing:border-box}

/* ---------- TYPO ---------- */
@import url('https://fonts.googleapis.com/css2?family=Epilogue:wght@400;500;600;700;800;900&display=swap');

/* =========================================================
   HERO – Grande taille, plein écran
   ========================================================= */
.pb-hero{
  position: relative;
  color:#fff;

  /* ✅ GRANDE HAUTEUR */
  width: 100%;
  height: 680px;
  min-height: 600px;
  padding: 0;

  overflow: hidden;
  z-index: 1;

  /* Centrer le contenu */
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: center;

  background-color: #0b172f;
  
  /* Image de fond */
  background-image: var(--hero-bg-img, none);
  background-size: cover !important;
  background-position: center center !important;
  background-repeat: no-repeat;
}

/* ❌ SUPPRIMÉ: overlay sombre - image propre */

/* Conteneur du texte */
.pb-hero__inner{
  position: relative;
  z-index: 2;
  max-width: 750px;
  padding: 0 24px;
}

/* Titre principal */
.pb-title{
  font-family: "Epilogue", system-ui, -apple-system, sans-serif !important;
  font-size: clamp(38px, 5.5vw, 64px);
  line-height: 1.1;
  font-weight: 800;
  margin: 0 0 20px;
  color: #fff !important;
  text-shadow: 0 4px 30px rgba(0,0,0,0.6);
  letter-spacing: -0.5px;
}

/* Sous-titre */
.pb-summary{
  font-family: "Epilogue", system-ui, -apple-system, sans-serif !important;
  font-size: clamp(18px, 2vw, 22px);
  line-height: 1.5;
  font-weight: 500;
  margin: 0 0 16px;
  color: #fff !important;
  opacity: .95;
  text-shadow: 0 2px 15px rgba(0,0,0,0.5);
}

/* Description */
.pb-desc{
  font-family: "Epilogue", system-ui, -apple-system, sans-serif !important;
  font-size: clamp(15px, 1.5vw, 17px);
  line-height: 1.75;
  font-weight: 400;
  margin: 0 0 36px;
  color: #fff !important;
  opacity: .9;
  text-shadow: 0 2px 12px rgba(0,0,0,0.5);
  max-width: 650px;
  margin-left: auto;
  margin-right: auto;
}

/* Boutons */
.pb-hero__buttons{
  display: flex;
  justify-content: center;
  gap: 20px;
  margin-top: 0;
  flex-wrap: wrap;
}

.pb-btn{
  display: inline-flex;
  align-items: center;
  justify-content: center;
  padding: 16px 40px;
  font-family: "Epilogue", system-ui, sans-serif;
  font-size: 14px;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 1px;
  border-radius: 50px;
  text-decoration: none;
  transition: all 0.3s ease;
  cursor: pointer;
  border: none;
}

.pb-btn--primary{
  background: #fff;
  color: #7CAE2A;
  box-shadow: 0 4px 20px rgba(255,255,255,0.3);
}

.pb-btn--primary:hover{
  background: #f8f8f8;
  transform: translateY(-3px);
  box-shadow: 0 8px 30px rgba(255,255,255,0.4);
}

.pb-btn--secondary{
  background: #7CAE2A;
  color: #fff;
  box-shadow: 0 4px 20px rgba(124,174,42,0.4);
}

.pb-btn--secondary:hover{
  background: #6a9d22;
  transform: translateY(-3px);
  box-shadow: 0 8px 30px rgba(124,174,42,0.5);
}

.pb-hero__media{display:none !important;}

/* Styles responsives */
@media (max-width: 992px){
  .pb-hero{
    height: 600px;
    min-height: 500px;
  }
  .pb-hero__buttons{
    gap: 16px;
  }
}

@media (max-width: 768px){
  .pb-hero{
    height: 550px;
    min-height: 450px;
  }
  .pb-hero__buttons{
    flex-direction: column;
    align-items: center;
  }
  .pb-btn{
    width: 100%;
    max-width: 260px;
  }
}

@media (max-width: 575.98px){
  .pb-hero{
    height: 500px;
    min-height: 400px;
  }
  .pb-title{
    font-size: clamp(28px, 8vw, 36px);
    margin-bottom: 16px;
  }
  .pb-summary{
    font-size: 16px;
    margin-bottom: 12px;
  }
  .pb-desc{
    font-size: 14px;
    margin-bottom: 28px;
  }
  .pb-btn{
    padding: 14px 32px;
    font-size: 13px;
  }
}
</style>

<section class="page-blog">
  <header class="pb-hero"
          style="--hero-bg-img: url('{{ $heroImg }}');">
    <div class="container pb-hero__inner">
      
      <h1 class="pb-title">{{ $heroTitle }}</h1>
      
      @if($heroSummary)
      <p class="pb-summary">{{ $heroSummary }}</p>
      @endif
      
      @if($heroDescription)
      <p class="pb-desc">{{ $heroDescription }}</p>
      @endif
      
      <div class="pb-hero__buttons">
        <a href="#contact" class="pb-btn pb-btn--primary">Nous contacter</a>
        <a href="#services" class="pb-btn pb-btn--primary">Nos services</a>
      </div>
      
    </div>
  </header>
</section>