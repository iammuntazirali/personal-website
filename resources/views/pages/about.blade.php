<x-site-layout 
    :title="'About | Mamalikidou Anastasia'"
    :description="'Learn more about Anastasia Mamalikidou, a passionate full-stack web developer building responsive, accessible websites and applications.'"
    :headerTitle="'About me'"
    :subtitle="'A brief overview of my experience, education, skills, etc.'"
    >
    <div class="about-wrapper">
        @include('partials.about.bio')
        {{-- @include('partials.about.links') --}}
        @include('partials.about.education')
        @include('partials.about.experience')
        @include('partials.about.certifications')
        @include('partials.about.sp-languages')
    </div>
</x-site-layout>