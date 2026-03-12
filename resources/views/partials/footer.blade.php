<!-- ===== FOOTER (comme la capture) ===== -->
<style>
  .footer-aisla{
    --accent:#7CAE2A;
    --ink:#E9EDFF;
    --muted:#BFC7FF;
  }

  /* background image + overlay */
  .footer.footer-aisla{
    background:url("{{ asset('img/foot.png') }}") center/cover no-repeat;
    position:relative;
    color:var(--ink);
    overflow:hidden;
    padding-top:60px;
    padding-bottom:25px;
  }
  .footer.footer-aisla::before{
    content:"";
    position:absolute;
    inset:0;
    background:rgba(10,10,10,.72);
    z-index:0;
  }
  .footer.footer-aisla .container{
    position:relative;
    z-index:1;
  }

  /* Titles with green underline */
  .footer-aisla .section-title{
    font-weight:700;
    color:#fff;
    margin-bottom:20px;
    position:relative;
    display:inline-block;
  }
  .footer-aisla .section-title::after{
    content:"";
    display:block;
    width:60px;
    height:3px;
    background:var(--accent);
    border-radius:2px;
    margin-top:10px;
  }

  /* left logo */
  .footer-aisla .logo-navbar{
    max-height:28px;
    margin-bottom:20px;
    display:block;
  }

  /* Social list (like capture) */
  .footer-aisla .social-list{
    list-style:none;
    padding:0;
    margin:0;
  }
  .footer-aisla .social-list li{
    display:flex;
    align-items:center;
    gap:10px;
    margin-bottom:8px;
    color:#fff;
    font-weight:600;
  }
  .footer-aisla .social-list i{
    width:18px;
    text-align:center;
    color:#fff;
    opacity:.95;
  }

  /* Contact list (green circle icons) */
  .footer-aisla .contact-list{
    list-style:none;
    padding:0;
    margin:0;
  }
  .footer-aisla .contact-item{
    display:flex;
    align-items:flex-start;
    gap:14px;
    margin-bottom:14px;
    color:#fff;
  }
  .footer-aisla .contact-item a,
  .footer-aisla a{
    color:#fff;
    text-decoration:none;
  }
  .footer-aisla a:hover{ opacity:.9; }

  .footer-aisla .contact-item .icon{
    width:44px;
    height:44px;
    border-radius:50%;
    background:var(--accent);
    display:flex;
    align-items:center;
    justify-content:center;
    flex:0 0 44px;
    margin-top:2px;
  }
  .footer-aisla .contact-item .icon i{
    color:#fff;
    font-size:18px;
  }
  .footer-aisla .contact-item .txt{
    line-height:1.55;
    opacity:.95;
  }

  /* Right links with green arrow */
  .footer-aisla .short-link{
    display:flex;
    flex-direction:column;
    gap:18px;
    margin-top:8px;
  }
  .footer-aisla .short-link a{
    display:flex;
    align-items:center;
    gap:12px;
    color:#fff;
    font-weight:600;
  }
  .footer-aisla .short-link i{
    color:var(--accent);
  }

  /* ===== Newsletter big bar (like capture) ===== */
  .footer-aisla .newsletter-bar{
    margin:55px auto 35px;
    background:#0E8F3F;
    border-radius:28px;
    padding:22px 26px;
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:22px;
    box-shadow:0 18px 40px rgba(0,0,0,.35);
  }

  .footer-aisla .newsletter-left{
    display:flex;
    align-items:center;
    gap:16px;
    color:#fff;
    font-weight:800;
    font-size:32px;
    white-space:nowrap;
  }

  .footer-aisla .newsletter-left .mail-ico{
    width:54px;
    height:54px;
    border-radius:16px;
    background:rgba(255,255,255,.15);
    display:flex;
    align-items:center;
    justify-content:center;
  }
  .footer-aisla .newsletter-left .mail-ico i{
    font-size:26px;
    color:#fff;
  }

  .footer-aisla .newsletter-form{
    flex:1;
    display:flex;
    align-items:center;
    gap:14px;
  }

  .footer-aisla .newsletter-input{
    flex:1;
    height:52px;
    border:none;
    outline:none;
    border-radius:26px;
    padding:0 22px;
    font-size:15px;
    color:#1a1a1a;
  }

  .footer-aisla .newsletter-btn{
    height:52px;
    padding:0 34px;
    border:none;
    border-radius:26px;
    background:#61B62E;
    color:#fff;
    font-weight:800;
    cursor:pointer;
    transition:.15s ease;
  }
  .footer-aisla .newsletter-btn:hover{
    transform:translateY(-1px);
    opacity:.95;
  }

  /* bottom bar */
  .footer-aisla .footer-bottom{
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:20px;
    padding-top:18px;
    border-top:1px solid rgba(255,255,255,.18);
    font-size:15px;
    color:#fff;
    opacity:.95;
  }
  .footer-aisla .footer-bottom .bottom-links{
    display:flex;
    gap:44px;
    flex-wrap:wrap;
    justify-content:flex-end;
  }
  .footer-aisla .footer-bottom .bottom-links a{
    color:#fff;
    text-decoration:none;
    opacity:.95;
  }
  .footer-aisla .footer-bottom .bottom-links a:hover{ opacity:.85; }

  /* responsive */
  @media (max-width: 992px){
    .footer-aisla .newsletter-bar{
      flex-direction:column;
      align-items:stretch;
    }
    .footer-aisla .newsletter-left{
      font-size:26px;
      justify-content:center;
      white-space:normal;
      text-align:center;
    }
    .footer-aisla .footer-bottom{
      flex-direction:column;
      text-align:center;
    }
    .footer-aisla .footer-bottom .bottom-links{
      justify-content:center;
      gap:18px;
    }
  }
</style>

<div class="container-fluid footer footer-aisla">
  <div class="container">

    <!-- TOP ROW (3 columns like capture) -->
    <div class="row g-5 align-items-start">

      <!-- LEFT: logo + réseaux sociaux -->
      <div class="col-lg-4 col-md-12">
        <img src="{{ asset('img/logo.png') }}" alt="Call energie vert" class="logo-navbar">

        <h4 class="section-title">Réseaux Sociaux</h4>
        <ul class="social-list">
          <li><i class="fab fa-facebook-f"></i> Facebook</li>
          <li><i class="fab fa-tiktok"></i> TikTok</li>
          <li><i class="fab fa-linkedin-in"></i> Linked In</li>
          <li><i class="fab fa-instagram"></i> Instagram</li>
        </ul>
      </div>

      <!-- CENTER: contact -->
      <div class="col-lg-4 col-md-12">
        <h4 class="section-title">Contact</h4>
        <ul class="contact-list mt-4">
          <li class="contact-item">
            <span class="icon"><i class="fas fa-phone"></i></span>
            <div class="txt">+216 20 860 652</div>
          </li>
          <li class="contact-item">
            <span class="icon"><i class="fas fa-envelope"></i></span>
            <div class="txt"><a href="mailto:recrutement@eco-call.fr">recrutement@eco-call.fr</a></div>
          </li>
          <li class="contact-item">
            <span class="icon"><i class="fas fa-map-marker-alt"></i></span>
            <div class="txt">Menzah 5 · 76 Ave d’Afrique, Ariana, 2037, Tunisie</div>
          </li>
        </ul>
      </div>

      <!-- RIGHT: à propos links -->
      <div class="col-lg-4 col-md-12">
        <h4 class="section-title">À Propos</h4>
        <div class="short-link">
          <a href="#"><i class="fas fa-caret-right"></i> Qui sommes-nous</a>
          <a href="#"><i class="fas fa-caret-right"></i> Nos services</a>
          <a href="#"><i class="fas fa-caret-right"></i> Nos secteurs d’activité</a>
          <a href="#"><i class="fas fa-caret-right"></i> Carrières / Recrutement</a>
        </div>
      </div>

    </div>

    <!-- NEWSLETTER BAR (big green like capture) -->
    <div class="newsletter-bar">
      <div class="newsletter-left">
        <div class="mail-ico"><i class="fas fa-envelope"></i></div>
        <span>Subscribe To Our Newsletter.</span>
      </div>

      <form class="newsletter-form" action="#" method="post">
        <input type="email" class="newsletter-input" placeholder="Enter Your Email Address..." required>
        <button type="submit" class="newsletter-btn">Subscribe</button>
      </form>
    </div>

    <!-- BOTTOM -->
    <div class="footer-bottom">
      <div>© Copyright Energie Vert 2026. Tous Droits Réservés.</div>
      <div class="bottom-links">
        <a href="#">Privacy Policy</a>
        <a href="#">Terms &amp; Conditions</a>
        <a href="#">About Us</a>
      </div>
    </div>

  </div>
</div>
<!-- ===== END FOOTER ===== -->