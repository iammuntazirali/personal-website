<x-site-layout 
    :title="'Anastasia Mamalikidou | Full-Stack Web Developer'"
    :description="'Hello! I\'m Anastasia, a recent BEng graduate in Computer Science and Engineering. I build responsive, accessible full-stack web applications with a focus on learning and scalability.'"
    :header="view('partials.page-header', [
        'title' => 'Hello! I\'m Anastasia',
        'subtitle' => 'A recent BEng graduate in Computer Science and Engineering. I enjoy building full-stack web applications with a focus on accessibility, scalability, and learning new technologies along the way.'
        ])"
>
    @include('partials.home.hero')
    @include('partials.home.projects')
</x-site-layout>
