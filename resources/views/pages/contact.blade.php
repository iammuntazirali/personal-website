<x-site-layout
    :title="'Contact | Anastasia Mamalikidou'"
    :description="'Get in touch with Anastasia Mamalikidou, full-stack web developer. Reach out for collaborations, projects, or general inquiries.'"
>

    <section class="contact-section">
        <h2>Contact Me</h2>

        @if(session('success'))
            <div class="contact-success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('contact.send') }}">
            @csrf

            <input 
                type="text" 
                name="name" 
                placeholder="Your Name" 
                value="{{ old('name') }}" 
                required>

            @error('name')
                <span class="contact-error">{{ $message }}</span>
            @enderror

            <input 
                type="email" 
                name="email" 
                placeholder="Your Email" 
                value="{{ old('email') }}" 
                required>

            @error('email')
                <span class="contact-error">{{ $message }}</span>
            @enderror

            <textarea 
                name="message" 
                placeholder="Your Message" 
                required>{{ old('message') }}</textarea>

            @error('message')
                <span class="contact-error">{{ $message }}</span>
            @enderror

            <button type="submit">Send Message</button>
        </form>

    </section>

</x-site-layout>