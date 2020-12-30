<style>
    #search{
        display: flex;
        flex-direction: column;
        align-items: flex-end;
    }
    .show{
        display: none;
    }
</style>

<div id = "search">
    <div>
        <input class="search_bar" type="text"/>
    </div>
    <div class="show">
        @if(isset($forSide))
            @foreach($forSide as $side)
               <a name="{{ $side->title }}" href="{{ route('notes.show', $side->id) }}">{{ $side->title }} </a>
            @endforeach
        @endif
    </div>
</div>

<script>

    $('.search_bar').keyup(function () {
        filter();
        return false;
    })

    $('.search_bar').keypress(function () {
        if (event.keyCode == 13) {
            filter();
            return false;
        }
    })

    function filter(){
        var search = $('.search_bar').val();
        // var searchUp = $('.search_bar').val().toUpperCase();
        // var searchDown = $('.search_bar').val().toLowerCase();
        $.ajax({
            url: "/search",
            data: { texts : search },
            type: "GET",
            dataType: "json"
        }).done(function(res) {
            console.log(res)
            $('.show').html('<a href= "#" >' + res.note.title + '</a>')
        }).fail(function() {
            $('.show').css('display', 'none');
        })
    }
</script>

