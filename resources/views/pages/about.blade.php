<x-site-layout 
    :title="'About | Mamalikidou Anastasia'"
    :description="'Learn more about Anastasia Mamalikidou, a passionate full-stack web developer building responsive, accessible websites and applications.'"
    :header="view('partials.page-header', ['title' => 'About'])"
>

    @include('partials.about.bio')
    @include('partials.about.links')
    @include('partials.about.education')
    @include('partials.about.experience')
    @include('partials.about.certifications')
    @include('partials.about.sp-languages')
</x-site-layout>