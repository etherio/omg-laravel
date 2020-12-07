<x-app-layout>
    <x-slot name="header">
        <div class="mx-auto flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Products') }}
            </h2>
        </div>
    </x-slot>

    <div class="max-w-2xl mx-auto mt-8 p-5 overflow-x-auto bg-white shadow-md border-gray-20">
        <form method="POST" action="{{ route('products.update', $product->id) }}">
            @csrf
            @method('PUT')

            <div class="min-w-full p-2">
                <x-label for="code" :value="__('CODE *')" />
                <x-input id="code" class="block mt-1 w-full" type="text" name="code" :value="old('code', $product->code)" required autofocus />
            </div>

            <div class="min-w-full p-2">
                <x-label for="name" :value="__('Name *')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $product->name)" required />
            </div>

            <div class="min-w-full p-2">
                <x-label for="description" :value="__('Description')" />
                <x-input id="description" class="block mt-1 w-full" type="text" name="description"
                    :value="old('description', $product->description)" />
            </div>

            <div class="min-w-full p-2">
                <x-label for="images" :value="__('Images [seperate with comma for more images]')" />
                <x-input id="images" class="block mt-1 w-full" type="text" name="images" :value="old('images', $product->images)" />
            </div>

            <div class="flex justify-between">
                <div class="w-4/12 inline-block p-2">
                    <x-label for="price" :value="__('Price *')" />
                    <x-input id="price" class="block mt-1 w-full" type="number" name="price" :value="old('price', $product->price)" />
				</div>

               <div class="w-4/12 inline-block p-2">
                    <x-label for="size" :value="__('Size')" />
                    <x-input id="size" class="block mt-1 w-full" type="text" name="size" :value="old('size', $product->size)" />
                </div>
            </div>

  		   <div class="w-4/12 inline-block p-2">
		  	   <x-label for="color" :value="__('Color')" />
			   <x-input id="color" class="block mt-1 w-full" type="text" name="color" :value="old('color', $product->color)" />
  		   </div>

            <div class="flex justify-between">
                <div class="w-6/12 inline-block p-2">
                    <x-label for="min_age" :value="__('Minimum Age')" />
                    <x-input id="min_age" class="block mt-1 w-full" type="number" name="min_age" :value="old('min_age', $product->min_age)" />
                </div>

                <div class="w-6/12 inline-block p-2">
                    <x-label for="max_age" :value="__('Maximum Age')" />
                    <x-input id="max_age" class="block mt-1 w-full" type="number" name="max_age" :value="old('max_age', $product->max_age)"/>
                </div>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Update') }}
                </x-button>
            </div>
        </form>
    </div>
</x-app-layout>
