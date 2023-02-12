@extends('layouts.Admin.app')

@section('title', 'Admin Dashboard')
@section('content')
   <div class="container-fluid" id="app">
      <div class="row mx-4">
         <div class="alert alert-primary" role="alert">
           Sélectionne un membre pour afficher ses conversations
         </div>
      </div>
      <div class="row">
         <div class="d-flex align-items-start">
            <div class="nav flex-column nav-pills me-3 border-bottom border-top py-2" id="v-pills-tab" role="tablist"
               aria-orientation="vertical">
               <button class="nav-link active" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages"
                  type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">
                  Membres
               </button>
               @foreach($chatters as $chatter)
               <button class="nav-link mb-1" id="v-pills-{{ $chatter->id }}-tab"
                data-bs-toggle="pill" data-bs-target="#v-pills-{{ $chatter->id }}" type="button"
                  role="tab" aria-controls="v-pills-{{ $chatter->id }}" aria-selected="true">
                  <div class="relative float-left h-8 bg-gray-100 w-8 mr-1 rounded-full overflow-hidden">
                     <img src="{{ asset('/storage/'.$chatter->avatar) }}"
                        class="absolute top-1/2 transform -translate-y-1/2 rounded-full object-cover z-10" />
                  </div>
                  {{ $chatter->name}}
               </button>
               @endforeach
            </div>
            <div class="tab-content w-75" id="v-pills-tabContent">
               @foreach($chatters as $chatter)
               <div class="tab-pane fade" id="v-pills-{{ $chatter->id }}" role="tabpanel"
                  aria-labelledby="v-pills-{{ $chatter->id }}-tab" tabindex="0">
                  <div class="row">
                     @php $contacts = App\Http\Controllers\Admin\UsersController::getContacts($chatter->id); @endphp
                     <h6 class="sm:w-80 pl-4 font-bold">
                        Conversations de {{ $chatter->name }} (
                        <span>{{ $contacts->count() }}</span>
                        )
                     </h6>
                     @foreach($contacts as $contact)
                     @php $contactItem = App\Http\Controllers\Admin\UsersController::getContactItem($contact->id, $chatter->id); @endphp
                     <a class="text-decoration-none" href="{{ route('admin.conversations', ['chatter_id' => $chatter->id, 'target_id' => $contact->id]) }}">
                        <div class="max-h-chat mt-6">
                           <div class="h-16 py-2 px-4 cursor-pointer hover:bg-gray-200 transform duration-200">
                              <div class="relative w-12">
                                 <div class="relative float-left h-12 bg-gray-100 w-12 mr-3 rounded-full overflow-hidden">
                                    <img src="/storage/{{ $contact->avatar }}"
                                       class="absolute top-1/2 transform -translate-y-1/2 rounded-full object-cover z-10" />
                                    <div class="h-12 absolute inset-0 flex justify-center items-center z-0">
                                       <span class="text-tiny font-semibold text-gray-800 m-auto">
                                       </span>
                                    </div>
                                 </div>
                                 <!---->
                              </div>
                              <div class="flex py-1 overflow-auto">
                                 <div class="flex-grow overflow-auto">
                                    <h6 class="text-sm leading-5">{{ $contact->name }}@if($contact->active_status)
                                    <span
                                       class="w-3 h-3 absolute bg-green border-2 border-white rounded-full"></span>
                                    @endif</h6>
                                    
                                    <p class="text-sm leading-5 whitespace-nowrap truncate text-gray-700">
                                       {!! $contactItem['unseen'] > 0 ? '<span class="badge text-bg-secondary mx-2">'.$contactItem['unseen'].' <i class="bi bi-eye-slash-fill"></i></span>' : '' !!}
                                       <span> 
                                          {{-- Last Message user indicator --}}
                                          {!!
                                          $contactItem['lastMessage']->from_id == $chatter->id
                                          ? '<span class="fw-bold">MOI :</span>'
                                          : ''
                                          !!}
                                          {{-- Last Message Body --}}
                                          @if($contactItem['lastMessage']->attachment == null)
                                          {{
                                          strlen(html_entity_decode($contactItem['lastMessage']->body, ENT_QUOTES | ENT_IGNORE, "UTF-8")) > 30
                                          ? trim(substr(html_entity_decode($contactItem['lastMessage']->body, ENT_QUOTES | ENT_IGNORE, "UTF-8"), 0, 30)).'..'
                                          : html_entity_decode($contactItem['lastMessage']->body, ENT_QUOTES | ENT_IGNORE, "UTF-8")
                                          }}
                                          @else
                                          <span class="fas fa-file"></span> Attachment
                                          @endif
                                       </span>
                                    </p>
                                 </div>
                                 <div class="w-20 overflow-hidden text-xxs text-right flex-shrink-0 text-gray-700">
                                    {{ $contactItem['lastMessage']->created_at->diffForHumans() }}
                                 </div>
                              </div>
                           </div>
                           <div data-v-591b0e1e="" class="load-more h-1"></div>
                        </div>
                     </a>
                     
                     @endforeach
                  </div>
               </div>
               @endforeach
               <div class="tab-pane fade active show" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab"
                  tabindex="0">
                  <p class="p-3">
                  Il y a actuellement {{ $chatters->count() }} conversations.
                  </p>
               </div>
            </div>
         </div>
      </div>
   </div>	
@endsection
