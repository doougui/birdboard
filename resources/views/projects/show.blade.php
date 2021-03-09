@extends('layouts.app')

@section('content')
    <header class="flex items-center mb-3 py-4">
        <div class="flex justify-between items-end w-full">
            <p class="text-gray text-sm font-normal">
                <a href="/projects" class="text-gray text-sm font-normal no-underline">My Projects</a> / {{ $project->title }}
            </p>

            <div class="flex items-center">
                @foreach($project->members as $member)
                    <img
                        src="{{ gravatar_url($member->email) }}"
                        alt="{{ $member->name }}'s avatar"
                        class="rounded-full w-8 mr-2"
                    >
                @endforeach

                <img
                    src="{{ gravatar_url($project->owner->email) }}"
                    alt="{{ $project->owner->name }}'s avatar"
                    class="rounded-full w-8 mr-2"
                >

                <a href="{{ $project->path() . '/edit' }}" class="button ml-4">Edit Project</a>
            </div>
        </div>
    </header>

    <main>
        <h2 class="text-lg text-gray font-normal mb-3">Tasks</h2>

        <div class="lg:flex -mx-3 mb-6">
            <div class="lg:w-3/4 px-3">
                <div class="mb-8">
                    @foreach ($project->tasks as $task)
                        <div class="card mb-3">
                            <form action="{{ $task->path() }}" method="POST">
                                @csrf
                                @method('PATCH')

                                <divc class="flex">
                                    <input type="text" value="{{ $task->body }}" name="body" class="w-full border-none p-0 {{ $task->completed ? 'text-gray' : '' }}">
                                    <input type="checkbox" name="completed" onChange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
                                </divc>
                            </form>
                        </div>
                    @endforeach

                    <div class="card mb-3">
                        <form action="{{ $project->path() . '/tasks' }}" method="POST">
                            @csrf
                            <input type="text" name="body" placeholder="Add a new task" class="w-full border-none p-0">
                        </form>
                    </div>
                </div>

                <div class="mb-8">
                    <h2 class="text-lg text-gray font-normal mb-3">General Notes</h2>

                    {{-- general notes --}}
                    <form action="{{ $project->path() }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <textarea
                            name="notes"
                            class="card w-full border-none mb-4"
                            style="min-height: 200px"
                            placeholder="Anything special that you want to take a note of?"
                        >{{ $project->notes }}</textarea>

                        <button type="submit" class="button">Save</button>
                    </form>

                    @include('errors')
                </div>
            </div>

            <div class="lg:w-1/4 px-3">
                @include('projects.card')
                @include('projects.activity.card')

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
            </div>
        </div>
    </main>
@endsection
