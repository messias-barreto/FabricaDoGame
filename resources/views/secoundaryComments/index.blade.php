@foreach ($secoundComment as $c)
    <div class="card-body row">
        <div class="col-4">
            <strong>{{ $c->name }}</strong>
            </div> <div class="col-8">
                {{ $c->comment }}
            </div>
        </div>    
    </div>
@endforeach