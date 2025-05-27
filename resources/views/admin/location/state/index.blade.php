@extends('admin.layouts.master')

@section('contents')
    <section class="section">
        <div class="section-header">
            <h1>Locations</h1>
        </div>

        <div class="section-body">
        </div>
    </section>

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>All Location Types</h4>
                <div class="card-header-form">
                    <form action="{{ route('admin.states.index') }}" method="get">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request('search') }}">
                            <div class="input-group-btn">
                                <button type="submit" style="height: 40px" class="btn btn-primary"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>

                </div>
                <a href="{{ route('admin.states.create') }}" class="btn btn-primary"><i
                        class="fas fa-plus-circle"></i>Create New</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tr>
                            <td>States</td>
                            <td>Countries</td>
                            <td style="width :10%">Action</td>
                        </tr>
                        <tbody>
                            @forelse ($states as $state)
                                <tr>
                                    <td>{{ $state->name }}</td>
                                    <td>{{ $state->country?->name }}</td>
                                    <td>
                                        <a href="{{ route('admin.states.edit', $state->id) }}"
                                            class="btn-sm btn btn-primary"><i class="fas fa-edit"></i></a>
                                        <a href="javascript:void(0);"
                                            data-url="{{ route('admin.states.destroy', $state->id) }}"
                                            class="btn-sm btn btn-danger delete-item">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>

                                    </td>
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">No Result Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer text-right">
                <nav class="d-inline-block">
                    @if ($states->hasPages())
                        {{ $states->withQueryString()->links() }}
                    @endif
                </nav>
            </div>
        </div>
    </div>
@endsection
