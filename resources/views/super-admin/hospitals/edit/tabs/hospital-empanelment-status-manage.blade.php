
                <div class="table-responsive mt-3">
                    @if (count($empanelments) > 0)
                        <table id="basics-datatable" class="table table-hover">
                            <thead class="thead-grey">
                                <tr>
                                    <th scope="col">Company</th>
                                    <th scope="col">Company Type</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($empanelments as $empanelment)
                                    <tr>
                                        <th scope="row">{{ @$empanelment->company->company }}</th>
                                        <th scope="row">{{ $empanelment->company_type }}</th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-center">No TPA found.</p>
                    @endif
                </div>
                {{ $empanelments->withQueryString()->links('pagination::bootstrap-4') }}
