<x-layout :title="'My Projects'">

    <h1>My Projects</h1>

    <div class="projects-wrapper">
        @forelse($projects as $project)
            <article class="proj-item">
                <h3>{{ $project->title }}</h3>
                <h4>{{ $project->type ?? 'Self-Initiated Project' }}</h4>
                <p>{{ ucfirst($project->status) }}</p>

                <div class="proj-content">
                    <div class="proj-image">
                        @if($project->image_path)
                            <img src="{{ asset($project->image_path) }}" alt="{{ $project->title }} screenshot">
                        @else
                            <img src="{{ asset('assets/images/projects/placeholder.png') }}" alt="Project screenshot placeholder">
                        @endif
                    </div>

                    <div class="proj-text">
                        @if($project->highlights)
                            <ul>
                                @foreach($project->highlights as $point)
                                    <li>{!! $point !!}</li>
                                @endforeach
                            </ul>
                        @endif

                        @if($project->github_url)
                            <a href="{{ $project->github_url }}" target="_blank">View on GitHub</a>
                        @endif
                        @if($project->project_url)
                            <a href="{{ $project->project_url }}" target="_blank">Live Demo</a>
                        @endif
                    </div>
                </div>
            </article>
        @empty
            <p>No projects yet.</p>
        @endforelse
    </div>

</x-layout>
