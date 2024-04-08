@extends('layouts.admin')
@section('title', '管理画面')

@section('content')





<div class="mt-5 mx-2">
    <div class="bg-white p-4 rounded-lg xs:mb-4 max-w-full shadow-md ">
       
        <div class="flex flex-wrap justify-between h-full">
            <div
                class="flex-1 bg-gradient-to-r from-cyan-400 to-cyan-600 rounded-lg flex flex-col items-center justify-center p-4 space-y-2 border border-gray-200 m-2">
                <i class="fa-solid fa-users text-white text-4xl"></i>
                <p class="text-white">総ユーザー数</p>
                <p class="text-white">{{ $count }}</p>
            </div>
           
        </div>
        
    </div>

    <!-- Tabla -->
    <div class="bg-white rounded-lg p-4 shadow-md my-4">

        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2 text-left border-b-2 w-full">
                        <h2 class="text-ml font-bold text-gray-600">ユーザー</h2>
                    </th>
                </tr>
            </thead>

            @foreach ($users as $user)  
            <tbody>
                <tr class="border-b w-full">
                    <td class="px-4 py-2 text-left align-top w-1/2">
                        <div class="flex">
                            <img class="h-9 w-9 rounded-full text-white mr-6 mt-3" src="{{ asset('storage/'. $user->image) }}" alt="">
                            <div>
                                <a href=""><p class="text-sm font-medium text-slate-700">{{ $user->name }}</p></a>   
                                <p class="text-sm font-medium text-slate-700">{{ $user->email }}</p>   
                                <p class="text-sm font-medium text-slate-700">{{ $user->created_at }}</p> 
                            </div>     
                        </div>
                    </td>
                    {{-- <td class="px-4 py-2 text-right text-cyan-500 w-1/2">
                        <p><span>50$</span></p>
                    </td> --}}
                </tr>
            </tbody>
            @endforeach

        </table>
    </div>
</div>

   
        
        


@endsection