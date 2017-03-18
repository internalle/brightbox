<br>
<div class="row">
    <div class="col-xs-9">
        @if(count($errors) > 0)
            <div class="alert alert-danger col-xs-10 " >

                <ul>
                    @foreach($errors->all() as $error)
                        <li>
                            {{$error}}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>