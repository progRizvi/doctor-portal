<input type="text" class='form-control' style="border-color: #009EFB" name="city_name" onkeyup="getCity()">
<div style="height:200px; overflow-y: scroll;" class="blood_content">
    @foreach ($areas as $data)
        <div class="py-2 cursor-pointer" style="cursor:pointer" data-id="{{ $data->id }}">
            <span class="checkmark"></span>
            <span class="filter-text">
                {{ $data->name }}
                @php
                    $count = $data->donars
                        ->where('status', 'approved')
                        ->where('blood_group', $group)
                        ->count();
                @endphp
                <span class="badge bg-info">{{ $count }}</span>
            </span>
        </div>
    @endforeach
</div>

<script>
    function getCity() {
        var search = $('[name="city_name"]').val();
        $.ajax({
            url: "{{ route('get.city') }}",
            type: "GET",
            data: {
                search: search,
                group: "{{ $group }}",
            },
            success: function(data) {
                const area = $('.blood_content')
                area.html('')
                let areaList = ''
                $.each(data, function(key, value) {
                    areaList += `
                            <div class="py-2 cursor-pointer" style="cursor:pointer" data-id="${value.id}">
                                <span class="checkmark"></span>
                                    <span class="filter-text">
                                        ${value.name}
                                        <span class="badge bg-info">${value.donars.length}</span>
                                    </span>
                            </div>
                        `
                });
                area.html(areaList)
            }
        });
    }

    $(document).ready(function() {
        $('.blood_content').click(function() {
            const city = $(this).data('id')
            $.ajax({
                method: "GET",
                url: "{{ route('get.blood.donars.by.city') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    city: city,
                    group: "{{ $group }}",
                },
                success: function(res) {
                    $('.donars-list').html(res.donarHtml)
                }
            })
        })
    })
</script>
