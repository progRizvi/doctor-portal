<form action="{{ isset($url) ? $url : route('service.doctors') }}" id="search">
    <div class="search-input search-line" style="width:59%!important">
        <i class="feather-search bficon"></i>
        <div class=" mb-0">
            <input type="text" class="form-control"
                placeholder="{{ isset($url) ? __('website.search_hospitals') : __('website.search_doctors') }}"
                name="search">
        </div>
    </div>
    <div class="search-input search-map-line">
        <i class="feather-map-pin"></i>
        <a class="btn" href="#" data-bs-toggle="modal" data-bs-target="#searchLocation">
            {{ __('website.location') }}</a>
    </div>
    <div class="form-search-btn">
        <button class="btn" type="submit">{{ __('website.search') }}</button>
    </div>
</form>
