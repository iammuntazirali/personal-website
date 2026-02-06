@if($profile?->bio)
    <section id="bio" class="about-section">
        <h2>Bio</h2>
        <p>{{ $profile->bio }}</p>
    </section>
@endif