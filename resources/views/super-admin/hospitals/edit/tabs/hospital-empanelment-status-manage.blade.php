<div class="table-responsive mt-3">
    @if (count($empanelments) > 0)
        <table id="basics-datatable" class="table table-hover">
            <thead class="thead-grey">
                <tr>
                    <th scope="col">Company</th>
                    <th scope="col">Company Type</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($empanelments as $empanelment)
                    <tr>
                        <td scope="row">{{ @$empanelment->company->company }}</td>
                        <td scope="row">{{ $empanelment->company_type }}</td>
                        <td scope="row">
                            <a href="{{ route('super-admin.hospitals.edit', $hospital->id) }}?company_id={{ $empanelment->id }}" class="btn btn-primary"><i class="mdi mdi-pencil"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="text-center">No TPA found.</p>
    @endif
</div>
{{ $empanelments->withQueryString()->links('pagination::bootstrap-4') }}
