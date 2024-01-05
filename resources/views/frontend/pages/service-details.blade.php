<div class="modal-content"  style="margin-top: 120px">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ $data->title }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <img class="img-fluid" src="{{$data->image}}" alt="">
        <div class="mt-4">
            {!! $data->description !!}
        </div>
    </div>
</div>
