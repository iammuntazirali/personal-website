<section id="certifications" class="about-section">
    <h2>Certifications</h2>

    @forelse($profile->certificates as $cert)

        <article class="card certification-card">
            @if($cert->image)
                <img class="card-image" 
                    src="{{ asset('images/certificates/' . $cert->image) }}" 
                    alt="{{ $cert->name }} by {{ $cert->organization->name }}">
            @endif

            <h3 class="card-title">{{ $cert->name }}</h3>

            <p class="card-meta">
                {{ $cert->organization->name }}
            </p>

            @if($cert->spokenLanguage)
                <p class="card-text">Language: {{ $cert->spokenLanguage->name }}</p>
            @endif

            <p class="card-text">Awarded: {{ $cert->formatted_date }}</p>

            @if($cert->credential_link)
                <div class="card-actions">
                    <a  href="{{ $cert->credential_link }}" 
                        class="button"
                        target="_blank"
                        rel="noopener noreferrer">
                        View Certificate
                    </a>
                </div>
            @endif
        </article>
    @empty
        <div class="card certification-card card-empty">
            <p class="card-text">No certifications available yet.</p>
        </div>
    @endforelse

</section>