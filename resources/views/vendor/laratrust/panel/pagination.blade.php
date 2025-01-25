<div class="bg-slate700 px-4 py-3 flex items-center justify-between border-t border-gray-700 sm:px-6">
  <div class="flex-1 sm:flex sm:items-center sm:justify-end">
    <div>
      <span class="relative z-0 inline-flex gap-2">
        <{!!$paginator->onFirstPage()
          ? 'span'
          : 'a href="' . $paginator->previousPageUrl() . '"'
          !!}
          class="relative inline-flex items-center gap-1 px-3 py-2 rounded-lg border border-rosa bg-transparent text-sm font-poppins {{$paginator->onFirstPage() ? 'text-gray-500 cursor-not-allowed' : 'text-white hover:bg-rosa/20'}} focus:z-10 focus:outline-none focus:ring-2 focus:ring-rosa focus:border-rosa transition duration-200"
        >
          <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"/>
          </svg>
          Anterior
        </{{$paginator->onFirstPage() ? 'span' : 'a' }}>

        <{!!$paginator->hasMorePages()
            ? 'a href="' . $paginator->nextPageUrl() . '"'
            : 'span'
          !!}
          class="relative inline-flex items-center gap-1 px-3 py-2 rounded-lg border border-rosa bg-transparent text-sm font-poppins {{$paginator->hasMorePages() ? 'text-white hover:bg-rosa/20' : 'text-gray-500 cursor-not-allowed'}} focus:z-10 focus:outline-none focus:ring-2 focus:ring-rosa focus:border-rosa transition duration-200"
        >
            Próximo
            <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
            </svg>
        </{{ $paginator->hasMorePages() ? 'a' : 'span' }}>
      </span>
    </div>
  </div>
</div>
