<style>
    h3 {
        font-size: 25px;
        font-family: sans-serif;
        margin-top: 15px;
        margin-bottom: 15px;
    }
</style>


<h3>Ultimos Posts</h3>
<hr />

@foreach ($secondaryarticles as $art)
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ asset("img/article/{$art->image}") }}" width="80px"> 
                </div>
                <div class="col-md-8">
                    <p>{{ $art->title }}</p>
                </div>
            </div>
        </div>
    </div>
@endforeach

<h3>Ultimos Detonados</h3>
<hr />
