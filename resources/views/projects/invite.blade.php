<div class="card flex flex-col mt-3">
    <h3 class="font-normal text-xl py-4 -ml-5 mb-3 border-l-4 border-blue-light pl-4">
        Invite a user
    </h3>

    <form method="POST" action="{{ $project->path() . '/invitations' }}">
        @csrf
        <div class="mb-3">
            <input type="email"
                   name="email"
                   id="email"
                   class="input bg-transparent border border-muted-light rounded p-2 text-xs w-full{{ $errors->has('email') ? ' is-invalid' : '' }}"
                   placeholder="Email address"
            >
        </div>
        <button type="submit" class="button">Invite</button>

        @include('errors', ['bag' => 'invitations'])
    </form>
</div>
