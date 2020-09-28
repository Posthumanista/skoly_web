<div>
    <div>
        <table class="table-fixed">
            <thead>
                <tr>  
                    <th class="border-solid border-gray-300 w-3/5">      
                        <div class="flex flex-wrap items-stretch mx-8 relative">
                            <div class="flex bg-indigo-100 focus:outline-none  w-full focus:shadow-outline border border-gray-300 rounded-lg my-1">
                                <span class="flex items-center leading-normal bg-transparent rounded rounded-r-none whitespace-no-wrap text-grey-dark text-sm px-2">
                                    <svg width="18" height="18" class="w-4 lg:w-auto" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8.11086 15.2217C12.0381 15.2217 15.2217 12.0381 15.2217 8.11086C15.2217 4.18364 12.0381 1 8.11086 1C4.18364 1 1 4.18364 1 8.11086C1 12.0381 4.18364 15.2217 8.11086 15.2217Z" stroke="#455A64" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M16.9993 16.9993L13.1328 13.1328" stroke="#455A64" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <input id="search" placeholder="Název" class="py-1 bg-indigo-100  px-2 my-1 leading-normal appearance-none placeholder-black" wire:model='searchTerm' type="text">
                                </span>
                            </div>
                        </div>
                    </th>
                    <th class="py-1 px-8 border-gray-300 text-left text-sm leading-4 text-black-700 tracking-wider w-2/5">Město</th>
                </tr>
            </thead>
            <tbody> 
                @foreach ($skoly as $skola)
                    <tr class="border-t my-8">
                        <td class="px-4 py-2">{{$skola->nazev}}</td>
                        <td class="px-4 py-2">{{$skola->mestoNazev->nazev}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>    
    </div>
</div>
