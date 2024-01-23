@if (auth()->user()->role == 'Dinas Daerah')
{{-- Jika user adalah Dinas Daerah --}}

  @if ($item->tahap == 1)

    @if ($item->status == 2)
      <button type="button" class="btn btn-sm icon icon-left btn-outline-secondary" disabled>
        Ditolak
      </button>
    @else
      <div class="btn-group btn-group-sm" role="group">
        <button type="button" class="btn icon icon-left btn-outline-success" onclick="setujui({{ $item->id }}, 'Setujui Permohonan', 'Setujui permohonan kenaikan gaji berkala {{ $item->user->name }}?')">
          Setujui
        </button>
        <form action="{{ route('permohonan-kenaikan-gaji.update', $item->id) }}" id="setujui-{{ $item->id }}" method="POST">
          @method('PUT')
          @csrf
          <input type="hidden" name="persetujuan" value="1">
        </form>
        <button type="button" class="btn icon icon-left btn-outline-danger" data-bs-toggle="modal" data-bs-target="#tolak-{{ $item->id }}">
          Tolak
        </button>
      </div>
    @endif

  @else

    <button type="button" class="btn btn-sm icon icon-left btn-outline-secondary" disabled>
      Disetujui
    </button>

  @endif

@elseif (auth()->user()->role == 'Sub Bagian Kepegawaian')
{{-- Jika user adalah Sub Bagian Kepegawaian --}}

  @if ($item->tahap == 2)

    @if ($item->status == 2)
      <button type="button" class="btn btn-sm icon icon-left btn-outline-secondary" disabled>
        Ditolak
      </button>
    @else
      <div class="btn-group btn-group-sm" role="group">
        <button type="button" class="btn icon icon-left btn-outline-success" onclick="setujui({{ $item->id }}, 'Setujui Permohonan', 'Setujui permohonan kenaikan gaji berkala {{ $item->user->name }}?')">
          Setujui
        </button>
        <form action="{{ route('permohonan-kenaikan-gaji.update', $item->id) }}" id="setujui-{{ $item->id }}" method="POST">
          @method('PUT')
          @csrf
          <input type="hidden" name="persetujuan" value="1">
        </form>
        <button type="button" class="btn icon icon-left btn-outline-danger" data-bs-toggle="modal" data-bs-target="#tolak-{{ $item->id }}">
          Tolak
        </button>
      </div>
    @endif

  @elseif ($item->tahap < 2)

    <div class="btn-group btn-group-sm" role="group">
      <button type="button" class="btn icon icon-left btn-outline-dark" onclick="setujui({{ $item->id }}, 'Setujui Permohonan', 'Setujui permohonan kenaikan gaji berkala {{ $item->user->name }}?')" disabled>
        Setujui
      </button>
      <form action="{{ route('permohonan-kenaikan-gaji.update', $item->id) }}" id="setujui-{{ $item->id }}" method="POST">
        @method('PUT')
        @csrf
        <input type="hidden" name="persetujuan" value="1">
      </form>
      <button type="button" class="btn icon icon-left btn-outline-dark" data-bs-toggle="modal" data-bs-target="#tolak-{{ $item->id }}" disabled>
        Tolak
      </button>
    </div>

  @else

    <button type="button" class="btn btn-sm icon icon-left btn-outline-secondary" disabled>
      Disetujui
    </button>

  @endif

@else
{{-- Jika user adalah Kepala Dinas --}}

  @if ($item->tahap == 3)

    @if ($item->status == 2)
      <button type="button" class="btn btn-sm icon icon-left btn-outline-secondary" disabled>
        Ditolak
      </button>
    @else
      <div class="btn-group btn-group-sm" role="group">
        <button type="button" class="btn icon icon-left btn-outline-success" onclick="setujui({{ $item->id }}, 'Setujui Permohonan', 'Setujui permohonan kenaikan gaji berkala {{ $item->user->name }}?')">
          Setujui
        </button>
        <form action="{{ route('permohonan-kenaikan-gaji.update', $item->id) }}" id="setujui-{{ $item->id }}" method="POST">
          @method('PUT')
          @csrf
          <input type="hidden" name="persetujuan" value="1">
        </form>
        <button type="button" class="btn icon icon-left btn-outline-danger" data-bs-toggle="modal" data-bs-target="#tolak-{{ $item->id }}">
          Tolak
        </button>
      </div>
    @endif

  @elseif ($item->tahap < 3)

    <div class="btn-group btn-group-sm" role="group">
      <button type="button" class="btn icon icon-left btn-outline-dark" onclick="setujui({{ $item->id }}, 'Setujui Permohonan', 'Setujui permohonan kenaikan gaji berkala {{ $item->user->name }}?')" disabled>
        Setujui
      </button>
      <form action="{{ route('permohonan-kenaikan-gaji.update', $item->id) }}" id="setujui-{{ $item->id }}" method="POST">
        @method('PUT')
        @csrf
        <input type="hidden" name="persetujuan" value="1">
      </form>
      <button type="button" class="btn icon icon-left btn-outline-dark" data-bs-toggle="modal" data-bs-target="#tolak-{{ $item->id }}" disabled>
        Tolak
      </button>
    </div>

  @else

    @if ($item->tahap == 4)
      <button type="button" class="btn btn-sm icon icon-left btn-outline-success" data-bs-toggle="modal" data-bs-target="#uploadSk-{{ $item->id }}">
        Kirim SK
      </button>
    @else
      {{-- <button type="button" class="btn btn-sm icon icon-left btn-outline-secondary" disabled>
        SK Telah Dikirim
      </button> --}}
      <a href="{{ Storage::url($item->sk) }}" target="_blank" class="btn btn-sm icon icon-left btn-outline-primary">
        Lihat SK
      </a>
    @endif

  @endif

@endif