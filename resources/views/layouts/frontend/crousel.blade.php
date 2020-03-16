<div class="row mt-3">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('assets/banners') . '/' . $setting->carousel_img1 }}" class="d-block w-100" alt="img">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('assets/banners') . '/' . $setting->carousel_img2 }}" class="d-block w-100" alt="img">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('assets/banners') . '/' . $setting->carousel_img3 }}" class="d-block w-100" alt="img">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>