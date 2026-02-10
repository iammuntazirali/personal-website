<section id="certifications" class="about-section">
    <h2>Certifications</h2>

    @forelse($profile->certificates as $cert)

        <article class="cert-item">
            @if($cert->image)
                <img class="cert-image" 
                    src="{{ asset('images/certificates/' . $cert->image) }}" 
                    alt="{{ $cert->name }} by {{ $cert->organization->name }}">
            @endif

            <div class="cert-text">
                <h3>{{ $cert->name }}</h3>
                <h4>{{ $cert->organization->name }}</h4>
                @if($cert->spokenLanguage)
                    <p>Language: {{ $cert->spokenLanguage->name }}</p>
                @endif
                <p>Awarded: {{ $cert->formatted_date }}</p>
                @if($cert->credential_link)
                    <a href="{{ $cert->credential_link }}" target="_blank">View Certificate</a>
                @endif
            </div>
        </article>
    @empty
        <p>No certifications available yet.</p>
    @endforelse

</section>