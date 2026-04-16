@extends('layouts.app')

@section('title', __('services.page_title'))

@section('content')

<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800;900&display=swap');

  .page-services {
    font-family: 'Poppins', sans-serif;
    background: url('{{ asset('img/back.png') }}') center center / cover no-repeat fixed;
    min-height: 100vh;
    padding: 60px 20px 80px;
  }

  .page-services * { box-sizing: border-box; }

  .sx-heading {
    text-align: center;
    max-width: 780px;
    margin: 0 auto 55px;
    font-size: clamp(22px, 3.2vw, 36px);
    font-weight: 800;
    line-height: 1.35;
    color: #111;
  }

  .sx-heading span {
    color: #7CAE2A;
  }

  .svc-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 28px;
    max-width: 780px;
    margin: 0 auto;
  }

  @media (max-width: 575.98px) {
    .svc-grid { grid-template-columns: 1fr; }
  }

  .card-svc {
    background: #fff;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 24px rgba(0,0,0,0.08);
    display: flex;
    flex-direction: column;
    transition: transform .22s ease, box-shadow .22s ease;
    text-decoration: none;
    color: inherit;
  }

  .card-svc:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 36px rgba(0,0,0,0.13);
    text-decoration: none;
    color: inherit;
  }

  .card-svc .thumb {
    width: 100%;
    aspect-ratio: 4/3;
    overflow: hidden;
    background: #e8f0d8;
  }

  .card-svc .thumb img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform .3s ease;
  }

  .card-svc:hover .thumb img {
    transform: scale(1.04);
  }

  .card-svc .card-label {
    padding: 14px 18px 16px;
    background: #f7f9f4;
    font-size: 15px;
    font-weight: 600;
    color: #1a1a1a;
    line-height: 1.4;
    border-top: 2px solid #e8f0d8;
  }

  .svc-empty {
    background: rgba(255,255,255,0.85);
    border: 1px dashed #c8dba8;
    border-radius: 16px;
    padding: 40px;
    text-align: center;
    color: #555;
    max-width: 600px;
    margin: 0 auto;
  }
</style>

<section class="page-services">

  <h1 class="sx-heading">
    {{ __('services.heading_before') }}
    <span>{{ __('services.heading_highlight') }}</span>
    {{ __('services.heading_after') }}
  </h1>

  @if($services->count())
    <div class="svc-grid">
      @foreach($services as $service)
        @php
          $img = $service->image;
          $src = \Illuminate\Support\Str::startsWith($img, ['http://','https://','/','storage/'])
                ? asset($img)
                : asset('storage/'.$img);
        @endphp

        <a href="{{ route('services.show', $service->id) }}" class="card-svc wow fadeInUp"
           data-wow-delay="{{ number_format(($loop->index % 4) * 0.1, 1) }}s">
          <div class="thumb">
            @if($service->image)
              <img src="{{ $src }}" alt="{{ $service->name }}" loading="lazy">
            @else
              <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;">
                <i class="fa fa-image fa-3x" style="color:#b5cfa0;"></i>
              </div>
            @endif
          </div>

          <div class="card-label">{{ $service->name }}</div>
        </a>
      @endforeach
    </div>

    @if(method_exists($services, 'links'))
      <div class="mt-4 d-flex justify-content-center">
        {{ $services->links() }}
      </div>
    @endif

  @else
    <div class="svc-empty">
      <p class="h5 mb-1">{{ __('services.empty_title') }}</p>
      <p class="mb-0">
        {{ __('services.empty_text_before') }}
        <a href="{{ url('/contact') }}">{{ __('services.contact_link') }}</a>
        {{ __('services.empty_text_after') }}
      </p>
    </div>
  @endif

</section>

@endsection