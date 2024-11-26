@if (!$selectedGroup == [])
<h2 class="text-2xl font-semibold mb-4"><b>Edit</b></h2>
<div class = "border border-4 rounded-2xl p-4">
@if(count($selectedGroup) > 0)
            <div class="flex">
                  <button wire:click="orderTop" class="flex-1 m-2 bg-blue-500 hover:bg-blue-700 text-white font-bold px-4 rounded mt-2 self-end">Top</button>

                   <button wire:click="orderBottom" class="flex-1 m-2 bg-blue-500 hover:bg-blue-700 text-white font-bold  px-4 rounded mt-2 self-end">Bottom</button>
             </div>
         @endif   

   <form action="{{ route('edit') }}" 
      method="POST" 
      enctype="multipart/form-data"
      >
    @csrf
      <div class="flex flex-col gap-2">
                

          <label for="color">Colour</label>
          <span>
            <input type="color" id="colour" name="colour" value="{{$store->colour ?? 'CanvasColor'}}"
            onchange ="updateHex(this.value)" class="m2">
            <input type="text" id="hex" name="hex" value="{{$store->colour ?? 'CanvasText'}}"
            onchange ="updateColour(this.value)" class="border rounded ">
          </span>

          <label for="textColour">Text Colour</label>
            <span>
                <input type="color" id="textColour" name="textColour" 
                      value="{{ $store->textColour ?? '#ff0000' }}" 
                      onchange="updateTextHex(this.value)" class="m2">
                <input type="text" id="textHex" name="textHex" 
                      value="{{ $store->textColour ?? '#ff0000' }}" 
                      onchange="updateTextColour(this.value)" class="border rounded ">
            </span>
          


        @if(count($selectedGroup) == 1)
        
          <label>Name</label>
          <input type="text" id="name" name="name" class="border rounded p-2" Value="{{$store->name ?? ''}}">

          <label for="code">Code</label>
          <input type="number" id="code" name="code" class="border rounded p-2" Value="{{$store->code ?? ''}}">

          <label for="manager">Manager</label>
          <input type="text" id="manager" name="manager" class="border rounded p-2" Value="{{$store->manager ?? ''}}">

          <label for="speedDial">Speed Dial</label>
          <input type="number" id="speedDial" name="speedDial" class="border rounded p-2" Value="{{$store->speedDial ?? ''}}">

          <label for="orderNumber">Order Number</label>
          <input type="number" id="orderNumber" name="orderNumber" class="border rounded p-2" Value="{{$store->orderNumber ?? ''}}">

          <label for="orderValue">Order Value</label>
          <input type="number" id="orderValue" name="orderValue" class="border rounded p-2" Value="{{$store->orderValue ?? ''}}">

          <label for="notes">Notes</label>
          <textarea id="notes" name="notes" class="border rounded p-2">{{$store->notes ?? ''}}</textarea>


          <input type="hidden" name="id" value="{{$store->id ?? ''}}">


        @endif

        @if(isset($selectedGroup))
          <input type="hidden" name="group" value="{{ json_encode(array_map(function ($item) { return $item->id ?? 0; }, $selectedGroup)) }}">
        @endif

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-2 self-end">Save</button>
      </div>
    
  </form> 
</div>  
@endif

