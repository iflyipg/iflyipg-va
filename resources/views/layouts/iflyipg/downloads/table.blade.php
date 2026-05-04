<table class="table table-sm table-borderless table-striped text-start text-nowrap align-middle mb-0">
  @foreach($files->sortBy('name', SORT_NATURAL) as $file)
    <tr>
      {{-- Abuelo007X: Add this option to show the image instead of the link when loading liveries and showcase them. In order to enable this, on the files just need to include a download with the name "image" --}}
      @if ($file->name=="image")
        <td>
          <img class="card-img" src="{{ $file->url }}" height="300">
        </td>
      @else
        <td>
          <a href="{{ route('frontend.downloads.download', [$file->id]) }}" target="_blank"  @if($file->isExternalFile) data-external-redirect="{{ $file->url }}" @endif>{{ $file->name }}</a>
                    {{-- Abuelo007X: Add this option to clarify is current stable version and how to activate the Beta update --}}
          @if (str_contains($files, 'ACARS'))
            <br>
            This is the "Stable" version
            <br>
            To get Beta, turn On the "Enable Beta Updates" in settings
          @endif
        </td>
      @endif
      <td class="text-end">
        @if(Theme::getSetting('download_counts') && $file->download_count > 0)
          {{ $file->download_count.' '.trans_choice('common.download', $file->download_count) }}
        @endif
      </td>
    </tr>
    @if($file->description)
      <tr>
        <td colspan="2">&bull; {{ $file->description }}</td>
      </tr>
    @endif
  @endforeach
</table>