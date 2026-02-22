<x-site-layout 
    :title="'Home | Mamalikidou Anastasia'"
    :header="view('partials.page-header', [
        'title' => 'Hello! I\'m Anastasia',
        'subtitle' => 'A recent BEng graduate in Computer Science and Engineering. I enjoy building full-stack web applications with a focus on accessibility, scalability, and learning new technologies along the way.'
        ])"
>
    @include('partials.home.hero')
    @include('partials.home.projects')
</x-site-layout>
