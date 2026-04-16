@extends('layouts.app')

@section('title', $about->heading ?? __('about.page_title'))

@section('content')

<style>
    .about-page{
        font-family: 'Poppins', sans-serif;
        color:#111;
    }

    .about-hero{
        background: url('{{ asset('img/back.png') }}') center center / cover no-repeat;
        min-height: 100vh;
        padding: 70px 20px 100px;
        display: flex;
        align-items: flex-start;
        justify-content: center;
    }

    .about-hero-inner{
        width: 100%;
        max-width: 1050px;
        text-align: center;
    }

    .about-small-title{
        font-size: 34px;
        font-weight: 400;
        color: #E4A42A;
        margin: 0 0 55px;
    }

    .about-main-title{
        font-size: 34px;
        line-height: 1.35;
        font-weight: 800;
        color: #139A43;
        max-width: 900px;
        margin: 0 auto 28px;
    }

    .about-text{
        max-width: 920px;
        margin: 0 auto;
        font-size: 22px;
        line-height: 1.7;
        font-weight: 400;
        color: #111;
    }

    .about-mission-box{
        background: #0FA143;
        max-width: 560px;
        margin: 55px auto 42px;
        padding: 38px 45px 42px;
        color: #fff;
    }

    .about-mission-title{
        margin: 0 0 22px;
        font-size: 34px;
        font-weight: 800;
        color: #fff;
    }

    .about-mission-text{
        margin: 0;
        font-size: 20px;
        line-height: 1.6;
        color: #fff;
    }

    .about-section-title{
        margin: 0 0 35px;
        font-size: 30px;
        font-weight: 700;
        color: #67B94D;
    }

    .about-bottom-text{
        max-width: 960px;
        margin: 0 auto;
        font-size: 20px;
        line-height: 1.65;
        color: #111;
    }

    @media (max-width: 991px){
        .about-hero{
            min-height: auto;
            padding: 55px 16px 70px;
        }

        .about-small-title{
            font-size: 28px;
            margin-bottom: 36px;
        }

        .about-main-title{
            font-size: 28px;
        }

        .about-text,
        .about-bottom-text{
            font-size: 18px;
        }

        .about-mission-title{
            font-size: 28px;
        }

        .about-mission-text{
            font-size: 18px;
        }

        .about-section-title{
            font-size: 26px;
        }
    }

    @media (max-width: 576px){
        .about-small-title{
            font-size: 24px;
        }

        .about-main-title{
            font-size: 24px;
        }

        .about-text,
        .about-bottom-text{
            font-size: 16px;
        }

        .about-mission-box{
            padding: 28px 22px;
        }

        .about-mission-title{
            font-size: 24px;
        }

        .about-mission-text{
            font-size: 16px;
        }

        .about-section-title{
            font-size: 22px;
        }
    }
</style>

<div class="about-page">
    <section class="about-hero">
        <div class="about-hero-inner">
            <h2 class="about-small-title">{{ __('about.who_we_are') }}</h2>

            <h1 class="about-main-title">
                {{ $about->heading ?? __('about.heading_fallback') }}
            </h1>

            <p class="about-text">
                {{ $about->intro ?? __('about.intro_fallback') }}
            </p>

            <div class="about-mission-box">
                <h3 class="about-mission-title">{{ __('about.our_mission') }}</h3>
                <p class="about-mission-text">
                    {{ $about->mission ?? __('about.mission_fallback') }}
                </p>
            </div>

            <h3 class="about-section-title">{{ __('about.infrastructure_methodology') }}</h3>

            <p class="about-bottom-text">
                {{ $about->methodology ?? __('about.methodology_fallback') }}
            </p>
        </div>
    </section>
</div>

@endsection