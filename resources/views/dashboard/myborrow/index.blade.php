@extends('layouts.dashboard')

@section('title','My Borrowings')

@section('content')

<div class="max-w-7xl mx-auto space-y-8">

    <div>

        <h1 class="text-3xl font-black">

            My Borrowings

        </h1>

        <p class="text-slate-500">

            History of all your borrowing requests.

        </p>

    </div>

    <div class="bg-white rounded-3xl shadow overflow-hidden">

        <table class="w-full">

            <thead class="bg-slate-100">

                <tr>

                    <th class="p-4">Code</th>

                    <th>Asset</th>

                    <th>Borrow Date</th>

                    <th>Return Date</th>

                    <th>Status</th>

                    <th></th>

                </tr>

            </thead>

            <tbody>

            @forelse($borrowings as $borrow)

            <tr class="border-t">

                <td class="p-4">

                    {{ $borrow->borrow_code }}

                </td>

                <td>

                    {{ $borrow->product->name }}

                </td>

                <td>

                    {{ $borrow->borrow_date }}

                </td>

                <td>

                    {{ $borrow->expected_return_date }}

                </td>

                <td>

                    @if($borrow->status=='Pending')

                        <span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700">

                            Pending

                        </span>

                    @elseif($borrow->status=='Approved')

                        <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-700">

                            Approved

                        </span>

                    @elseif($borrow->status=='Rejected')

                        <span class="px-3 py-1 rounded-full bg-red-100 text-red-700">

                            Rejected

                        </span>

                    @else

                        <span class="px-3 py-1 rounded-full bg-green-100 text-green-700">

                            Returned

                        </span>

                    @endif

                </td>

                <td>

                    <a
                        href="{{ route('myborrow.show',$borrow) }}"
                        class="text-pink-600 font-semibold">

                        Detail

                    </a>

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="6" class="p-10 text-center text-slate-500">

                    No borrowing history found.

                </td>

            </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection