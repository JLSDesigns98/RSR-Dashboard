<form action="{{ route('importSheets') }}" 
      method="post" 
      enctype="multipart/form-data"
      class = "border border-4 rounded-2xl p-4">
    @csrf
    <div class="flex flex-col">
      <input type="file" name="import_file" accept=".xlsx" class="w-full h-8 pl-2 pr-2 text-sm" required >
      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-2 self-end">Import</button>
    </div>
</form>