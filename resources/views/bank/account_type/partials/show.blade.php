<table class="table table-striped">
    <tbody>
        <tr>
            <th scope="row">#</th>
            <td>{{ $accountType->getId() }}.</td>
        </tr>
        <tr>
            <th scope="row">Type</th>
            <td>{{ $accountType->getName() }}</td>
        </tr>
        <tr>
            <th scope="row">Beschrijving</th>
            <td>{{ $accountType->getDescription() }}</td>
        </tr>
        <tr>
            <th scope="row">Aantal</th>
            <td>5</td>
        </tr>
        <tr>
            <th scope="row">Acties</th>
            <td>
                <form action="{{ route('account-types.destroy', $accountType->getId()) }}" method="post">
                    @csrf
                    @method('delete')

                    <button class="btn btn-default btn-sm"><i data-feather="trash-2"></i></button>
                </form>
            </td>
        </tr>
    </tbody>
</table>