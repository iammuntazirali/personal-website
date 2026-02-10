@if($degrees->isNotEmpty())
    <section id="education" class="about-section">
        <h2>Education</h2>

        <ul>
        @foreach($degrees as $degree)
            <li>
                {{-- Degree title and optional field --}}
                <strong>{{ $degree->title }}</strong>
                @if($degree->field)
                    - {{ $degree->field }}
                @endif
                <br>

                {{-- Organization name --}}
                @if($degree->organization->website)
                    <a href="{{ $degree->organization->website }}" target="_blank" rel="noopener noreferrer">
                        <em>{{ $degree->organization->name ?? 'Unknown organization' }}</em>
                    </a>
                @else
                    <em>{{ $degree->organization->name ?? 'Unknown organization' }}</em>
                @endif
                <br>

                {{-- Formatted start and end dates --}}
                <span>{{ $degree->formatted_start }} - {{ $degree->formatted_end }}</span>

                {{-- Optional grade --}}
                @if($degree->grade)
                    <br>Grade: {{ $degree->grade }}
                @endif
            </li>
        @endforeach
        </ul>
    </section>
@endif