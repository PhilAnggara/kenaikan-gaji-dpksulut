@if (auth()->user()->role == 'Dinas Daerah')
{{-- Jika user adalah Dinas Daerah --}}

  @if ($item->tahap == 1)

    @if ($item->status == 2)
      <button type="button" disabled>
        Ditolak
      </button>
    @else
      <button type="button">
        Setujui
      </button>
      <button type="button">
        Tolak
      </button>
    @endif

  @else

    <button type="button" disabled>
      Dietujui
    </button>

  @endif

@elseif (auth()->user()->role == 'Sub Bagian Kepegawaian')
{{-- Jika user adalah Sub Bagian Kepegawaian --}}

  @if ($item->tahap == 2)

    @if ($item->status == 2)
      <button type="button" disabled>
        Ditolak
      </button>
    @else
      <button type="button">
        Setujui
      </button>
      <button type="button">
        Tolak
      </button>
    @endif

  @elseif ($item->tahap < 2)

    <button type="button" disabled>
      Setujui
    </button>
    <button type="button" disabled>
      Tolak
    </button>

  @else

    <button type="button" disabled>
      Dietujui
    </button>

  @endif

@else
{{-- Jika user adalah Kepala Dinas --}}

  @if ($item->tahap == 3)

    @if ($item->status == 2)
      <button type="button" disabled>
        Ditolak
      </button>
    @else
      <button type="button">
        Setujui
      </button>
      <button type="button">
        Tolak
      </button>
    @endif

  @elseif ($item->tahap < 3)

    <button type="button" disabled>
      Setujui
    </button>
    <button type="button" disabled>
      Tolak
    </button>

  @else

    @if ($item->tahap == 4)
      <button type="button">
        Upload SK
      </button>
    @else
      <button type="button" disabled>
        Selesai
      </button>
    @endif

  @endif

@endif