@extends('layouts.app')

@section('title', __('sectors.page_title'))

@section('content')

<style>
.secteurs-exact{
    background:#FAFAFA;
    padding: 70px 8px 20px;
    font-family:'Inter', sans-serif;
}

    .secteurs-exact .wrap{
        max-width: 1440px;
        margin: 0 auto;
    }

    .secteurs-exact .grid{
        display:grid;
        grid-template-columns: 1fr 1fr;
        column-gap: 70px;
        row-gap: 34px;
        align-items:start;
    }

    .secteurs-exact .title{
        color:#00b15d;
        font-weight:800;
        font-size:72px;
        line-height:0.96;
        letter-spacing:-2px;
        margin:0;
    }

    .secteurs-exact .sub-title{
        color:#00b15d;
        font-weight:800;
        font-size:64px;
        line-height:0.98;
        letter-spacing:-1.8px;
        margin:0;
    }

    .secteurs-exact .desc{
        max-width:520px;
        margin:22px 0 0;
        font-size:18px;
        line-height:1.7;
        color:#111;
        font-weight:500;
    }

    .secteurs-exact .list{
        margin:12px 0 0;
        padding-left:20px;
        font-size:18px;
        line-height:1.8;
        color:#111;
        font-weight:500;
    }

    .secteurs-exact .img-box{
        width:100%;
        display:flex;
        justify-content:flex-start;
    }

    .secteurs-exact .img-box.right{
        justify-content:flex-start;
    }

    .secteurs-exact .img{
        width:100%;
        max-width:680px;
        height:470px;
        object-fit:cover;
        border-radius:30px;
        border:1.5px solid #f0c85c;
        display:block;
    }

    .secteurs-exact .mini-grid{
        display:grid;
        grid-template-columns: repeat(2, 1fr);
        gap:8px;
        max-width:610px;
        margin-top:24px;
    }

    .secteurs-exact .mini-card{
        min-height:250px;
        border-radius:24px;
        border:1.5px solid #f0c85c;
        display:flex;
        align-items:center;
        justify-content:center;
        text-align:center;
        padding:18px;
        background:
            radial-gradient(circle at center,
                #ffffff 0%,
                #ffffff 28%,
                #eefaf2 40%,
                #cfead8 68%,
                #9fd4b3 100%);
        box-shadow: inset 0 0 22px rgba(255,255,255,0.7);
        color:#1d1d1d;
        font-size:26px;
        line-height:1.35;
        font-weight:500;
    }

    .secteurs-exact .mini-card.beige{
        background:
            radial-gradient(circle at center,
                #ffffff 0%,
                #ffffff 28%,
                #f6f1e8 40%,
                #e5d8bf 68%,
                #cfbb95 100%);
    }

    .secteurs-exact .btn-wrap{
        padding-top: 18px;
    }

    .secteurs-exact .btn-green{
        display:inline-flex;
        align-items:center;
        justify-content:center;
        min-width:190px;
        height:64px;
        padding:0 28px;
        background:#00a94f;
        color:#fff;
        text-decoration:none;
        border-radius:20px;
        font-size:28px;
        font-weight:700;
        line-height:1;
    }

    .secteurs-exact .btn-green:hover{
        color:#fff;
        background:#004d24;
    }

    .secteurs-exact .spacer-lg{
        height:52px;
    }

    @media (max-width: 1200px){
        .secteurs-exact .title,
        .secteurs-exact .sub-title{
            font-size:48px;
        }

        .secteurs-exact .img{
            height:360px;
            max-width:100%;
        }

        .secteurs-exact .mini-card{
            min-height:170px;
            font-size:20px;
        }

        .secteurs-exact .btn-green{
            min-width:150px;
            height:54px;
            font-size:22px;
        }

        .secteurs-exact .desc,
        .secteurs-exact .list{
            font-size:16px;
        }
    }

    @media (max-width: 991px){
        .secteurs-exact{
            padding:25px 16px 40px;
        }

        .secteurs-exact .grid{
            grid-template-columns:1fr;
            row-gap:24px;
        }

        .secteurs-exact .title,
        .secteurs-exact .sub-title{
            font-size:36px;
            line-height:1.05;
        }

        .secteurs-exact .img{
            height:auto;
            aspect-ratio: 16 / 10;
            border-radius:20px;
        }

        .secteurs-exact .mini-grid{
            max-width:100%;
        }

        .secteurs-exact .mini-card{
            min-height:140px;
            font-size:18px;
            border-radius:18px;
        }

        .secteurs-exact .btn-green{
            font-size:18px;
            height:48px;
            border-radius:14px;
        }

        .secteurs-exact .desc,
        .secteurs-exact .list{
            font-size:14px;
        }
    }

    @media (max-width: 575px){
        .secteurs-exact .title,
        .secteurs-exact .sub-title{
            font-size:28px;
        }

        .secteurs-exact .mini-card{
            font-size:15px;
            min-height:110px;
            padding:12px;
        }

        .secteurs-exact .desc,
        .secteurs-exact .list{
            font-size:13px;
        }
    }
</style>

@php
    $energyItems = trans('sectors.energy_items');
    $fintechCards = trans('sectors.fintech_cards');
    $telecomItems = trans('sectors.telecom_items');
    $tourismItems = trans('sectors.tourism_items');
@endphp

<div class="secteurs-exact">
    <div class="wrap">
        <div class="grid">

            <div>
                <h2 class="title">{!! nl2br(e(__('sectors.energy_title'))) !!}</h2>

                <p class="desc">
                    {{ __('sectors.energy_desc') }}
                </p>

                <ul class="list">
                    @foreach($energyItems as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>

            <div class="img-box right">
                <img src="{{ asset('img/secteur-energie.png') }}" alt="{{ __('sectors.energy_alt') }}" class="img">
            </div>

            <div>
                <div class="mini-grid">
                    @foreach($fintechCards as $index => $card)
                        <div class="mini-card {{ in_array($index, [0, 3]) ? 'beige' : '' }}">
                            {!! nl2br(e($card)) !!}
                        </div>
                    @endforeach
                </div>
            </div>

            <div>
                <h2 class="sub-title">{{ __('sectors.fintech_title') }}</h2>

                <p class="desc">
                    {{ __('sectors.fintech_desc') }}
                </p>

                <div class="spacer-lg"></div>

                <div class="btn-wrap">
                    <a href="{{ route('contact.create') }}" class="btn-green">{{ __('sectors.read_more') }}</a>
                </div>
            </div>

            <div>
                <h2 class="sub-title">{!! nl2br(e(__('sectors.ecommerce_title'))) !!}</h2>

                <p class="desc">
                    {{ __('sectors.ecommerce_desc') }}
                </p>
            </div>

            <div class="img-box right">
                <img src="{{ asset('img/secteur-ecommerce.png') }}" alt="{{ __('sectors.ecommerce_alt') }}" class="img">
            </div>

            <div class="img-box">
                <img src="{{ asset('img/secteur-telecom.png') }}" alt="{{ __('sectors.telecom_alt') }}" class="img">
            </div>

            <div>
                <h2 class="sub-title">{{ __('sectors.telecom_title') }}</h2>

                <p class="desc">
                    {{ __('sectors.telecom_desc') }}
                </p>

                <ul class="list">
                    @foreach($telecomItems as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>

            <div>
                <h2 class="sub-title">{{ __('sectors.tourism_title') }}</h2>

                <ul class="list" style="margin-top:18px;">
                    @foreach($tourismItems as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>

            <div class="img-box right">
                <img src="{{ asset('img/secteur-tourisme.png') }}" alt="{{ __('sectors.tourism_alt') }}" class="img">
            </div>

        </div>
    </div>
</div>

@endsection