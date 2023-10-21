<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>

    <form method="POST" action="{{ route('service.store') }}">
        @csrf
        <div class="mb-6">
            <label class="block">
                <span class="text-gray-700">Title</span>
                <input type="text" name="service_name"
                    class="block w-full @error('service_name') border-red-500 @enderror mt-1 rounded-md" placeholder=""
                     />
            </label>
            @error('title')
            <div class="text-sm text-red-600">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-6">

                {{-- <span class="text-gray-700">Tag</span>
                <select name="technologies[]" class="block w-full mt-1" multiple>
                    @foreach ($technologies as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->technology_name }}</option>
                    @endforeach
                </select> --}}
                <select name="technologies[]" data-te-select-init multiple>
                    @foreach ($technologies as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->technology_name }}</option>
                    @endforeach
                  </select>
                  <label data-te-select-label-ref>Example label</label>
        </div>
        <button type="submit" class="text-white bg-blue-600  rounded text-sm px-5 py-2.5">Submit</button>

    </form>


</body>
</html>
