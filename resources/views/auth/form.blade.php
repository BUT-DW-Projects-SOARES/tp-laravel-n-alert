<x-layout.base title="Login - N-Altert">
    <div class="page-header" style="text-align: center;">
        <div style="width: 100%;">
            <h1>Welcome Back</h1>
            <p>Please log in to your account.</p>
        </div>
    </div>

    <div class="form-container mx-auto" style="max-width: 400px; padding: 2rem;">
        <form action="{{ route('auth.login') }}" method="POST">
            @csrf
            
            <div class="form-group mb-4">
                <label class="form-label">Email Address</label>
                <input class="form-input" type="email" name="email" placeholder="admin@example.com" value="{{ old('email') }}" required autofocus>
                <x-form.validation-error value="email" />
            </div>

            <div class="form-group mb-8">
                <label class="form-label">Password</label>
                <input class="form-input" type="password" name="password" placeholder="••••••••" required>
                <x-form.validation-error value="password" />
            </div>

            <button class="btn btn-primary" style="width: 100%;" type="submit">Log In</button>
        </form>
    </div>
</x-layout.base>
