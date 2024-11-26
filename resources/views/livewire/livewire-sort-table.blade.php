<div class="flex h-screen">
                    <div class="flex-none w-80 p-4">
                        <h2 class="text-2xl font-semibold mb-4"><b>Import</b></h2>
                        @include('import')
                        @if ($stores->count() > 0)
                          
                          @include('edit', ['store' => end($selectedGroup) ?? []])  
                          
                        @endif

                        <div class="flex mt-2 gap-4">
                            
                            <button id="accessibility-button" class="border-2 rounded-md">
                                <div class="relative w-12 h-12 bg-gray-200">
                                    <!-- Text content grid -->
                                    <div class="absolute inset-0 grid grid-cols-2 grid-rows-2 z-10">
                                        <p class="col-start-2 text-yellow-500 text-center">A</p>
                                        <p class="row-start-2 text-center">A</p>
                                    </div>

                                    <!-- Bottom-left triangle (White fill, Black border) -->
                                    <svg class="absolute bottom-0 left-0 w-full h-full z-0" viewBox="0 0 100 100">
                                        <polygon points="0,100 0,0 100,100" fill="white" stroke="black" stroke-width="2"/>
                                    </svg>
                                    
                                    <!-- Top-right triangle (Black fill) -->
                                    <svg class="absolute top-0 right-0 w-full h-full z-0" viewBox="0 0 100 100">
                                        <polygon points="0,0 100,0 100,100" fill="black"/>
                                    </svg>
                                </div>
                             </button>
                            <button onClick="window.print()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-2 ml-auto">
                                Print
                            </button>
                        </div>
                    </div>

                    @if ($stores->count() > 0)
                        <div id="print-section" class="flex-1 p-4">
                        <div class="shadow-xl rounded p-10  w-full mx-auto">

                                <input id="selectAll" type="checkbox" class= "mb-4" style="position:relative; right: 1.3rem; transform: scale(1.75); opacity: 0.9;"
                                wire:click="selectAll" {{$selectedGroup ? 'checked' : ''}}/>

                                @if (count($selectedGroup) > 0)
                                    <button id="remove"
                                     wire:click="removeSelected({{ json_encode(array_column($selectedGroup, 'id')) }})"
                                     class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-2 self-end">Remove</button>
                                @endif

                                <ul wire:sortable="updateStoreOrder">
                                    @foreach ($stores as $store)
                                                <li 
                                                    wire:sortable.item="{{ $store->id }}" 
                                                    wire:key="store-{{ $store->id }}" 
                                                    
                                                    class="flex justify-between border border-gray-800 rounded-md mb-0.5"

                                                    style="
                                                        background-color: {{ $store->colour ?? 'Canvas' }};
                                                        color: {{ $store->textColour ?? 'CanvasText' }};
                                                        border-color: {{ in_array($store, $selectedGroup) ? '#2689f2' : '#B0B0B0' }};
                                                        border-width: {{ in_array($store, $selectedGroup) ? '4px' : '3px' }};
                                                    "   

                                                    >
                                                    
                                                    <input type="checkbox" 
                                                            id="selects"
                                                            wire:click="selectStore({{ $store->id }})" 
                                                            {{ in_array($store, $selectedGroup) ? 'checked' : '' }} 
                                                            class="border mr-2"
                                                            style="position:relative; right: 1.75rem; transform: scale(1.25); opacity: 0.9;" 
                                                             />
                                                   
                                                        
                                                    
                                                    
                                                    

                                                    <div class=" w-full flex justify-between items-center "
                                                        wire:sortable.handle>
                            
                                                        <span class="flex gap-4 items-center w-full">

                                                            <div class="w-[10%]">
                                                                <p ><b>{{ $store->name }}</b></p>
                                                            </div>
                                                            
                                                            <div class="w-[10%]">
                                                                <p>{{ $store->code }}</p>
                                                            </div>
                                                            
                                                            <div class="w-[10%]">
                                                                <p>{{ $store->manager }}</p>
                                                            </div>
                                                            
                                                            <div class="w-[10%]">
                                                                <p>{{ $store->speedDial }}</p>
                                                            </div>
                                                            
                                                            <div class="w-[5%]">
                                                                <p>{{ $store->orderNumber }}</p>
                                                            </div>
                                                            
                                                            <div class="w-[5%]">
                                                                <p>{{ $store->orderValue }}</p>
                                                            </div>
                                                            
                                                            <div class="w-[40%]">
                                                                <p>{{ $store->notes }}</p>
                                                            </div>
                                                        </span>
                                                    
                                                    </div>
                                                    <button class="ml-4" wire:click="removeStore({{ $store->id }})">
                                                        <div class = "border border-2 rounded-md border-slate-600 p-1 mx-4 opacity-50">
                                                            <svg class="opacity-0 hover:opacity-100"  width="10" height="10" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                                                                <line x1="10" y1="10" x2="90" y2="90" stroke="black" stroke-width="15" stroke-linecap="round" />
                                                                <line x1="90" y1="10" x2="10" y2="90" stroke="black" stroke-width="15" stroke-linecap="round" />
                                                            </svg>
                                                        </div>
                                                    </button>
                                                </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                </div>










