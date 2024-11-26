


<x-layout>
    <form action="{{ route('import') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="flex border-2 border-gray-300 rounded-lg mx-[39%] my-16">
            <div class="m-2">
                <label for="sheet" class="pr-4 pt-2">Select a sheet:</label>
            <select name="sheet" id="sheet" class="border rounded p-2 self-start">
                @foreach($sheetNames as $sheetName)
                    <option value="{{ $sheetName }}">{{ $sheetName }}</option>
                @endforeach
            </select>
            <label for="overwrite" class="pr-4 pt-2">Overwrite existing data:</label>
            <input type="checkbox" name="overwrite" id="overwrite" class="border rounded p-2 self-start">
            </div>
            

            <div>
                <br>
                <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold mr-2  px-4 rounded mt-20 mb-4 self-end">Import</button>
            </div>
            
        </div>    
    </form>
</x-layout>
