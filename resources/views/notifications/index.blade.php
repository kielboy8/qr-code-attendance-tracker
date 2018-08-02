@extends ('layouts.admin')

@section ('content')
@include ('layouts.sidebar')
<main role="main" class="col ml-sm-auto pt-4 px-5">
    <div class="container-fluid">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 ">
            <h1 class="h2">Notifications</h1>
        </div>
        <div class="row">
            <div class="col">
                <div class="card px-3 py-2 border-0 bg-white shadow mb-3">
                    <table class="table">
                        <tbody>
                            @forelse($notifications as $notification)
                            <tr>
                                <td>
                                    <div class="d-flex flex-row align-items-center">
                                        <img src="/storage/employee/images/{{ $notification->data['profile-image'] }}" class="mr-3 profile-icon rounded-circle shadow">
                                        <div class="d-flex flex-column">
                                            <p class="mb-0 lead">{{ $notification->data['name']  . ' ' . $notification->data['status'] }}</p>
                                            <p class="mb-0 text-muted"><small>{{ $notification->created_at->diffForHumans() }}</small></p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="lead">No notifications.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-end">
                    {{ $notifications->links() }}
                </div>
            </div> 
        </div>
    </div>
</main>
@endsection