@extends('layouts.admin.app')

@section('title', 'Admin Conversations')
@section('content')
<div class="h-screen">
    <div class="full-wrapper h-full min-h-full flex flex-auto">
        <div class="flex-auto w-full">
            <div data-v-591b0e1e="" class="sm:flex h-full">
                <div data-v-591b0e1e="" class="w-full md:w-80 h-full sm:bg-gray-50">
                    <h1 data-v-591b0e1e="" class="sm:w-80 pt-4 sm:pt-0 md:pt-8 px-4 font-bold text-3xl">
                        Conversations de {{ $chatter_name->name }}
                    </h1>
                    @foreach($contacts as $contact)
                    <a class="text-decoration-none" href="{{ route('admin.conversations', ['chatter_id' => $chatter_id, 'target_id' => $contact->id]) }}">
                        <div class="max-h-chat mt-6">
                            <div
                                class="h-16 py-2 px-4 cursor-pointer hover:bg-gray-200 transform duration-200 @if($contact->id == $target_id) bg-gray-400 @else bg-gray-100 @endif">
                                <div class="relative w-12">
                                    <div class="relative float-left h-12 bg-gray-100 w-12 mr-3 rounded-full overflow-hidden">
                                        <img src="/storage/{{ $contact->avatar }}"
                                            class="absolute top-1/2 transform -translate-y-1/2 rounded-full object-cover z-10">
                                        <div class="h-12 absolute inset-0 flex justify-center items-center z-0"><span
                                                class="text-tiny font-semibold text-gray-800 m-auto">
                                                O
                                            </span></div>
                                    </div>
                                    <!---->
                                </div>
                                <div class="flex py-1 overflow-auto">
                                    <div class="flex-grow overflow-auto">
                                        <h6 class="text-sm leading-5">
                                            {{ $contact->name }}
                                        </h6>
                                        <p class="text-sm leading-5 whitespace-nowrap truncate text-gray-700"><span>
                                                hi
                                            </span></p>
                                    </div>
                                    <div class="w-20 overflow-hidden text-xxs text-right flex-shrink-0 text-gray-700">
                                        il y a 9 jours
                                    </div>
                                </div>
                            </div>
                            <div data-v-591b0e1e="" class="load-more h-1"></div>
                        </div>
                    </a>
                    
                    @endforeach
                </div>
                @if($contacts->contains('id', $target_id))
                <div data-v-591b0e1e="" class="absolute md:relative inset-0 inline-block w-full h-full bg-white z-10">
                    <div data-v-591b0e1e="" class="flex flex-col h-full pb-16 md:pb-0">
                        <div class="flex justify-between md:hidden px-4 md:px-10 pt-6 pb-4"><a href="{{ url()->previous() }}" class="focus:outline-none mr-2"><i class="bi bi-arrow-left"></i></a> <span
                                class="flex items-center text-gray-800 text-sm">
                                <div class="relative"><img src="/image/c467753ef522e3aa5b4ac48f075289b0/L1006830.jpg"
                                        class="absolute rounded-full object-cover h-5 w-5 mr-1">
                                    <!---->
                                </div>
                                {{ $contacts->where('id', $target_id)->first()->name }}
                            </span>
                            <div class="h-11">
                                <div class="relative z-20">
                                    <div
                                        class="icon-wrapper flex justify-center items-center rounded-full group cursor-pointer flex-shrink-0 hover:bg-gray-100 h-10 w-10">
                                        <i class="fal fa-ellipsis-h-alt"></i>
                                    </div>
                                    <div class="absolute bg-white top-12 right-0 flex flex-col w-64 rounded-lg shadow z-50"
                                        style="display: none;">
                                        <ul>
                                            <li class="p-3 hover:bg-gray-100 text-black text-tiny"><i
                                                    class="far fa-archive pr-2"></i>
                                                Archiver
                                            </li>
                                            <!---->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="messageBar" class="flex-grow overflow-y-auto ">
                        @foreach($response['messages'] as $message)
                            @if($message['viewType'] == 'default')
                                @if($message['from_id'] != $message['to_id'])
                                <div class="px-1 md:px-2 float-right w-full">
                                    <div class="block px-2 w-full float-right ">
                                        {{-- If attachment is a file --}}
                                        @if(@$message['attachment'][2] == 'file')
                                        <a href="{{ route(config('chatify.attachments.download_route_name'), ['fileName'=>$message['attachment'][0]]) }}"
                                            class="file-download">
                                            <span class="fas fa-file"></span> {{$message['attachment'][1]}}</a>
                                        @endif
                                        
                                        {{-- If attachment is an image --}}
                                        @if(@$message['attachment'][2] == 'image')
                                        <img src="{{ Chatify::getAttachmentUrl($message['attachment'][0]) }}" class="img-thumbnail rounded float-end mt-2"
                                            height="300" width="300" alt="...">
                                        @endif
                                        <div class="block w-3/4 float-left"><span
                                                class="text-xxs text-gray-700 mb-1 float-left mt-1">
                                                {{ $message['time'] }}
                                            </span>
                                            <p
                                                class="relative p-3 rounded-t-lg inline-block clear-both text-tiny bg-secondary float-left rounded-bl-lg text-white">
                                                <span>
                                                    {!! ($message['message'] == null && $message['attachment'] != null && @$message['attachment'][2] != 'file') ?
                                                    $message['attachment'][1] : nl2br($message['message']) !!}
                                                </span> 
                                            </p>
                                        </div>
                                    </div>
                                    <div class="load-more block w-full float-left transform rotate-180 ltr"></div>
                                </div>
                                @endif
                            @endif

                            @if($message['viewType'] == 'sender')
                                <div class="px-1 md:p-2 float-left w-full">
                                    <div class="block px-2 w-full float-left ">
                                        {{-- If attachment is a file --}}
                                        @if(@$message['attachment'][2] == 'file')
                                        <a href="{{ route(config('chatify.attachments.download_route_name'), ['fileName'=>$message['attachment'][0]]) }}"
                                            class="file-download">
                                            <span class="fas fa-file"></span> {{$message['attachment'][1]}}</a>
                                        @endif
                                        
                                        {{-- If attachment is an image --}}
                                        
                                        @if(@$message['attachment'][2] == 'image')<img src="{{ Chatify::getAttachmentUrl($message['attachment'][0]) }}" class="img-thumbnail rounded float-end mt-2" height="300" width="300" alt="...">
                                        @endif
                                        <div class="block w-3/4 float-right"><span class="text-xxs text-gray-700 mb-1 float-right mt-1">
                                                {{ $message['time'] }}
                                            </span>
                                            <p
                                                class="relative p-3 rounded-t-lg inline-block clear-both text-tiny bg-primary float-right rounded-bl-lg text-white">
                                                <span>
                                                    {!! ($message['message'] == null && $message['attachment'] != null && @$message['attachment'][2] != 'file') ? $message['attachment'][1] : nl2br($message['message']) !!}
                                                </span> <span class="absolute bottom-0 right-0 mx-1"><i class="fal fa-{{ $message['seen'] > 0 ? 'check-double' : 'check' }} fa-xs"></i></span>
                                            </p>
                                            {{-- <form action="{{  route('admin.conversations.dltMsg')  }}" method="" class="mt-1 relative rounded-t-lg inline-block clear-both float-right rounded-bl-lg text-danger" >
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="chatter_id" value="{{ $message['id'] }}">
                                                <input name="msg_id" type="hidden" value="{{ $chatter_id }}">
                                                    <button type="submit" class=""><i class="fas fa-trash text-xl text-danger"></i></button>
                                            </form> --}}
                                            
                                        </div>
                                    </div>
                                    <div class="load-more block w-full float-left transform rotate-180 ltr"></div>
                                </div>
                            @endif
                        @endforeach
                        </div>
                        <div class="relative min-h-12 w-full bg-white">
                            <!---->
                            @if (count($errors))
                                <div class="alert alert-danger flex justify-end w-1/2 md:w-auto md:mt-6 md:order-last" role="alert"
                                    style="border-left: 14px solid red!important">
                                    @foreach ($errors->all() as $error)
                                    <p>{{$error}}</p>
                                    @endforeach
                                </div>
                            @endif
                            <div data-v-a816de48="" class="flex justify-center px-4 md:px-10 pt-6 md:pt-10 pb-4 md:pb-10">
                                <!---->
                                <form id="textForm" class="flex flex-grow items-center" action="{{  route('admin.conversations.sendMessage')  }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="text" name="form">
                                    <input type="hidden" value="{{ $chatter_id }}" name="from_id">
                                    <input type="hidden" value="{{ $target_id }}" name="to_id">
                                    <input type="hidden" value="user" name="type">
                                    <div class="flex flex-grow items-center bg-gray-100 rounded-lg border border-transparent focus-within:ring-0 focus-within:border focus-within:border-gray-800 focus-within:bg-white">
                                        <button onclick="sendImage()" type="button" class="btn btn-primary inline-block self-end m-3 focus:outline-none text-xl">
                                            <i class="bi bi-image-fill"></i>
                                        </button>
                                        <textarea maxlength="500"
                                            class="inline-block bg-transparent border border-light-subtle focus:outline-none focus:ring-0 flex-grow resize-none h-15" name="message" placeholder="Entrer votre message.."></textarea>
                                        <button type="submit" class="btn btn-primary inline-block self-end m-3 focus:outline-none text-xl"><i class="bi bi-send-fill"></i></button>
                                    </div>
                                </form>
                                <form id="imageForm" class="flex flex-grow items-center" style="display: none" method="POST" action="{{  route('admin.conversations.sendMessage')  }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" value="image" name="form">
                                    <input type="hidden" value="{{ $chatter_id }}" name="from_id">
                                    <input type="hidden" value="{{ $target_id }}" name="to_id">
                                    <input type="hidden" value="user" name="type">
                                    <div
                                        class="flex flex-grow items-center bg-gray-100 rounded-lg border border-transparent focus-within:ring-0 focus-within:border focus-within:border-gray-800 focus-within:bg-white">
                                        <button onclick="sendText()" type="button" id="sendImage" class="btn btn-primary inline-block self-end m-3 focus:outline-none">
                                            <i class="bi bi-x"></i> Annuler
                                        </button>
                                        <input type="file" name="file" class="inline-block bg-transparent border border-light-subtle focus:outline-none focus:ring-0 flex-grow resize-none">
                                        <button type="submit" class="btn btn-primary inline-block self-end m-3 focus:outline-none text-xl"><i
                                                class="bi bi-send-fill"></i></button>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@php $seen = App\Http\Controllers\Admin\UsersController::makeSeen($chatter_id, $target_id); @endphp
@endsection