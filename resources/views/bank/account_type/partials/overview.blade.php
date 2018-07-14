<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Type</th>
            <th>Aantal</th>
            <th>Acties</th>
        </tr>
    </thead>
    <tbody>
        @foreach($accountTypes as $accountType)
            <tr>
                <td><a href="{{ route('account-types.show', $accountType->getId()) }}">{{ $accountType->getId() }}</a>.</td>
                <td>{{ $accountType->getName() }}</td>
                <td><span class="badge bg-red">5</span></td>
                <td>
                    <form action="{{ route('account-types.destroy', $accountType->getId()) }}" method="post">
                        @csrf
                        @method('delete')

                        <button class="btn btn-default btn-sm"><i data-feather="trash-2"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>