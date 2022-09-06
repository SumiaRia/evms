<section id="hotels" class="section-with-bg wow fadeInUp">

  <div class="container">
    <div class="section-header">
      <h2>Our More Exciting Service</h2>
      <p>Here some special dervice for you</p>
    </div>

    <div class="row">

      @foreach($services as $service)
        <div class="col-lg-4 col-md-6">
          <div class="hotel">
            <div class="hotel-img">
              <img src="{{ $service->photo->getUrl() }}" alt="{{ $service->name }}" class="img-fluid">
            </div>
            <h3><a href="http://127.0.0.1:8000/price{{$idents++}}">{{ $service->name }}</a></h3>
            <div class="stars">
              @for($i = 0; $i < $service->rating; $i++)
                <i class="fa fa-star"></i>
              @endfor
            </div>
            <p>{{ $service->description }}</p>
          </div>
        </div>
      @endforeach
    </div>
  </div>

</section>
