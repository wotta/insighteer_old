<form action="{{ $route }}" id="account_type_form" method="post" enctype="multipart/form-data">
    @csrf
    @method($method ?? 'post')

    <div class="form-group">
        <label for="name">Naam</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Account type naam">
    </div>

    <div class="form-group">
        <label for="description">Beschrijving</label>
        <textarea class="form-control" name="description" id="description" cols="30" rows="3"></textarea>
    </div>

    <div class="checkbox">
        <label>
            <input type="checkbox" name="is_commercial"> Commercieel
        </label>
    </div>
</form>