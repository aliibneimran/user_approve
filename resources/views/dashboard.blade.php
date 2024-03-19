<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("All User") }}
                    @if ($users->isEmpty())
                        <h1>No Pending User</h1>
                    @else
                    <table class="table table-dark">
                        <tbody>
                            <tr>
                                <td>SI</td>
                                <td>User Name</td>
                                <td>Email</td>
                                <td>Action</td>
                            </tr>
                        </tbody>
                        <tbody>
                            @php
                                $no =1
                            @endphp
                            @foreach ($users as $item)
                            @if (!$item->approved)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>
                                    <a href="{{ route('user.accept', $item->id) }}" class="btn btn-success">Accept</a>
                                    <a href="{{ route('user.decline',  $item->id) }}" class="btn btn-danger">Decline</a>  
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
